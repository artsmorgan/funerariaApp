<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">

            <div class="panel-body">

                <?php echo form_open(site_url('reporting/account_statement'), array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data')); ?>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-4 control-label"><?php echo lang_key('account'); ?></label>

                        <div class="col-sm-4">
                            <select name="account_id" class="selectboxit" required>
                                <option value="all" <?php if($account_id == 'all') echo 'selected'; ?>>
                                    <?php echo lang_key('all_accounts'); ?>
                                </option>
                                <?php
                                $accounts = $this->db->get('account')->result_array();
                                foreach($accounts as $row) { ?>
                                    <option value="<?php echo $row['account_id'] ?>"
                                        <?php if($account_id == $row['account_id']) echo 'selected'; ?>>
                                            <?php echo $row['title']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                
                    <div class="form-group">
                        <label for="field-1" class="col-sm-4 control-label"><?php echo lang_key('transaction'); ?></label>

                        <div class="col-sm-4">
                            <select name="transaction_type" class="selectboxit" required>
                                <option value="all" <?php if($transaction_type == 'all') echo 'selected'; ?>>
                                    <?php echo lang_key('all_transactions'); ?>
                                </option>
                                <option value="debit" <?php if($transaction_type == 'debit') echo 'selected'; ?>>
                                    <?php echo lang_key('debit'); ?>
                                </option>
                                <option value="credit" <?php if($transaction_type == 'credit') echo 'selected'; ?>>
                                    <?php echo lang_key('credit'); ?>
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-4 control-label"><?php echo lang_key('from_date'); ?></label>

                        <div class="col-sm-4">
                            <input type="text" name="from_date" class="form-control datepicker" placeholder="date here"
                                data-format="D, dd MM yyyy" value="<?php echo date("D, d M Y", $from_date); ?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-4 control-label"><?php echo lang_key('to_date'); ?></label>

                        <div class="col-sm-4">
                            <input type="text" name="to_date" class="form-control datepicker" placeholder="date here"
                                data-format="D, dd MM yyyy" value="<?php echo date("D, d M Y", $to_date); ?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-4">
                            <button type="submit" class="btn btn-info" id="submit-button">
                                <?php echo lang_key('filter'); ?>
                            </button>
                        </div>
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

<?php
$count              = 1;
$account_statements = array();

if($account_id == 'all') {
    $incomes    = $this->db->get('income')->result_array();
    $expenses   = $this->db->get('expense')->result_array();
    $sales      = $this->db->get('sale')->result_array();
    $purchases  = $this->db->get('purchase')->result_array();
} else {
    $incomes    = $this->db->get_where('income', array('account_id' => $account_id))->result_array();
    $expenses   = $this->db->get_where('expense', array('account_id' => $account_id))->result_array();
    $sales      = $this->db->get_where('sale', array('account_id' => $account_id))->result_array();
    $purchases  = $this->db->get_where('purchase', array('account_id' => $account_id))->result_array();
}

if($transaction_type == 'all') {
    if(!empty($incomes))
        foreach($incomes as $row)
            if($from_date <= $row['date'] && $to_date >= $row['date'])
                array_push ($account_statements, array('date' => $row['date'], 'title' => $row['title'],
                    'account_id' => $row['account_id'], 'debit' => '', 'credit' => $row['amount']));

    if(!empty($expenses))
        foreach($expenses as $row)
            if($from_date <= $row['date'] && $to_date >= $row['date'])
                array_push ($account_statements, array('date' => $row['date'], 'title' => $row['title'],
                    'account_id' => $row['account_id'], 'debit' => $row['amount'], 'credit' => ''));

    if(!empty($sales))
        foreach($sales as $row)
            if($from_date <= $row['due_date'] && $to_date >= $row['due_date'])
                array_push ($account_statements, array('date' => $row['due_date'], 'title' => lang_key('sale_code') . ' : ' . $row['sale_code'],
                    'account_id' => $row['account_id'], 'debit' => '', 'credit' => $row['amount']));

    if(!empty($purchases))
        foreach($purchases as $row)
            if($from_date <= $row['due_date'] && $to_date >= $row['due_date'])
                array_push ($account_statements, array('date' => $row['due_date'], 'title' => lang_key('purchase_code') . ' : ' . $row['purchase_code'],
                    'account_id' => $row['account_id'], 'debit' => $row['amount'], 'credit' => ''));
}

if($transaction_type == 'debit') {
    if(!empty($expenses))
        foreach($expenses as $row)
            if($from_date <= $row['date'] && $to_date >= $row['date'])
                array_push ($account_statements, array('date' => $row['date'], 'title' => $row['title'],
                    'account_id' => $row['account_id'], 'debit' => $row['amount'], 'credit' => ''));

    if(!empty($purchases))
        foreach($purchases as $row)
            if($from_date <= $row['due_date'] && $to_date >= $row['due_date'])
                array_push ($account_statements, array('date' => $row['due_date'], 'title' => lang_key('purchase_code') . ' : ' . $row['purchase_code'],
                    'account_id' => $row['account_id'], 'debit' => $row['amount'], 'credit' => ''));
}

if($transaction_type == 'credit') {
    if(!empty($incomes))
        foreach($incomes as $row)
            if($from_date <= $row['date'] && $to_date >= $row['date'])
                array_push ($account_statements, array('date' => $row['date'], 'title' => $row['title'],
                    'account_id' => $row['account_id'], 'debit' => '', 'credit' => $row['amount']));

    if(!empty($sales))
        foreach($sales as $row)
            if($from_date <= $row['due_date'] && $to_date >= $row['due_date'])
                array_push ($account_statements, array('date' => $row['due_date'], 'title' => lang_key('sale_code') . ' : ' . $row['sale_code'],
                    'account_id' => $row['account_id'], 'debit' => '', 'credit' => $row['amount']));
}

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
            $balance = $total_credit - $total_debit; ?>
        </tbody>
    </table>
    
<?php } ?>

<table width="100%" border="0">    
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