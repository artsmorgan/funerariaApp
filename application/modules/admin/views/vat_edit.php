<?php
$edit_data = $this->db->get_where('vat', array('vat_id' => $param3))->result_array();
foreach($edit_data as $row) { ?>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title" >
                        <i class="entypo-plus-circled"></i>
                        <?php echo lang_key('edit_vat'); ?>
                    </div>
                </div>

                <div class="panel-body">

                    <?php echo form_open(site_url('admin/vat/update/' . $param3), array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data')); ?>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo lang_key('vat_name'); ?></label>

                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="name" required value="<?php echo $row['name']; ?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo lang_key('percentage'); ?></label>

                        <div class="col-sm-5">
                            <input type="number" class="form-control" name="percentage" required value="<?php echo $row['percentage']; ?>" />
                        </div>
                    </div>

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