<?php
$currency_code      = $this->db->get_where('settings', array('type' => 'system_currency_id'))->row()->description;
$currency_symbol    = get_currency_icon($currency_code);
?>

<?php echo form_open(site_url('reporting/income_report') , array('class' => 'form-horizontal form-groups validate',  'id' => 'date_selector_form'));?>

<!-- REPORT DATE RANGE SELECTOR STARTS-->           
    <div class="form-group">

        <div class="col-sm-6 col-sm-offset-3">
            <div style="text-align: center;" class="daterange daterange-inline add-ranges" data-format="D MMMM, YYYY" 
                data-start-date="<?php echo date("d F, Y", $timestamp_start); ?>" data-end-date="<?php echo date("d F, Y", $timestamp_end); ?>">
                    <i class="entypo-calendar"></i>
                    <span id="date_range_selector" style="font-weight: 300; font-size: 20px; color:#000;">
                        <?php echo date("d F, Y", $timestamp_start) . " - " . date("d F, Y", $timestamp_end); ?>
                    </span>
                    <input id="date_range" type="hidden" name="date_range" value="<?php echo date("d F, Y", $timestamp_start) . " - " . date("d F, Y", $timestamp_end); ?>">
            </div>
        </div>

        <label class="col-sm-1 control-label" style="text-align:left;">
            <button type="button" class="btn btn-info" id="submit-button"
                onclick="update_date_range();">
                    <?php echo lang_key('filter'); ?>
            </button>
        </label>
    </div>
<?php echo form_close(); ?>

<script>
    
    function update_date_range()
    {
        var x = $("#date_range_selector").html();
        $("#date_range").val(x);
        $("#date_selector_form").submit();
    }
    
</script>

<?php
$count          = 1;
$amount         = 0;
$total_incomes = array();

$incomes    = $this->db->get('income')->result_array();
$sales      = $this->db->get('sale')->result_array();

if(!empty($incomes))
    foreach($incomes as $row)
        if($timestamp_start <= $row['date'] && $timestamp_end >= $row['date'])
            array_push($total_incomes, array('date' => $row['date'], 'title' => $row['title'],
                'account_id' => $row['account_id'], 'amount' => $row['amount']));
        
if(!empty($sales))
    foreach($sales as $row)
        if($timestamp_start <= $row['due_date'] && $timestamp_end >= $row['due_date'])
            array_push($total_incomes, array('date' => $row['due_date'], 'title' => lang_key('sale_code') . ' : ' . $row['sale_code'],
                'account_id' => $row['account_id'], 'amount' => $row['amount']));

if(!empty($total_incomes))
    foreach($total_incomes as $row)
        $amount += $row['amount'];
?>

<div class="row">
    <div class="col-sm-4 col-md-offset-4">

        <div class="tile-stats tile-white tile-white-primary">
            <div class="icon" style="margin-bottom: 17px;"><i class="entypo-database"></i></div>
            <div class="num" data-start="0" data-end="<?php echo $amount; ?>"
                data-prefix="<?php echo $currency_symbol; ?>" style="font-weight:200;"
                data-postfix="" data-duration="1500" data-delay="0">
                    0
            </div>
            <h3 style="font-weight:200; font-size: 15px;"><?php echo lang_key('total_income'); ?></h3>
        </div>

    </div>
</div>

