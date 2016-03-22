<div class="row">
    <div class="col-md-12">

        <div class="panel panel-primary" >

            <div class="panel-heading">
                <div class="panel-title">
                    <?php echo lang_key('system_settings'); ?>
                </div>
            </div>

            <div class="panel-body">
                <?php echo form_open(site_url('admin/system_settings/do_update'), array('class' => 'form-horizontal form-groups-bordered', 'target' => '_top')); ?>

                <div class="form-group">
                    <label  class="col-sm-3 control-label"><?php echo lang_key('system_title'); ?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="system_title" 
                               value="<?php echo $this->db->get_where('settings', array('type' => 'system_title'))->row()->description; ?>">
                    </div>
                </div>
                
                <div class="form-group">
                    <label  class="col-sm-3 control-label"><?php echo lang_key('system_email');?></label>
                    <div class="col-sm-5">
                        <input type="email" class="form-control" name="system_email" 
                            value="<?php echo $this->db->get_where('settings' , array('type' =>'system_email'))->row()->description;?>">
                    </div>
                </div>
                    
                <div class="form-group">
                    <label  class="col-sm-3 control-label"><?php echo lang_key('text_align');?></label>
                    <div class="col-sm-5">
                        <select name="text_align" class="selectboxit">
                            <?php $text_align = $this->db->get_where('settings', array('type' => 'text_align'))->row()->description;?>
                            <option value="left-to-right" <?php if ($text_align == 'left-to-right')echo 'selected';?>> left-to-right (LTR)</option>
                            <option value="right-to-left" <?php if ($text_align == 'right-to-left')echo 'selected';?>> right-to-left (RTL)</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label  class="col-sm-3 control-label"><?php echo lang_key('language'); ?></label>
                    <div class="col-sm-5">
                        <select name="language" class="selectboxit">
                            <?php
                            $fields = $this->db->list_fields('language');
                            foreach ($fields as $field) {
                                if ($field == 'phrase_id' || $field == 'phrase')
                                    continue;

                                $current_default_language = $this->db->get_where('settings', array('type' => 'language'))->row()->description; ?>
                                
                                <option value="<?php echo $field; ?>" <?php if ($current_default_language == $field) echo 'selected'; ?>>
                                    <?php echo $field; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label  class="col-sm-3 control-label"><?php echo lang_key('system_currency');?></label>
                    <div class="col-sm-5">
                        <select class="form-control selectboxit" name="system_currency_id">
                        <?php
                        $options = get_all_currencies();
                        $system_currency_id = $this->db->get_where('settings' , array('type' => 'system_currency_id'))->row()->description;
                        ?>
                            <?php foreach($options as $currency=>$val){?>
                                <?php $sel=($system_currency_id==$currency)?'selected="selected"':'';?>
                                <option value="<?php echo $currency;?>" <?php echo $sel;?>><?php echo $val[0].' ('.get_currency_icon($currency).' '. $currency.')';?></option>
                            <?php }?>

                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label  class="col-sm-3 control-label"><?php echo lang_key('show_price_as');?></label>
                    <div class="col-sm-5">
                        <select class="form-control selectboxit" name="currency_placing">
                            <?php
                            $options = array('before_with_no_gap'=>'$1000','before_with_gap'=>'$ 1000','after_with_no_gap'=>'1000$','after_with_gap'=>'1000 $');
                            $currency_placing = $this->db->get_where('settings' , array('type' => 'currency_placing'))->row()->description;
                            ?>
                            <?php foreach($options as $key=>$row){?>
                                <?php $sel=($currency_placing==$key)?'selected="selected"':'';?>
                                <option value="<?php echo $key;?>" <?php echo $sel;?>><?php echo $row;?></option>
                            <?php }?>

                        </select>
                    </div>
                </div>
                    
                <div class="form-group">
                    <label  class="col-sm-3 control-label"><?php echo lang_key('financial_year_start');?></label>
                    <div class="col-sm-5">
                        <select name="financial_year_start" class="selectboxit">
                            <?php $financial_year_start = $this->db->get_where('settings', array('type' => 'financial_year_start'))->row()->description;?>
                            <option value="january" <?php if ($financial_year_start == 'january')echo 'selected';?>>
                                <?php echo lang_key('from_january'); ?></option>
                            <option value="july" <?php if ($financial_year_start == 'july')echo 'selected';?>>
                                <?php echo lang_key('from_july'); ?></option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-5">
                        <button type="submit" class="btn btn-info"><?php echo lang_key('save'); ?></button>
                    </div>
                </div>

                <?php echo form_close(); ?>
                
                <hr>
                
                <?php echo form_open(site_url('admin/system_settings/upload_logo'), array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top' , 'enctype' => 'multipart/form-data'));?>

                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo lang_key('upload_logo'); ?></label>

                        <div class="col-sm-5">

                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;" data-trigger="fileinput">
                                    <img src="<?php echo base_url(); ?>uploads/logo.png" alt="...">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                <div>
                                    <span class="btn btn-white btn-file">
                                        <span class="fileinput-new">Select image</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" name="logo" accept="image/*">
                                    </span>
                                    <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info"><?php echo lang_key('upload'); ?></button>
                        </div>
                    </div>

                <?php echo form_close();?>

            </div>

        </div>

    </div>
</div>