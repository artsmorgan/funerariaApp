<?php
$edit_data = $this->db->get_where('sale', array('sale_id' => $sale_id))->result_array();
foreach($edit_data as $row) { ?>
    <hr style="margin-bottom: 0px;">
    <ol class="breadcrumb bc-3 pull-left" style="margin-bottom: 0px;">
        <li><a href="<?php echo base_url(); ?>"><?php echo lang_key('home'); ?></a></li>
        <li><a href="<?php echo site_url('inventory/sale'); ?>"><?php echo lang_key('sales_history'); ?></a></li>
        <li class="active"><?php echo lang_key('edit_sale'); ?></li>
    </ol>
    <br><br>
    <?php echo form_open(site_url('inventory/sale/update/' . $sale_id), array('class' => 'form-horizontal',
        'enctype' => 'multipart/form-data')); ?>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-primary" data-collapsed="0">
                        <div class="panel-heading">
                            <div class="panel-title" >
                                <i class="entypo-plus-circled"></i>
                                <?php echo lang_key('basic_information'); ?>
                            </div>
                        </div>

                        <div class="panel-body">

                            <div class="form-group">
                                <label for="field-1" class="col-sm-3 control-label"><?php echo lang_key('sale_code'); ?></label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="sale_code" readonly
                                        value="<?php echo $row['sale_code']; ?>" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="field-1" class="col-sm-3 control-label"><?php echo lang_key('customer'); ?></label>

                                <div class="col-sm-9">
                                    <select name="customer_id" class="selectboxit" required>
                                        <?php
                                        $customers = $this->db->get_where('contact', array('type' => 'customer'))->result_array();
                                        foreach($customers as $row2) { ?>
                                            <option value="<?php echo $row2['contact_id'] ?>"
                                                <?php if($row2['contact_id'] == $row['customer_id']) echo 'selected'; ?>>
                                                    <?php echo $row2['first_name'] . ' ' . $row2['last_name']; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="field-1" class="col-sm-3 control-label"><?php echo lang_key('due_date'); ?></label>

                                <div class="col-sm-9">
                                    <input type="text" name="due_date" class="form-control datepicker" placeholder="date here"
                                        data-format="D, dd MM yyyy" required value="<?php echo date("D, d M Y", $row['due_date']); ?>" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">

                    <div class="panel panel-primary" data-collapsed="0">
                        <div class="panel-heading">
                            <div class="panel-title" >
                                <i class="entypo-plus-circled"></i>
                                <?php echo lang_key('add_product_/_service'); ?>
                            </div>
                        </div>

                        <div class="panel-body">

                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="col-md-12 col-sm-12">
                                        <select onchange="return get_product_for_sale(this.value)" class="selectboxit" name="product_id" required>
                                            <option value="0"><?php echo lang_key('add_a_product_/_service'); ?></option>
                                            <optgroup label="<?php echo lang_key('products'); ?>">
                                                <?php
                                                $products = $this->db->get_where('product', array('type' => 'product'))->result_array();
                                                foreach ($products as $row2): ?>
                                                    <option value="<?php echo $row2['product_id']; ?>">
                                                        - <?php echo $row2['name']; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </optgroup>

                                            <optgroup label="<?php echo lang_key('services'); ?>">
                                                <?php
                                                $services = $this->db->get_where('product', array('type' => 'service'))->result_array();
                                                foreach ($services as $row2): ?>
                                                    <option value="<?php echo $row2['product_id']; ?>">
                                                        - <?php echo $row2['name']; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-9">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th><?php echo lang_key('product_code'); ?></th>
                                                <th><?php echo lang_key('name'); ?></th>
                                                <th><?php echo lang_key('quantity'); ?></th>
                                                <th><?php echo lang_key('unit_price'); ?></th>
                                                <th><?php echo lang_key('total'); ?></th>
                                                <th><i class="entypo-trash"></i></th>
                                            </tr>
                                        </thead>
                                        <tbody id="sale_entry_holder">
                                            <?php
                                            $sub_total      = 0;
                                            $total_number   = 1;
                                            $sale_items     = $this->db->get_where('sale_item', array('sale_id' => $sale_id))->result_array();
                                            foreach($sale_items as $row2) {
                                                $product_total_price    = $row2['quantity'] * $row2['sale_price'];
                                                $sub_total              += $product_total_price;
                                                $product                = $this->db->get_where('product', array('product_id' => $row2['product_id']))->row();
                                                ?>
                                                <tr id="entry_row_<?php echo $total_number; ?>">
                                                    <td id="serial_<?php echo $total_number; ?>"><?php echo $total_number; ?></td>
                                                    <td><?php echo $product->product_code; ?></td>
                                                    <td><?php echo $product->name; ?> 
                                                        <input type="hidden" name="product_id[]" value="<?php echo $product->product_id; ?>"
                                                            id="single_entry_product_id_<?php echo $total_number; ?>">
                                                    </td>
                                                    <td>
                                                        <input type="number" name="quantity[]" class="form-control" value="<?php echo $row2['quantity']; ?>" min="1"
                                                            id="single_entry_quantity_<?php echo $total_number; ?>"
                                                            onkeyup="calculate_single_entry_sum(<?php echo $total_number; ?>)"
                                                            onclick="calculate_single_entry_sum(<?php echo $total_number; ?>)">
                                                    </td>
                                                    <td>
                                                        <input type="number" name="sale_price[]" class="form-control" value="<?php echo $row2['sale_price']; ?>" min="1"
                                                               id="single_entry_sale_price_<?php echo $total_number; ?>"
                                                               onkeyup="calculate_single_entry_sum(<?php echo $total_number; ?>)"
                                                               onclick="calculate_single_entry_sum(<?php echo $total_number; ?>)">
                                                    </td>
                                                    <td id="single_entry_total_<?php echo $total_number; ?>"><?php echo $product_total_price; ?></td>
                                                    <td>
                                                        <i class="entypo-trash tooltip-primary" data-toggle="tooltip" 
                                                            data-original-title="<?php echo lang_key('delete'); ?>"
                                                            onclick="delete_row(<?php echo $total_number; ?>)" style="cursor: pointer;"
                                                            id="delete_button_<?php echo $total_number; ?>"></i>
                                                    </td>
                                                </tr>
                                                <?php $total_number++;
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-primary" data-collapsed="0">
                        <div class="panel-heading">
                            <div class="panel-title" >
                                <i class="entypo-plus-circled"></i>
                                <?php echo lang_key('payment_information'); ?>
                            </div>
                        </div>

                        <div class="panel-body">

                            <div class="form-group">
                                <label for="field-1" class="col-sm-3 control-label"><?php echo lang_key('sub_total'); ?></label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="sub_total" id="sub_total" value="<?php echo $sub_total; ?>" readonly />
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="field-1" class="col-sm-3 control-label"><?php echo lang_key('VAT'); ?></label>

                                <div class="col-sm-9">
                                    <select name="vat_id" id="vat" class="selectboxit" required onchange="calculate_grand_total()">
                                        <option value="0"><?php echo lang_key('select_VAT'); ?></option>
                                        <option value="0" <?php if($row['vat_id'] == 0) echo 'selected'; ?>>
                                            <?php echo lang_key('no_VAT'); ?></option>
                                        <?php
                                        $vats = $this->db->get('vat')->result_array();
                                        foreach($vats as $row2) { ?>
                                            <option value="<?php echo $row2['vat_id'] ?>"
                                                <?php if($row2['vat_id'] == $row['vat_id']) echo 'selected'; ?>>
                                                    <?php echo $row2['name'] . ' (' . $row2['percentage'] . '%)'; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="field-1" class="col-sm-3 control-label"><?php echo lang_key('discount_amount'); ?></label>

                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="discount" id="discount" value="<?php echo $row['discount']; ?>" required
                                        onkeyup="calculate_grand_total()" onclick="calculate_grand_total()" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="field-1" class="col-sm-3 control-label"><?php echo lang_key('grand_total'); ?></label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="amount" id="grand_total" value="<?php echo $row['amount']; ?>" readonly />
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="field-1" class="col-sm-3 control-label"><?php echo lang_key('financial_account'); ?></label>

                                <div class="col-sm-9">
                                    <select name="account_id" class="selectboxit" required>
                                        <option value="0"><?php echo lang_key('select_an_account'); ?></option>
                                        <optgroup label="<?php echo lang_key('bank_accounts'); ?>">
                                            <?php
                                            $accounts = $this->db->get_where('account', array('type' => 'bank'))->result_array();
                                            foreach ($accounts as $row2): ?>
                                                <option value="<?php echo $row2['account_id']; ?>"
                                                    <?php if($row2['account_id'] == $row['account_id']) echo 'selected'; ?>>
                                                        - <?php echo $row2['title']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </optgroup>
                                        <optgroup label="<?php echo lang_key('cash_accounts'); ?>">
                                            <?php
                                            $accounts = $this->db->get_where('account', array('type' => 'cash'))->result_array();
                                            foreach ($accounts as $row2): ?>
                                                <option value="<?php echo $row2['account_id']; ?>"
                                                    <?php if($row2['account_id'] == $row['account_id']) echo 'selected'; ?>>
                                                        - <?php echo $row2['title']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </optgroup>
                                        <optgroup label="<?php echo lang_key('other_accounts'); ?>">
                                            <?php
                                            $accounts = $this->db->get_where('account', array('type' => 'other'))->result_array();
                                            foreach ($accounts as $row): ?>
                                                <option value="<?php echo $row['account_id']; ?>"
                                                    <?php if($row2['account_id'] == $row['account_id']) echo 'selected'; ?>>
                                                        - <?php echo $row['title']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-5">
                    <button type="submit" class="btn btn-info">
                        <?php echo lang_key('update_sale'); ?>
                    </button>
                </div>
            </div>
    <?php echo form_close();
} ?>

<script type="text/javascript">

    var total_number = <?php echo $this->db->get_where('sale_item', array('sale_id' => $sale_id))->num_rows(); ?>;
    function get_product_for_sale(product_id)
    {
        if(product_id != 0) {
            total_number++;

            $.ajax({
                url: '<?php echo base_url(); ?>index.php/inventory/get_product_for_sale/' +  product_id + '/' + total_number,
                success: function(response)
                {
                    jQuery('#sale_entry_holder').append(response);
                    calculate_sub_total_for_sale();
                    
                    // INTIALIZE TOOLTIP FOR AJAX RESPONSE
                    $(".tooltip-primary").tooltip();
                }
            });
        }
    }

    function calculate_single_entry_sum(entry_number)
    {
        quantity            = $("#single_entry_quantity_"+entry_number).val();
        sale_price          = $("#single_entry_sale_price_"+entry_number).val();
        single_entry_total  = quantity * sale_price;
        $("#single_entry_total_"+entry_number).html(single_entry_total);
        calculate_sub_total_for_sale();

    }

    function delete_row(entry_number)
    {
        $("#entry_row_"+entry_number).remove();

        for (var i = entry_number ; i < total_number ; i++)
        {
            $("#serial_" + (i + 1)).attr("id" , "serial_" + i);
            $("#serial_" + (i)).html(i);

            $("#single_entry_quantity_" + (i + 1)).attr("id" , "single_entry_quantity_" + i);
            $("#single_entry_quantity_" + (i)).attr({onkeyup: "calculate_single_entry_sum(" + i + ")" , onclick: "calculate_single_entry_sum(" + i + ")"});

            $("#single_entry_sale_price_" + (i + 1)).attr("id" , "single_entry_sale_price_" + i);
            $("#single_entry_sale_price_" + (i)).attr({onkeyup: "calculate_single_entry_sum(" + i + ")" , onclick: "calculate_single_entry_sum(" + i + ")"});

            $("#single_entry_total_" + (i + 1)).attr("id" , "single_entry_total_" + i);

            $("#delete_button_" + (i + 1)).attr("id" , "delete_button_" + i);
            $("#delete_button_" + (i)).attr("onclick" , "delete_row(" + i + ")");

            $("#entry_row_" + (i + 1)).attr("id" , "entry_row_" + i);
        }

        total_number--;
        calculate_sub_total_for_sale();
    }

    function calculate_sub_total_for_sale()
    {
        sub_total = 0;
        for (var i = 1 ; i <= total_number ; i++)
        {
            sub_total += Number( $("#single_entry_total_"+ i).html() );
        }

        document.getElementById('sub_total').value = sub_total;
        
        calculate_grand_total();
    }
    
    function calculate_grand_total()
    {
        var sub_total   = document.getElementById('sub_total').value;
        var vat_id      = document.getElementById('vat').value;
        var discount    = document.getElementById('discount').value;
        
        $.ajax({
            url: '<?php echo base_url(); ?>index.php/inventory/get_grand_total_for_purchase/' + sub_total + '/' + vat_id + '/' + discount,
            success: function(response)
            {
                document.getElementById('grand_total').value = response;
            }
        });
    }

</script>