<?php
if(empty($total_incomes)) { ?>
    <div class="alert alert-info"><?php echo lang_key('no_incomes');?></div>
<?php } else { ?>

    <table class="table table-bordered responsive datatable" id="table_export">
        <thead>
            <tr>
                <th>#</th>
                <th><?php echo lang_key('date'); ?></th>
                <th><?php echo lang_key('title'); ?></th>
                <th><?php echo lang_key('account'); ?></th>
                <th><?php echo lang_key('amount'); ?></th>
            </tr>
        </thead>
        
        <tbody>
            <?php
            // SORT TOTAL EXPENSES ARRAY BY DATE IN DESCENDING ORDER
            foreach($total_incomes as $key => $row)
                $date[$key] = $row['date'];
            
            array_multisort($date, SORT_DESC, $total_incomes);
            
            foreach($total_incomes as $row): ?>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td><?php echo date('d/m/Y', $row['date']); ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td>
                        <?php echo get_db_field_by_id('account', 'title', $row['account_id']); ?>
                    </td>
                    <td><?php echo show_price($row['amount']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php } ?>
    
<script>

    var chart = AmCharts.makeChart("bar_chartdiv", {
        "theme"         : "none",
        "type"          : "serial",
        "startDuration" : 2,
        "dataProvider"  : [
            <?php
            $monthwise_amount       = array();
            $current_year           = date('Y');
            $previous_year          = $current_year - 1;
            $financial_year_start   = $this->db->get_where('settings', array('type' => 'financial_year_start'))->row()->description;
            
            $months = ['January', 'February', 'March', 'April', 'May', 'June',
                'July', 'August', 'September', 'October', 'November', 'December'];
            
            if($financial_year_start == 'july') {
                $start_timestamp    = strtotime('7/1/' . $previous_year);
                $end_timestamp      = strtotime('6/30/' . $current_year);
            }

            for($i = 0; $i < count($months); $i++)
                array_push($monthwise_amount, array('month' => $months[$i], 'amount' => 0));

            $total_incomes = array();
            if(!empty($incomes))
                foreach($incomes as $row)
                    array_push($total_incomes, array('date' => $row['date'], 'amount' => $row['amount']));

            if(!empty($sales))
                foreach($sales as $row)
                    array_push($total_incomes, array('date' => $row['due_date'], 'amount' => $row['amount']));
            
            foreach($total_incomes as $row) {
                $income_year = date('Y', $row['date']);
                
                if($financial_year_start == 'january') {
                    if($income_year == $current_year) {
                        $income_month = date('n', $row['date']) - 1;
                        $monthwise_amount[$income_month]['amount'] += $row['amount'];
                    }
                } else {
                    if($row['date'] >= $start_timestamp && $row['date'] <= $end_timestamp) {
                        $income_month = date('n', $row['date']) - 1;
                        $monthwise_amount[$income_month]['amount'] += $row['amount'];
                    }
                }
            }
            
            // RE-ARRANGE MONTHWISE AMOUNT ARRAY FOR JULY FINANCIAL YEAR
            if($financial_year_start == 'july') {
                $monthwise_amount_reverse = array();
                for($i = 6; $i < 12; $i++)
                    array_push($monthwise_amount_reverse, $monthwise_amount[$i]);
                
                for($i = 0; $i < 6; $i++)
                    array_push($monthwise_amount_reverse, $monthwise_amount[$i]);
                
                $monthwise_amount = array();
                for($i = 0; $i < 12; $i++)
                    array_push($monthwise_amount, $monthwise_amount_reverse[$i]);
            }
            
            if($financial_year_start == 'january')
                $year_to_show = $current_year;
            
            foreach($monthwise_amount as $row): ?>
                {
                    "month" : "<?php
                        if($financial_year_start == 'july') {
                            if($row['month'] == 'July' || $row['month'] == 'August' || $row['month'] == 'September'
                                || $row['month'] == 'October' || $row['month'] == 'November' || $row['month'] == 'December')
                                    $year_to_show = $previous_year;
                            else
                                $year_to_show = $current_year;
                        }
                        echo $row['month'] . ' (' . $year_to_show . ')'; ?>",
                    "amount": <?php echo $row['amount']; ?>,
                    "color" : "#455064"
                },
            <?php endforeach; ?> 
        ],
        "graphs"        : [{
            "balloonText"   : "[[category]]: <b>[[value]]</b>",
            "colorField"    : "color",
            "fillAlphas"    : 1,
            "lineAlpha"     : 0.1,
            "type"          : "column",
            "valueField"    : "amount"
        }],
        "depth3D"       : 20,
        "angle"         : 30,
        "chartCursor"   : {
            "categoryBalloonEnabled"    : false,
            "cursorAlpha"               : 0,
            "zoomable"                  : false
        },    
        "categoryField" : "month",
        "categoryAxis"  : {
            "gridPosition"  : "start",
            "labelRotation" : 30
        },
        "pathToImages"  : "<?php echo base_url(); ?>assets/js/amcharts/images/",
        "amExport"      : {
            "top"                   : 0,
            "right"                 : 0,
            "buttonColor"           : '#EFEFEF',
            "buttonRollOverColor"   :'#DDDDDD',
            "imageFileName"         : "Income Report",
            "exportPNG"             :true,
            "exportJPG"             :true,
            "exportPDF"             :true,
            "exportSVG"             :true
        }
    });
    
    var chart = AmCharts.makeChart("chartdiv", {
	"type"          : "pie",
	"titleField"	: "month",
	"valueField"	: "amount",
	"innerRadius"	: "40%",
	"angle"         : "15",
	"depth3D"       : 10,
	"pathToImages"	: "<?php echo base_url(); ?>assets/js/amcharts/images/",
	"amExport"      : {
            "top"                   : 0,
            "right"                 : 0,
            "buttonColor"           : '#EFEFEF',
            "buttonRollOverColor"   :'#DDDDDD',
            "imageFileName"         : "Income Report",
            "exportPNG"             :true,
            "exportJPG"             :true,
            "exportPDF"             :true,
            "exportSVG"             :true
	},
	"dataProvider"	: [
            <?php
            if($financial_year_start == 'january')
                $year_to_show = $current_year;
            
            foreach($monthwise_amount as $row): ?>
                {
                    "month" : "<?php
                        if($financial_year_start == 'july') {
                            if($row['month'] == 'July' || $row['month'] == 'August' || $row['month'] == 'September'
                                || $row['month'] == 'October' || $row['month'] == 'November' || $row['month'] == 'December')
                                    $year_to_show = $previous_year;
                            else
                                $year_to_show = $current_year;
                        }
                        echo $row['month'] . ' (' . $year_to_show . ')'; ?>",
                    "amount": <?php echo $row['amount']; ?>
                },
            <?php endforeach; ?>
	]
    });
</script>

<?php
if($financial_year_start == 'january')
    $time_range = ' (January ' . $current_year . ' - December ' . $current_year . ')';
else
    $time_range = ' (July ' . $previous_year . ' - June ' . $current_year . ')';
?>

<!-- BAR DIAGRAM STARTS-->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-title" style="width: 100%;">
                    <i class="entypo-chart-bar"></i>
                    <?php echo lang_key('income_bar') . $time_range; ?>
                    
                    <span style="float: right !important;">
                        <small><?php echo ' (' . lang_key('current_financial_year_starts_from') . ' : ' . lang_key($financial_year_start) . ')'; ?></small>
                        <a class="btn-sm btn btn-default" href="<?php echo site_url('admin/system_settings'); ?>">
                            <i class="entypo-pencil"></i>
                            <?php echo lang_key('edit_financial_year_settings');?>
                        </a>
                    </span>
                </div>
            </div>
            <div class="panel-body">
                <div id="bar_chartdiv" style="width: 100%; height: 350px;"></div>
            </div>
        </div>
    </div>
</div>
<!-- BAR DIAGRAM FINISHES-->

<div class="row">
    <!-- AM CHART STARTS-->
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-title" style="width: 100%;">
                    <i class="entypo-chart-pie"></i>
                    <?php echo get_phrase('income_percentage') . $time_range; ?>
                    
                    <span style="float: right !important;">
                        <small><?php echo ' (' . lang_key('current_financial_year_starts_from') . ' : ' . lang_key($financial_year_start) . ')'; ?></small>
                        <a class="btn-sm btn btn-default" href="<?php echo site_url('admin/system_settings'); ?>">
                            <i class="entypo-pencil"></i>
                            <?php echo lang_key('edit_financial_year_settings');?>
                        </a>
                    </span>
                </div>
            </div>
            <div class="panel-body">
                <div id="chartdiv" style="width:100%; height:350px;"></div>
            </div>
        </div>
    </div>
    <!-- AM CHART FINISHES-->
</div>

<!-----  DATA TABLE EXPORT CONFIGURATIONS ---->                      
<script type="text/javascript">

    jQuery(document).ready(function($)
    {
        var datatable = $("#table_export").dataTable({
            "sPaginationType"   : "bootstrap",
            "sDom"              : "<'row'<'col-xs-3 col-left'l><'col-xs-9 col-right'<'export-data'T>f>r>t<'row'<'col-xs-3 col-left'i><'col-xs-9 col-right'p>>"
        });

        $(".dataTables_wrapper select").select2({
            minimumResultsForSearch: -1
        });
    });
		
</script>