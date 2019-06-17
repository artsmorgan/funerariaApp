<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
        $system_title = $this->db->get_where('settings', array('type' => 'system_title'))->row()->description;
        ?>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="Neon Admin Panel" />
        <meta name="author" content="" />

        <title><?php echo lang_key('reset_password'); ?> | <?php echo $system_title; ?></title>


        <link rel="stylesheet" href="<?php echo base_url();?>assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-icons/entypo/css/entypo.css">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/neon-core.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/neon-theme.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/neon-forms.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/custom.css">

        <script src="<?php echo base_url();?>assets/js/jquery-1.11.0.min.js"></script>

        <!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
                <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link rel="shortcut icon" href="assets/images/favicon.png">

    </head>
    <body class="page-body login-page login-form-fall" data-url="http://neon.dev">


        <!-- This is needed when you send requests via Ajax -->
        <script type="text/javascript">
            var baseurl = '<?php echo base_url(); ?>';
        </script>

        <div class="login-container">

            <div class="login-header login-caret">

                <div class="login-content" style="width:100%;">

                    <a href="<?php echo base_url(); ?>" class="logo">
                        <img src="<?php echo base_url(); ?>uploads/logo.png" width="120" alt="" />
                    </a>

                    <p class="description">
                        <h2 style="color:#cacaca; font-weight:100;">
                            <?php echo $system_title; ?>
                        </h2>
                    </p>
                    <p class="description">Enter your email for resetting password</p>

                    <!-- progress bar indicator -->
                    <div class="login-progressbar-indicator">
                        <h3>43%</h3>
                        <span>logging in...</span>
                    </div>
                </div>

            </div>

            <div class="login-progressbar">
                <div></div>
            </div>

            <div class="login-form">

                <div class="login-content">

                    <div class="form-login-error">
                        <h3>Invalid login</h3>
                        <p>Please enter correct email and password!</p>
                    </div>
                    <form method="post" role="form" action="<?php echo site_url('admin/auth/ajax_forgot_password'); ?>">

                        <div class="form-forgotpassword-success">
                            <i class="entypo-check"></i>
                            <h3>Reset email has been sent.</h3>
                            <p>Please check your email inbox, password reset instruction is sent!</p>
                        </div>

                        <div class="form-steps">

                            <div class="step current" id="step-1">

                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="entypo-mail"></i>
                                        </div>

                                        <input type="text" class="form-control" name="email" id="email" placeholder="Email"  autocomplete="off" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-info btn-block btn-login">
                                        <?php echo lang_key('reset_password'); ?>
                                        <i class="entypo-right-open-mini"></i>
                                    </button>
                                </div>

                            </div>

                        </div>

                    </form>



                    <div class="login-bottom-links">

                        <a href="<?php echo base_url(); ?>" class="link">
                            <i class="entypo-lock"></i>
                            <?php echo lang_key('return_to_login_page'); ?>
                        </a>


                    </div>

                </div>

            </div>

        </div>


        <!-- Bottom Scripts -->
        <script src="<?php echo base_url();?>assets/js/gsap/main-gsap.js"></script>
        <script src="<?php echo base_url();?>assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/bootstrap.js"></script>
        <script src="<?php echo base_url();?>assets/js/joinable.js"></script>
        <script src="<?php echo base_url();?>assets/js/resizeable.js"></script>
        <script src="<?php echo base_url();?>assets/js/neon-api.js"></script>
        <script src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/jquery.inputmask.bundle.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/neon-custom.js"></script>
        <script src="<?php echo base_url();?>assets/js/neon-demo.js"></script>

        <script>
            
          var neonForgotPassword = neonForgotPassword || {};

