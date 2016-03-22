<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    <?php echo lang_key('add_' . $param3); ?>
                </div>
            </div>
            
            <div class="panel-body">

                <?php echo form_open(site_url('inventory/products/create'), array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data')); ?>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo lang_key('code'); ?></label>

                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="product_code" readonly
                            value="<?php echo substr(md5(rand(100000000, 200000000)), 0, 10); ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo lang_key($param3 . '_name'); ?></label>

                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="name" required />
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo lang_key($param3 . '_category'); ?></label>

                    <div class="col-sm-5">
                        <select name="product_category_id" class="selectboxit" required>
                            <?php
                            $categories = $this->db->get('product_category')->result_array();
                            foreach($categories as $row) { ?>
                                <option value="<?php echo $row['product_category_id'] ?>">
                                    <?php echo $row['name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo lang_key('unit_price'); ?></label>

                    <div class="col-sm-5">
                        <input type="number" class="form-control" name="price" required />
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo lang_key('notes'); ?></label>

                    <div class="col-sm-5">
                        <textarea class="form-control" name="notes" rows="3"></textarea>
                    </div>
                </div>
                    
                <input type="hidden" name="type" value="<?php echo $param3; ?>" />

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-5">
                        <button type="submit" class="btn btn-info" id="submit-button">
                            <?php echo lang_key('submit'); ?>
                        </button>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>