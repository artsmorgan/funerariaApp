<hr>
<?php
$accounts = $this->db->get_where('account', array('account_id' => $account_id))->result_array();
foreach($accounts as $account) { ?>

    <div class="row">
        <div class="col-md-8">
            <h3 style="margin-top: 0px;">
                <?php echo $account['title'] ?>
                <small><?php echo lang_key($account['type']); ?></small>
            </h3>
        </div>

        <div class="col-md-4">
            <ol class="breadcrumb bc-3 pull-right" style="margin-bottom: 0px;">
                <li><a href="<?php echo base_url(); ?>"><?php echo lang_key('home'); ?></a></li>
                <li><a href="<?php echo site_url('account/accounts'); ?>"><?php echo lang_key('account_list'); ?></a></li>
                <li class="active"><?php echo lang_key('ledger'); ?></li>
            </ol>
        </div>
    </div>
    <div style="clear: both;"></div>
    <br>
    <?php
    $count              = 1;
    $account_statements = array();

    $incomes    = $this->db->get_where('income', array('account_id' => $account['account_id']))->result_array();
    $expenses   = $this->db->get_where('expense', array('account_id' => $account['account_id']))->result_array();
    $sales      = $this->db->get_where('sale', array('account_id' => $account['account_id']))->result_array();
    $purchases  = $this->db->get_where('purchase', array('account_id' => $account['account_id']))->result_array();

    if(!empty($incomes))
        foreach($incomes as $row)
                array_push ($account_statements, array('date' => $row['date'], 'title' => $row['title'],
                    'account_id' => $row['account_id'], 'debit' => '', 'credit' => $row['amount']));

    if(!empty($expenses))
        foreach($expenses as $row)
                array_push ($account_statements, array('date' => $row['date'], 'title' => $row['title'],
                    'account_id' => $row['account_id'], 'debit' => $row['amount'], 'credit' => ''));

    if(!empty($sales))
        foreach($sales as $row)
                array_push ($account_statements, array('date' => $row['due_date'], 'title' => lang_key('sale_code') . ' : ' . $row['sale_code'],
                    'account_id' => $row['account_id'], 'debit' => '', 'credit' => $row['amount']));

    if(!empty($purchases))
        foreach($purchases as $row)
                array_push ($account_statements, array('date' => $row['due_date'], 'title' => lang_key('purchase_code') . ' : ' . $row['purchase_code'],
                    'account_id' => $row['account_id'], 'debit' => $row['amount'], 'credit' => ''));

    if(empty($account_statements)) { ?>
        <div class="alert alert-info">
            <?php echo lang_key('no_account_statements'); ?>
        </div>
    <?php } else { ?>

        <table class="table table-bordered responsive datatable" id="table_export">
            <thead>
            <tr>
                <th>#</th>
                <th><?php echo lang_key('date'); ?></th>
                <th><?php echo lang_key('title'); ?></th>
                <th><?php echo lang_key('account'); ?></th>
                <th><?php echo lang_key('credit'); ?></th>
                <th><?php echo lang_key('debit'); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php
            $total_credit   = 0;
            $total_debit    = 0;
            $balance        = 0;

            // SORT ACCOUNT STATEMENTS ARRAY BY DATE IN DESCENDING ORDER
            foreach($account_statements as $key => $row)
                $date[$key] = $row['date'];

            array_multisort($date, SORT_DESC, $account_statements);

            foreach ($account_statements as $row):
                $total_credit   += $row['credit'];
                $total_debit    += $row['debit'];
                ?>
                <tr>
                    <td><?php echo $count++ ?></td>
                    <td><?php echo date('d/m/Y', $row['date']); ?></td>
                    <td>
                        <?php
                        $title_substring = substr($row['title'], 0, 40);
                        if(strlen($row['title']) > strlen($title_substring))
                            echo $title_substring . '...';
                        else
                            echo $title_substring;
                        ?>
                    </td>
                    <td><?php echo get_db_field_by_id('account', 'title', $row['account_id']); ?></td>
                    <td><?php if($row['credit'] != '') echo show_price($row['credit']); ?></td>
                    <td><?php if($row['debit'] != '') echo show_price($row['debit']); ?></td>
                </tr>
            <?php endforeach;
            $balance = $account['balance'] + $total_credit - $total_debit; ?>
            </tbody>
        </table>

    <?php } ?>

    <table width="100%" border="0">
        <tr>
            <td align="right" width="50%"><h4 style="margin-bottom: 0px;"><b><?php echo lang_key('starting_balance'); ?></b></h4></td>
            <td align="center" width="1%"><h4 style="margin-bottom: 0px;"><b>:</b></h4></td>
            <td align="left"><h4 style="margin-bottom: 0px;"><b><?php echo show_price($account['balance']); ?></b></h4></td>
        </tr>
        <tr>
            <td align="right" width="50%"><h4 style="margin-bottom: 0px;"><b><?php echo lang_key('total_credit'); ?></b></h4></td>
            <td align="center" width="1%"><h4 style="margin-bottom: 0px;"><b>:</b></h4></td>
            <td align="left"><h4 style="margin-bottom: 0px;"><b><?php echo show_price($total_credit); ?></b></h4></td>
        </tr>
        <tr>
            <td align="right" width="50%"><h4 style="margin-top: 5px;"><b><?php echo lang_key('total_debit'); ?></b></h4></td>
            <td align="center" width="1%"><h4 style="margin-top: 5px;"><b>:</b></h4></td>
            <td align="left"><h4 style="margin-top: 5px;"><b><?php echo show_price($total_debit); ?></b></h4></td>
        </tr>
        <tr>
            <td colspan="3"><hr style="margin: 0px;"></td>
        </tr>
        <tr>
            <td align="right" width="50%"><h3 style="margin: 5px;"><b><?php echo lang_key('balance'); ?></b></h3></td>
            <td align="center" width="1%"><h3 style="margin: 5px;"><b>:</b></h3></td>
            <td align="left"><h3 style="margin: 5px;"><b><?php echo show_price($balance); ?></b></h3></td>
        </tr>
    </table>
    <br>

    <a target="blank" href="<?php echo site_url('account/print_ledger/' . $account_id); ?>" class="btn btn-primary btn-icon icon-left hidden-print">
        <i class="entypo-doc-text"></i>
        <?php echo lang_key('print'); ?>
    </a>
<?php } ?>

<!-----  DATA TABLE EXPORT CONFIGURATIONS ---->
<script type="text/javascript">

    jQuery(document).ready(function($)
    {
        var datatable = $("#table_export").dataTable({
            "sPaginationType"   : "bootstrap"
        });

        $(".dataTables_wrapper select").select2({
            minimumResultsForSearch: -1
        });
    });
    
    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data)
    {
        var mywindow = window.open('', 'Ledger', 'height=400,width=600');
        mywindow.document.write('<html><head><title>Ledger</title>');
        mywindow.document.write('<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/neon-theme.css" type="text/css" />');
        mywindow.document.write('<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/datatables/responsive/css/datatables.responsive.css" type="text/css" />');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.print();
        mywindow.close();

        return true;
    }

</script>

