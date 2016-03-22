<hr style="margin-bottom: 0px;">
<ol class="breadcrumb bc-3 pull-left" style="margin-bottom: 0px;">
    <li><a href="<?php echo base_url(); ?>"><?php echo lang_key('home'); ?></a></li>
    <li><a href="<?php echo site_url('inventory/purchase'); ?>"><?php echo lang_key('purchase_history'); ?></a></li>
    <li class="active"><?php echo lang_key('purchase_invoice'); ?></li>
</ol>
<br><br>
<?php
$edit_data = $this->db->get_where('purchase', array('purchase_id' => $purchase_id))->result_array();
foreach ($edit_data as $row): ?>
    <div id="invoice_print">
        <table width="100%" border="0">
            <tr>
                <td width="50%"><img src="<?php echo base_url(); ?>uploads/logo.png" style="max-height:80px;"></td>
                <td align="right">
                    <h4><b><?php echo lang_key('purchase_code'); ?> : <?php echo $row['purchase_code']; ?></b></h4>
                    <h5><?php echo lang_key('creation_date'); ?> : <?php echo date('d/m/Y',$row['creation_date']); ?></h5>
                    <h5><?php echo lang_key('due_date'); ?> : <?php echo date('d/m/Y',$row['due_date']); ?></h5>
                    <h5>
                        <?php $account_title = get_db_field_by_id('account', 'title', $row['account_id']);
                        echo lang_key('account'); ?> : <?php echo $account_title; ?>
                    </h5>
                </td>
            </tr>
        </table>
        <hr>
        
        <table width="100%" border="0">    
            <tr>
                <td align="left"><h4><?php echo lang_key('from'); ?> </h4></td>
                <td align="right"><h4><?php echo lang_key('to'); ?> </h4></td>
            </tr>

            <tr>
                <td align="left" valign="top">
                    <h4><b><?php echo $this->db->get_where('settings', array('type' => 'system_title'))->row()->description; ?></h4></b>
                </td>
                <td align="right" valign="top">
                    <?php
                    $supplier = $this->db->get_where('contact', array('contact_id' => $row['supplier_id']))->row();
                    echo '<h4><b>' . $supplier->first_name . ' ' . $supplier->last_name . '</h4></b>'; ?>
                    <?php echo $supplier->address; ?><br>
                    <?php echo $supplier->phone; ?><br>
                    <?php echo $supplier->email; ?><br>
                </td>
            </tr>
        </table>
        <hr>
        
        <h4><?php echo lang_key('purchase_items'); ?></h4>
        <table class="table table-bordered" width="100%" border="1" style="border-collapse:collapse;">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th><?php echo lang_key('product_code'); ?></th>
                    <th><?php echo lang_key('name'); ?></th>
                    <th><?php echo lang_key('quantity'); ?></th>
                    <th><?php echo lang_key('unit_price'); ?></th>
                    <th><?php echo lang_key('total'); ?></th>
                </tr>
            </thead>

            <tbody>
                <?php
                $sub_total          = 0;
                $i                  = 1;
                $currency_code      = $this->db->get_where('settings', array('type' => 'system_currency_id'))->row()->description;
                $currency_symbol    = get_currency_icon($currency_code);
                $purchase_items     = $this->db->get_where('purchase_item', array('purchase_id' => $purchase_id))->result_array();
                foreach ($purchase_items as $row2)
                {
                    $product_total_price    = $row2['quantity'] * $row2['purchase_price'];
                    $sub_total              += $product_total_price;
                    $product                = $this->db->get_where('product', array('product_id' => $row2['product_id']))->row(); ?>
                    <tr>
                        <td class="text-center"><?php echo $i++; ?></td>
                        <td><?php echo $product->product_code; ?></td>
                        <td><?php echo $product->name; ?></td>
                        <td><?php echo $row2['quantity']; ?></td>
                        <td><?php echo $currency_symbol . ' ' . $row2['purchase_price']; ?></td>
                        <td><?php echo $currency_symbol . ' ' . $product_total_price; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        
        <table width="100%" border="0">    
            <tr>
                <td align="right" width="90%"><?php echo lang_key('sub_total'); ?> :</td>
                <td align="right"><?php echo $currency_symbol . ' ' . $sub_total; ?></td>
            </tr>
            <tr>
                <td align="right" width="90%"><?php echo lang_key('vat'); ?> :</td>
                <td align="right">
                    <?php
                    if($row['vat_id'] != 0) {
                        $vat = $this->db->get_where('vat', array('vat_id' => $row['vat_id']))->row();
                        echo $vat->name . ' (' . $vat->percentage . '%)';
                    } else
                        echo lang_key('no_vat'); ?>
                </td>
            </tr>
            <tr>
                <td align="right" width="90%"><?php echo lang_key('discount'); ?> :</td>
                <td align="right"><?php echo $currency_symbol . ' ' . $row['discount']; ?> </td>
            </tr>
            <tr>
                <td colspan="2"><hr style="margin:0px;"></td>
            </tr>
            <tr>
                <td align="right" width="90%"><h4><b><?php echo lang_key('grand_total'); ?> :</b></h4></td>
                <td align="right"><h4><b><?php echo $currency_symbol . ' ' . $row['amount']; ?></b></h4></td>
            </tr>
        </table>
    </div>
    <br>

    <a onClick="PrintElem('#invoice_print')" class="btn btn-primary btn-icon icon-left hidden-print">
        <i class="entypo-doc-text"></i>
        <?php echo lang_key('print'); ?>
    </a>

    <?php echo form_open(site_url('admin/email_invoice/' . $purchase_id . '/purchase'), array('class' => 'pull-left', 'style' => 'margin:0px 5px;')); ?>
        <button type="submit" class="btn btn-primary btn-icon icon-left">
            <i class="entypo-rocket"></i>
            <?php echo lang_key('email_invoice'); ?>
        </button> 
    <?php echo form_close(); ?>
    
<?php endforeach; ?>




<script type="text/javascript">

    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data)
    {
        var mywindow = window.open('', 'invoice', 'height=400,width=600');
        mywindow.document.write('<html><head><title>Purchase Invoice</title>');
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