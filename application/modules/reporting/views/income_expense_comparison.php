<?php
$currency_code      = $this->db->get_where('settings', array('type' => 'system_currency_id'))->row()->description;
$currency_symbol    = get_currency_icon($currency_code);
?>

<br>
<?php echo form_open(site_url('reporting/income_expense_comparison') , array('class' => 'form-horizontal form-groups validate',  'id' => 'date_selector_form'));?>

<!-- REPORT DATE RANGE SELECTOR STARTS-->           
    <div class="form-group">

        <div class="col-sm-5 col-sm-offset-3">
            <div class="daterange daterange-inline add-ranges" data-format="D MMMM, YYYY" 
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
$count                  = 1;
$total_income_amount    = 0;
$total_expense_amount   = 0;
$total_balance          = array();

$incomes    = $this->db->get('income')->result_array();
$sales      = $this->db->get('sale')->result_array();
$expenses   = $this->db->get('expense')->result_array();
$purchases  = $this->db->get('purchase')->result_array();

if(!empty($incomes))
    foreach($incomes as $row)
        if($timestamp_start <= $row['date'] && $timestamp_end >= $row['date'])
            array_push($total_balance, array('date' => $row['date'], 'title' => $row['title'],
                'account_id' => $row['account_id'], 'amount' => $row['amount'], 'type' => 'income'));
        
if(!empty($sales))
    foreach($sales as $row)
        if($timestamp_start <= $row['due_date'] && $timestamp_end >= $row['due_date'])
            array_push($total_balance, array('date' => $row['due_date'], 'title' => lang_key('sale_code') . ' : ' . $row['sale_code'],
                'account_id' => $row['account_id'], 'amount' => $row['amount'], 'type' => 'income'));

if(!empty($expenses))
    foreach($expenses as $row)
        if($timestamp_start <= $row['date'] && $timestamp_end >= $row['date'])
            array_push($total_balance, array('date' => $row['date'], 'title' => $row['title'],
                'account_id' => $row['account_id'], 'amount' => $row['amount'], 'type' => 'expense'));
        
if(!empty($purchases))
    foreach($purchases as $row)
        if($timestamp_start <= $row['due_date'] && $timestamp_end >= $row['due_date'])
            array_push($total_balance, array('date' => $row['due_date'], 'title' => lang_key('purchase_code') . ' : ' . $row['purchase_code'],
                'account_id' => $row['account_id'], 'amount' => $row['amount'], 'type' => 'expense'));

if(empty($total_balance)) { ?>
    <div class="alert alert-info"><?php echo lang_key('no_expenses');?></div>
<?php } else { ?>

    <table class="table table-bordered responsive datatable" id="table_export">
        <thead>
            <tr>
                <th>#</th>
                <th><?php echo lang_key('date'); ?></th>
                <th><?php echo lang_key('title'); ?></th>
                <th><?php echo lang_key('account'); ?></th>
                <th><?php echo lang_key('type'); ?></th>
                <th><?php echo lang_key('amount'); ?></th>
            </tr>
        </thead>
        
        <tbody>
            <?php
            // SORT TOTAL BALANCE ARRAY BY DATE IN DESCENDING ORDER
            foreach($total_balance as $key => $row)
                $date[$key] = $row['date'];
            
            array_multisort($date, SORT_DESC, $total_balance);

            foreach($total_balance as $row):
                if($row['type'] == 'income')
                    $total_income_amount += $row['amount'];
                if($row['type'] == 'expense')
                    $total_expense_amount += $row['amount']; ?>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td><?php echo date('d/m/Y', $row['date']); ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td>
                        <?php echo get_db_field_by_id('account', 'title', $row['account_id']); ?>
                    </td>
                    <td><?php echo lang_key($row['type']); ?></td>
                    <td><?php echo show_price($row['amount']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php } ?>

<div class="row">
    <div class="col-md-offset-3 col-sm-3">

        <div class="tile-stats tile-white tile-white-primary">
            <div class="icon" style="margin-bottom: 17px;"><i class="entypo-database"></i></div>
            <div class="num" data-start="0" data-end="<?php echo $total_income_amount; ?>"
                data-prefix="<?php echo $currency_symbol; ?>" style="font-weight:200;"
                data-postfix="" data-duration="1500" data-delay="0">
                    0
            </div>
            <h3 style="font-weight:200; font-size: 15px;"><?php echo lang_key('total_income'); ?></h3>
        </div>

    </div>

    <div class="col-sm-3">

        <div class="tile-stats tile-white tile-white-primary">
            <div class="icon" style="margin-bottom: 21px;"><i class="entypo-tag"></i></div>
            <div class="num" data-start="0" data-end="<?php echo $total_expense_amount; ?>"
                data-prefix="<?php echo $currency_symbol; ?>" style="font-weight:200;"
                data-postfix="" data-duration="1500" data-delay="0">
                    0
            </div>
            <h3 style="font-weight:200; font-size: 15px;"><?php echo lang_key('total_expense'); ?></h3>
        </div>

    </div>
</div>

<script>

    var chart = AmCharts.makeChart("chartdiv", {
        "type"          : "pie",
        "titleField"    : "report_type",
        "valueField"    : "amount",
        "innerRadius"   : "40%",
        "angle"         : "15",
        "depth3D"       : 10,
        "pathToImages"  : "<?php echo base_url();?>assets/js/amcharts/images/",
        "amExport": {
            "top"                   : 0,
            "right"                 : 0,
            "buttonColor"           : '#EFEFEF',
            "buttonRollOverColor"   : '#DDDDDD',
            "imageFileName"         : "Income Expense Comparison Report",
            "exportPNG"             :true,
            "exportJPG"             :true,
            "exportPDF"             :true,
            "exportSVG"             :true
        },
        "dataProvider"  : [
            {
                "report_type"   : "<?php echo lang_key('expense'); ?>",
                "amount"        : <?php echo $total_expense_amount; ?>
            },
            {
                "report_type"   : "<?php echo lang_key('income'); ?>",
                "amount"        : <?php echo $total_income_amount; ?>
            }
        ]
    });
</script>	

<div class="row">
    <!-- AM CHART STARTS-->
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-title">
                    <i class="entypo-chart-pie"></i>
                    <?php echo lang_key('income_expense_percentage') . ' (' . date('d F, Y', $timestamp_start)
                        . ' - ' . date('d F, Y', $timestamp_end) . ')'; ?> 
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