;(function($, window, undefined)
{
	"use strict";
	
	$(document).ready(function()
	{
		neonForgotPassword.$container = $("#form_forgot_password");
		neonForgotPassword.$steps = neonForgotPassword.$container.find(".form-steps");
		neonForgotPassword.$steps_list = neonForgotPassword.$steps.find(".step");
		neonForgotPassword.step = 'step-1'; // current step
		
				
		neonForgotPassword.$container.validate({
			rules: {
				
				email: {
					required: true,
					email: true
				}
			},
			
			messages: {
				
				email: {
					email: 'Invalid E-mail.'
				}	
			},
			
			highlight: function(element){
				$(element).closest('.input-group').addClass('validate-has-error');
			},
			
			
			unhighlight: function(element)
			{
				$(element).closest('.input-group').removeClass('validate-has-error');
			},
			
			submitHandler: function(ev)
			{
				$(".login-page").addClass('logging-in');
				
				// We consider its 30% completed form inputs are filled
				neonForgotPassword.setPercentage(30, function()
				{
					// Lets move to 98%, meanwhile ajax data are sending and processing
					neonForgotPassword.setPercentage(98, function()
					{
						// Send data to the server
						$.ajax({
							url: '<?php site_url('admin/auth/ajaxajax_forgot_password'); ?>',
							method: 'POST',
							dataType: 'json',
							data: {
								email: $("input#email").val()
							},
							error: function()
							{
								alert("An error occoured!");
							},
							success: function(response)
							{
								// From response you can fetch the data object retured
								var email = response.submitted_data.email;
								
								
								// Form is fully completed, we update the percentage
								neonForgotPassword.setPercentage(100);
								
								
								// We will give some time for the animation to finish, then execute the following procedures	
								setTimeout(function()
								{
									// Hide the description title
									$(".login-page .login-header .description").slideUp();
									
									// Hide the register form (steps)
									neonForgotPassword.$steps.slideUp('normal', function()
									{
										// Remove loging-in state
										$(".login-page").removeClass('logging-in');
										
										// Now we show the success message
										$(".form-forgotpassword-success").slideDown('normal');
										
										// You can use the data returned from response variable
									});
									
								}, 1000);
							}
						});
					});
				});
			}
		});
	
		// Steps Handler
		neonForgotPassword.$steps.find('[data-step]').on('click', function(ev)
		{
			ev.preventDefault();
			
			var $current_step = neonForgotPassword.$steps_list.filter('.current'),
				next_step = $(this).data('step'),
				validator = neonForgotPassword.$container.data('validator'),
				errors = 0;
			
			neonForgotPassword.$container.valid();
			errors = validator.numberOfInvalids();
			
			if(errors)
			{
				validator.focusInvalid();
			}
			else
			{
				var $next_step = neonForgotPassword.$steps_list.filter('#' + next_step),
					$other_steps = neonForgotPassword.$steps_list.not( $next_step ),
					
					current_step_height = $current_step.data('height'),
					next_step_height = $next_step.data('height');
				
				TweenMax.set(neonForgotPassword.$steps, {css: {height: current_step_height}});
				TweenMax.to(neonForgotPassword.$steps, 0.6, {css: {height: next_step_height}});
				
				TweenMax.to($current_step, .3, {css: {autoAlpha: 0}, onComplete: function()
				{
					$current_step.attr('style', '').removeClass('current');
					
					var $form_elements = $next_step.find('.form-group');
					
					TweenMax.set($form_elements, {css: {autoAlpha: 0}});
					$next_step.addClass('current');
					
					$form_elements.each(function(i, el)
					{
						var $form_element = $(el);
						
						TweenMax.to($form_element, .2, {css: {autoAlpha: 1}, delay: i * .09});
					});
					
					setTimeout(function()
					{
						$form_elements.add($next_step).add($next_step).attr('style', '');
						$form_elements.first().find('input').focus();
						
					}, 1000 * (.5 + ($form_elements.length - 1) * .09));
				}});
			}
		});
		
		neonForgotPassword.$steps_list.each(function(i, el)
		{
			var $this = $(el),
				is_current = $this.hasClass('current'),
				margin = 20;
			
			if(is_current)
			{
				$this.data('height', $this.outerHeight() + margin);
			}
			else
			{
				$this.addClass('current').data('height', $this.outerHeight() + margin).removeClass('current');
			}
		});
		
		
		// Login Form Setup
		neonForgotPassword.$body = $(".login-page");
		neonForgotPassword.$login_progressbar_indicator = $(".login-progressbar-indicator h3");
		neonForgotPassword.$login_progressbar = neonForgotPassword.$body.find(".login-progressbar div");
		
		neonForgotPassword.$login_progressbar_indicator.html('0%');
		
		if(neonForgotPassword.$body.hasClass('login-form-fall'))
		{
			var focus_set = false;
			
			setTimeout(function(){ 
				neonForgotPassword.$body.addClass('login-form-fall-init')
				
				setTimeout(function()
				{
					if( !focus_set)
					{
						neonForgotPassword.$container.find('input:first').focus();
						focus_set = true;
					}
					
				}, 550);
				
			}, 0);
		}
		else
		{
			neonForgotPassword.$container.find('input:first').focus();
		}
		
		
		// Functions
		$.extend(neonForgotPassword, {
			setPercentage: function(pct, callback)
			{
				pct = parseInt(pct / 100 * 100, 10) + '%';
				
				// Normal Login
				neonForgotPassword.$login_progressbar_indicator.html(pct);
				neonForgotPassword.$login_progressbar.width(pct);
				
				var o = {
					pct: parseInt(neonForgotPassword.$login_progressbar.width() / neonForgotPassword.$login_progressbar.parent().width() * 100, 10)
				};
				
				TweenMax.to(o, .7, {
					pct: parseInt(pct, 10),
					roundProps: ["pct"],
					ease: Sine.easeOut,
					onUpdate: function()
					{
						neonForgotPassword.$login_progressbar_indicator.html(o.pct + '%');
					},
					onComplete: callback
				});
			}
		});
	});
	
})(jQuery, window);  
        </script>
        
        
    </body>
</html>