<br>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <!--<div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    <?php echo lang_key('add_account'); ?>
                </div>
            </div>-->
            
            <div class="panel-body">

                <?php echo form_open(site_url('account/accounts/create'), array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data')); ?>

                <div class="form-group">
                    <label for="field-1" class="col-sm-4 control-label"><?php echo lang_key('account_type'); ?></label>

                    <div class="col-sm-4">
                        <select name="type" class="selectboxit" required>
                            <option value="bank"><?php echo lang_key('bank'); ?></option>
                            <option value="cash"><?php echo lang_key('cash'); ?></option>
                            <option value="other"><?php echo lang_key('other'); ?></option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="field-1" class="col-sm-4 control-label"><?php echo lang_key('account_title'); ?></label>

                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="title" required />
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="field-1" class="col-sm-4 control-label"><?php echo lang_key('account_number'); ?></label>

                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="account_number" required />
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-4 control-label"><?php echo lang_key('starting_balance'); ?></label>

                    <div class="col-sm-4">
                        <input type="number" class="form-control" name="balance" required />
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-4">
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