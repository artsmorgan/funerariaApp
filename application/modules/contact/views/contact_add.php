<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    <?php echo lang_key('add_contact'); ?> 
                </div>
            </div>
            
            <div class="panel-body">

                <?php echo form_open(site_url('contact/contacts/create'), array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data')); ?>

                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo lang_key('contact_type'); ?></label>

                            <div class="col-sm-5">
                                <select name="type" class="selectboxit" required>
                                    <option value="customer"><?php echo lang_key('customer'); ?></option>
                                    <option value="supplier"><?php echo lang_key('supplier'); ?></option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo lang_key('first_name'); ?></label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="first_name" required />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo lang_key('last_name'); ?></label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="last_name" required />
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo lang_key('company_name'); ?></label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="company_name" required />
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo lang_key('email'); ?></label>

                            <div class="col-sm-5">
                                <input type="email" class="form-control" name="email" required />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo lang_key('phone'); ?></label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="phone" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo lang_key('mobile'); ?></label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="mobile" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo lang_key('website'); ?></label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="website" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo lang_key('skype_id'); ?></label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="skype_id" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo lang_key('address'); ?></label>

                            <div class="col-sm-5">
                                <textarea class="form-control" name="address" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo lang_key('city'); ?></label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="city" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo lang_key('state'); ?></label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="state" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo lang_key('country'); ?></label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="country" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo lang_key('zip_code'); ?></label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="zip_code" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo lang_key('bank_account'); ?></label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="bank_account" />
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="btn btn-info" id="submit-button">
                                    <?php echo lang_key('submit'); ?>
                                </button>
                            </div>
                        </div>
                    </div>    
                
                    <div class="col-md-6">New col</div>
                 </div>   
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>