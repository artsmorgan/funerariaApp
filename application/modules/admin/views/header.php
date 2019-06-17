<div class="row">
    
    <div class="col-md-12 col-sm-12 clearfix" style="text-align:center;">
        <h2 style="font-weight:200; margin:0px;"><?php echo lang_key($system_title); ?></h2>
    </div>

    <!-- Profile Info and Notifications -->
    <!--<div class="col-md-6 col-sm-8 clearfix">

        <ul class="user-info pull-left pull-none-xsm">

            <li class="profile-info dropdown">

                <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                    <?php echo $this->session->userdata('user_first_name').' '.$this->session->userdata('user_last_name'); ?>
                </a>

                
            </li>

        </ul>

    </div>-->


    <!-- Raw Links -->
    <div class="col-md-offset-6 col-md-6 col-sm-4 clearfix hidden-xs">

        <ul class="list-inline links-list pull-right">

            <li class="profile-info dropdown"><!-- add class "pull-right" if you want to place this from right -->

                <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                    <?php echo $this->session->userdata('user_first_name') . ' ' . $this->session->userdata('user_last_name'); ?>
                </a>
                
            </li>
            
            <li class="sep"></li>

            <li>
                <a href="<?php echo site_url('admin/auth/logout/');?>">
                    <?php echo lang_key('log_out'); ?> <i class="entypo-logout right"></i>
                </a>
            </li>
        </ul>

    </div>

</div>

<hr style="margin-top: 0px;" />