<?php
$edit_data = $this->db->get_where('account', array('account_id' => $param3))->result_array();
foreach($edit_data as $row) { ?>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title" >
                        <i class="entypo-plus-circled"></i>
                        <?php echo lang_key('edit_account'); ?>
                    </div>
                </div>

                <div class="panel-body">

                    <?php echo form_open(site_url('account/accounts/update/' . $param3), array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data')); ?>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo lang_key('account_type'); ?></label>

                        <div class="col-sm-5">
                            <select name="type" class="selectboxit" required>
                                <option value="bank" <?php if($row['type'] == 'bank') echo 'selected'; ?>>
                                    <?php echo lang_key('bank'); ?></option>
                                <option value="cash" <?php if($row['type'] == 'cash') echo 'selected'; ?>>
                                    <?php echo lang_key('cash'); ?></option>
                                <option value="other" <?php if($row['type'] == 'other') echo 'selected'; ?>>
                                    <?php echo lang_key('other'); ?></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo lang_key('account_title'); ?></label>

                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="title" required value="<?php echo $row['title']; ?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo lang_key('account_number'); ?></label>

                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="account_number" required value="<?php echo $row['account_number']; ?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo lang_key('starting_balance'); ?></label>

                        <div class="col-sm-5">
                            <input type="number" class="form-control" name="balance" required value="<?php echo $row['balance']; ?>" />
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