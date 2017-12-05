<!--password-->
<div class="row">
    <div class="col-md-12">
        
        <div class="panel panel-primary" >
            <div class="panel-heading">
                <div class="panel-title">
                    <?php echo lang_key('edit_profile'); ?>
                </div>
            </div>
            
            <?php
            $edit_data = $this->db->get_where('user', array('user_id' => $this->session->userdata('user_id')))->result_array();
            foreach($edit_data as $row) { ?>
                <div class="panel-body">
                    <?php echo form_open(site_url('admin/manage_profile/edit_profile/' . $row['user_id']), array('class' => 'form-horizontal form-groups-bordered validate', 'target' => '_top')); ?>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo lang_key('first_name'); ?></label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="first_name" value="<?php echo $row['first_name']; ?>" required autofocus />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo lang_key('last_name'); ?></label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="last_name" value="<?php echo $row['last_name']; ?>" required />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo lang_key('email'); ?></label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="email" value="<?php echo $row['email']; ?>" onkeyup="check_email_validity(this.value)" required />
                                <span id="email_validity_holder"></span>
                            </div>
                        </div>
                    
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="btn btn-info" id="submit-button"><?php echo lang_key('update_profile'); ?></button>
                            </div>
                        </div>
                    <?php echo form_close(); ?>
                </div>
            <?php } ?>
        </div>
        
        <div class="panel panel-primary" >
            <div class="panel-heading">
                <div class="panel-title">
                    <?php echo lang_key('change_password'); ?>
                </div>
            </div>
            <div class="panel-body">
                <?php echo form_open(site_url('admin/manage_profile/change_password'), array('class' => 'form-horizontal form-groups-bordered validate', 'target' => '_top')); ?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo lang_key('current_password'); ?></label>
                        <div class="col-sm-5">
                            <input type="password" class="form-control" name="password" value=""/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo lang_key('new_password'); ?></label>
                        <div class="col-sm-5">
                            <input type="password" class="form-control" name="new_password" value=""/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo lang_key('confirm_new_password'); ?></label>
                        <div class="col-sm-5">
                            <input type="password" class="form-control" name="confirm_new_password" value=""/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info"><?php echo lang_key('update_password'); ?></button>
                        </div>
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
        
    </div>
</div>

<script>
    
    function check_email_validity(email)
    {
        if(email != '') {
            $.ajax({
                url     : '<?php echo base_url(); ?>index.php/admin/auth/check_email_validity/' + email,
                success : function (response)
                {
                    if(response == 'valid') {
                        jQuery('#email_validity_holder').html('<p style="color: #00a651">Email Valid</p>');
                        document.getElementById("submit-button").disabled = false;
                    }
                    
                    if(response == 'invalid') {
                        jQuery('#email_validity_holder').html('<p style="color: #cc2424">Email already exists</p>');
                        document.getElementById("submit-button").disabled = true;
                    }
                }
            });
        } else
            jQuery('#email_validity_holder').html('');
    }
    
</script>