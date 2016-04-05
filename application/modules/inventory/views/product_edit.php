<?php
$edit_data = $this->db->get_where('product', array('product_id' => $param3))->result_array();
foreach($edit_data as $row) { ?>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title" >
                        <i class="entypo-plus-circled"></i>
                        <?php echo lang_key('edit_' . $row['type']); ?>
                    </div>
                </div>

                <div class="panel-body">

                    <?php echo form_open(site_url('inventory/products/update/' . $param3), array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data')); ?>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo lang_key('code'); ?></label>

                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="product_code" readonly
                                value="<?php echo $row['product_code']; ?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo lang_key($row['type'] . '_name'); ?></label>

                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>" required />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo lang_key($row['type'] . '_category'); ?></label>

                        <div class="col-sm-5">
                            <select name="product_category_id" class="selectboxit" required>
                                <?php
                                $categories = $this->db->get('product_category')->result_array();
                                foreach($categories as $row2) { ?>
                                    <option value="<?php echo $row2['product_category_id'] ?>"
                                        <?php if($row2['product_category_id'] == $row['product_category_id']) echo 'selected'; ?>>
                                            <?php echo $row2['name']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo lang_key('unit_price'); ?></label>

                        <div class="col-sm-5">
                            <input type="number" class="form-control" name="price" value="<?php echo $row['price']; ?>" required />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Cantidad</label>

                        <div class="col-sm-5">
                            <input type="number" class="form-control" name="quantity" required />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo lang_key('notes'); ?></label>

                        <div class="col-sm-5">
                            <textarea class="form-control" name="notes" rows="3"><?php echo $row['notes']; ?></textarea>
                        </div>
                    </div>
                    
                    <input type="hidden" name="type" value="<?php echo $row['type']; ?>" />

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info" id="submit-button">
                                <?php echo lang_key('update'); ?>
                            </button>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>