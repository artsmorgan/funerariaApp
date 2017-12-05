<hr>
<?php echo form_open(site_url('inventory/purchase/create'), array('class' => 'form-horizontal',
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
                            <label for="field-1" class="col-sm-3 control-label"><?php echo lang_key('purchase_code'); ?></label>

                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="purchase_code" readonly
                                    value="<?php echo substr(md5(rand(100000000, 200000000)), 0, 10); ?>" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo lang_key('supplier'); ?></label>

                            <div class="col-sm-9">
                                <select name="supplier_id" class="selectboxit" required>
                                    <?php
                                    $suppliers = $this->db->get_where('contact', array('type' => 'supplier'))->result_array();
                                    foreach($suppliers as $row) { ?>
                                        <option value="<?php echo $row['contact_id'] ?>">
                                            <?php echo $row['first_name'] . ' ' . $row['last_name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo lang_key('due_date'); ?></label>

                            <div class="col-sm-9">
                                <input type="text" name="due_date" class="form-control datepicker" placeholder="date here"
                                    data-format="D, dd MM yyyy" required />
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
                                    <select onchange="return get_product_for_purchase(this.value)" class="form-control selectboxit" name="product_id" required>
                                        <option value="0"><?php echo lang_key('add_a_product_/_service'); ?></option>
                                        <optgroup label="<?php echo lang_key('products'); ?>">
                                            <?php
                                            $products = $this->db->get_where('product', array('type' => 'product'))->result_array();
                                            foreach ($products as $row): ?>
                                                <option value="<?php echo $row['product_id']; ?>">
                                                    - <?php echo $row['name']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </optgroup>
                                        
                                        <optgroup label="<?php echo lang_key('services'); ?>">
                                            <?php
                                            $services = $this->db->get_where('product', array('type' => 'service'))->result_array();
                                            foreach ($services as $row): ?>
                                                <option value="<?php echo $row['product_id']; ?>">
                                                    - <?php echo $row['name']; ?>
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
                                    <tbody id="purchase_entry_holder"></tbody>
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
                                <input type="text" class="form-control" name="sub_total" id="sub_total" value="0" readonly />
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo lang_key('VAT'); ?></label>

                            <div class="col-sm-9">
                                <select name="vat_id" id="vat" class="selectboxit" required onchange="calculate_grand_total()">
                                    <option value="0"><?php echo lang_key('select_VAT'); ?></option>
                                    <option value="0"><?php echo lang_key('no_VAT'); ?></option>
                                    <?php
                                    $vats = $this->db->get('vat')->result_array();
                                    foreach($vats as $row) { ?>
                                        <option value="<?php echo $row['vat_id'] ?>">
                                            <?php echo $row['name'] . ' (' . $row['percentage'] . '%)'; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo lang_key('discount_amount'); ?></label>

                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="discount" id="discount" value="0" required
                                    onkeyup="calculate_grand_total()" onclick="calculate_grand_total()" />
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo lang_key('grand_total'); ?></label>

                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="amount" id="grand_total" value="0" readonly />
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
                                        foreach ($accounts as $row): ?>
                                            <option value="<?php echo $row['account_id']; ?>">
                                                - <?php echo $row['title']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </optgroup>
                                    <optgroup label="<?php echo lang_key('cash_accounts'); ?>">
                                        <?php
                                        $accounts = $this->db->get_where('account', array('type' => 'cash'))->result_array();
                                        foreach ($accounts as $row): ?>
                                            <option value="<?php echo $row['account_id']; ?>">
                                                - <?php echo $row['title']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </optgroup>
                                    <optgroup label="<?php echo lang_key('other_accounts'); ?>">
                                        <?php
                                        $accounts = $this->db->get_where('account', array('type' => 'other'))->result_array();
                                        foreach ($accounts as $row): ?>
                                            <option value="<?php echo $row['account_id']; ?>">
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
                    <?php echo lang_key('create_new_purchase'); ?>
                </button>
            </div>
        </div>
<?php echo form_close(); ?>

<script type="text/javascript">

    var total_number = 0;
    function get_product_for_purchase(product_id)
    {
        if(product_id != 0) {
            total_number++;

            $.ajax({
                url: '<?php echo base_url(); ?>index.php/inventory/get_product_for_purchase/' +  product_id + '/' + total_number,
                success: function(response)
                {
                    jQuery('#purchase_entry_holder').append(response);
                    calculate_sub_total_for_purchase();
                    
                    // INTIALIZE TOOLTIP FOR AJAX RESPONSE
                    $(".tooltip-primary").tooltip();
                }
            });
        }
    }

    function calculate_single_entry_sum(entry_number)
    {
        quantity            = $("#single_entry_quantity_"+entry_number).val();
        purchase_price      = $("#single_entry_purchase_price_"+entry_number).val();
        single_entry_total  = quantity * purchase_price;
        $("#single_entry_total_"+entry_number).html(single_entry_total);
        calculate_sub_total_for_purchase();

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

            $("#single_entry_purchase_price_" + (i + 1)).attr("id" , "single_entry_purchase_price_" + i);
            $("#single_entry_purchase_price_" + (i)).attr({onkeyup: "calculate_single_entry_sum(" + i + ")" , onclick: "calculate_single_entry_sum(" + i + ")"});

            $("#single_entry_total_" + (i + 1)).attr("id" , "single_entry_total_" + i);

            $("#delete_button_" + (i + 1)).attr("id" , "delete_button_" + i);
            $("#delete_button_" + (i)).attr("onclick" , "delete_row(" + i + ")");

            $("#entry_row_" + (i + 1)).attr("id" , "entry_row_" + i);
        }

        total_number--;
        calculate_sub_total_for_purchase();
    }

    function calculate_sub_total_for_purchase()
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