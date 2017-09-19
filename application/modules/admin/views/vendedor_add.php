<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    Crear Vendedor
                </div>
            </div>
            
            <div class="panel-body">

                <?php echo form_open(site_url('admin/vendedores/create'), array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data')); ?>

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
                    <label for="field-1" class="col-sm-3 control-label">Segundo Apellido</label>

                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="second_last_name" required />
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label ">Fecha de Ingreso</label>

                    <div class="col-sm-5">
                        <input type="text" class="form-control datepicker" name="init_date" required />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-5">
                        <button type="submit" class="btn btn-info" id="submit-button">
                            Crear Nuevo Vendedor
                        </button>
                    </div>
                </div>
                
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

<script>
   (function(){

       
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd'
        });

    })();

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