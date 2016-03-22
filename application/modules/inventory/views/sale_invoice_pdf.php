<?php
$sale_id    = $id;
$edit_data  = $this->db->get_where('sale', array('sale_id' => $sale_id))->result_array();
foreach ($edit_data as $row) { ?>
    <div>
        <table width="100%" border="0">
            <tr>
                <td width="50%"><img src="uploads/logo.png" style="max-height:80px;"></td>
                <td align="right">
                    <h4><b><?php echo lang_key('sale_code'); ?> : <?php echo $row['sale_code']; ?></b></h4>
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
                    $customer = $this->db->get_where('contact', array('contact_id' => $row['customer_id']))->row();
                    echo '<h4><b>' . $customer->first_name . ' ' . $customer->last_name . '</h4></b>'; ?>
                    <?php echo $customer->address; ?><br>
                    <?php echo $customer->phone; ?><br>
                    <?php echo $customer->email; ?><br>
                </td>
            </tr>
        </table>
        <hr>
        
        <h4><?php echo lang_key('sale_items'); ?></h4>
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
                $sale_items         = $this->db->get_where('sale_item', array('sale_id' => $sale_id))->result_array();
                foreach ($sale_items as $row2)
                {
                    $product_total_price    = $row2['quantity'] * $row2['sale_price'];
                    $sub_total              += $product_total_price;
                    $product                = $this->db->get_where('product', array('product_id' => $row2['product_id']))->row(); ?>
                    <tr>
                        <td class="text-center"><?php echo $i++; ?></td>
                        <td><?php echo $product->product_code; ?></td>
                        <td><?php echo $product->name; ?></td>
                        <td><?php echo $row2['quantity']; ?></td>
                        <td><?php echo $currency_symbol . ' ' . $row2['sale_price']; ?></td>
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
<?php } ?>