<script src="<?php echo base_url();?>assets/js/jquery-2.1.1.min.js"></script>
<?php
$accounts = $this->db->get_where('account', array('account_id' => $account_id))->result_array();
foreach($accounts as $account) { ?>

    <div id="ledger_print">
        <h3 style="margin-top: 0px; text-align: center;">
            <?php echo $account['title'] ?>
            <small><?php echo lang_key($account['type']); ?></small>
        </h3>
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
            <center>
                <table style="width: 100%; border-collapse: collapse; border: 1px solid #ccc;
                    margin-top: 10px;" border="1">
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
        </center>
        <?php } ?>
        
        <br>
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
    </div>
    <br>
    <center>
        <a href="#" onClick="PrintElem('#ledger_print')" class="btn btn-green btn-icon icon-left hidden-print">
            <i class="entypo-doc-text"></i>
            <?php echo lang_key('print'); ?>
        </a>
    </center>
<?php } ?>


<!-----  DATA TABLE EXPORT CONFIGURATIONS ---->
<script type="text/javascript">

    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data)
    {
        var mywindow = window.open('', 'Ledger', 'height=400,width=600');
        mywindow.document.write('<html><head><title>Ledger</title>');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.print();
        mywindow.close();

        return true;
    }

</script>

