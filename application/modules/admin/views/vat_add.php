<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    <?php echo lang_key('add_vat'); ?>
                </div>
            </div>
            
            <div class="panel-body">

                <?php echo form_open(site_url('admin/vat/create'), array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data')); ?>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo lang_key('vat_name'); ?></label>

                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="name" required />
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo lang_key('percentage'); ?></label>

                    <div class="col-sm-5">
                        <input type="number" class="form-control" name="percentage" required />
                    </div>
                </div>

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