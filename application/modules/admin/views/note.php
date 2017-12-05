<?php echo form_open(site_url('admin/note/create')); ?>
    
    <!-- NOTE CREATION BUTTON-->
    <button type="submit" class="btn btn-info pull-right">
        <i class="entypo-plus"></i>
        <?php echo lang_key('create_note'); ?>
    </button>
    
<?php echo form_close(); ?>

<div style="clear:both; padding: 5px;"></div>

<div class="row">

    <div class="col-md-12">
        <div class="tabs-vertical-env">
            <?php
            $this->db->order_by('note_id', 'desc');
            $notes = $this->db->get_where('note', array('user_id' => $this->session->userdata('user_id')))->result_array();

            if(empty($notes)) { ?>
                <div class="alert alert-info"><?php echo lang_key('no_notes'); ?></div>
            <?php } else { ?>
                <ul class="nav tabs-vertical" style="width: 30%;">

                    <?php
                    $counter = 0;
                    foreach ($notes as $row):
                        $counter++; ?>
                        <li class="<?php
                            if($active_note_id != '') {
                                if($active_note_id == $row['note_id'])
                                    echo 'active';
                            } else {
                                if ($counter == 1)
                                    echo 'active'; } ?>">
                            <a href="#<?php echo $row['note_id']; ?>" data-toggle="tab">
                                <i class="entypo-right-open-mini"></i>
                                <?php echo $row['title']; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>

                </ul>

                <div class="tab-content" style="width: 70%;">

                    <?php
                    $counter = 0;
                    foreach($notes as $row):
                        $counter++; ?>

                        <div class="tab-pane <?php
                            if($active_note_id != '') {
                                if($active_note_id == $row['note_id'])
                                    echo 'active';
                            } else {
                                if ($counter == 1)
                                    echo 'active'; } ?>" 
                            id="<?php echo $row['note_id']; ?>">

                            <?php echo form_open(site_url('admin/note/update/' . $row['note_id'])); ?>

                                <div  style="padding:5px; background-color: #FFFCEE; border: 1px #f3f3f3 solid;">
                                    <div class="form-group" style="margin: 0px;">
                                        <div class="col-md-12" style="padding:0px; background-color: #FFFCEE; font-size: 14px;">
                                            <input type="text" class="form-control" rows="14" style="padding: 5px; border:0px;
                                                background-color: #FFFCEE; font-size: 18px;" name="title"
                                                placeholder="<?php echo lang_key('untitled'); ?>"
                                                value="<?php echo $row['title']; ?>">
                                        </div>
                                    </div>

                                    <hr style="margin: 0px;">

                                    <div class="form-group">
                                        <div class="col-md-12" style="padding:0px; background-color: #FFFCEE;">
                                            <textarea class="form-control autogrow" rows="14" style="padding: 5px;
                                                border:0px; background-color: #FFFCEE; min-height: 400px;" name="note"
                                                placeholder="Write notes....."><?php echo $row['note']; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <br>

                                <!-- NOTE SAVING BUTTON -->
                                <button type="submit" class="btn btn-info">
                                    <i class="entypo-floppy"></i>
                                    <?php echo lang_key('save_note'); ?>
                                </button>

                                <!-- NOTE DELETION BUTTON-->
                                <button type="button" class="btn btn-white pull-right" 
                                    onclick="confirm_modal('<?php echo site_url('admin/note/delete/' . $row['note_id']); ?>');">
                                        <i class="entypo-trash"></i>
                                        <?php echo lang_key('delete_note'); ?>
                                </button>

                            <?php echo form_close(); ?>
                        </div>

                    <?php endforeach; ?>

                </div>
            <?php } ?>
        </div>	
    </div>

</div>