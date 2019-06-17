<?php
    $sql = "select * from bk_vendedores";
    $vendedores = $this->db->query( $sql)->result_array();

    // print_r($vendedores);
    
    if(count($vendedores>0)){
        $vend_list = '<select name="vendedor" class="selectboxit">';
            foreach ($vendedores as $key => $value) {
                $vend_list .= '<option value="'.$value['id_vendedor'].'">'.$value['nombre'].' '.$value['apellido1']. '</option>';
            }
        $vend_list .= '</select>';
    }

?>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    Añadir contrato
                </div>
            </div>
            
            <div class="panel-body">

                <?php echo form_open(site_url('servicio/servicios/createContract'), array('class' => 'services form-horizontal form-groups-bordered form-fun validate', 'enctype' => 'multipart/form-data')); ?>

                <!-- <h3>Información Personal</h3> -->

                <input type="hidden" name="type" value="<?php echo $param3;  ?>">

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('identification_card'); ?></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control col-sm-12" name="client_id_card"  />
                                <input type="hidden" id="contact_id" name="contact_id"  />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('first_name'); ?></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="client_first_name"  />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">Primer apellido</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="client_last_name"  />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">Segundo apellido</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="client_last_name2"  />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    
                     <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('category'); ?></label>
                            <div class="col-sm-12">
                                <div class="rating block">
                                    <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                                </div>
                                <input type="hidden" class="form-control col-sm-12" name="client_category"  />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- first row -->
                <div class="row">
                    <!-- col -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('phone'); ?></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="client_phone" disabled />
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="client_phone2" disabled />
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="client_phone3" disabled />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('email'); ?></label>
                            <div class="col-sm-12">
                                <input type="email" class="form-control" name="client_email" disabled />
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('agent'); ?></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="seller" disabled  />
                            </div>
                        </div -->>
                        <!-- form-group -->
                    <!-- </div> -->
                    <!-- col -->
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('address'); ?></label>
                            <div class="col-sm-4">
                                <select class="selectboxit" id="provincias" name="province" disabled>
                                    <option value="">Provincia</option>             
                                </select>
                            </div>
                            <div class="col-sm-4" id="lvl-container-2">
                                    <select class="selectboxit selectaux" id="cantones" name="canton" disabled>
                                        <option value="">Cantón</option>
                                    </select>
                            </div>
                            <div class="col-sm-4" id="lvl-container-3">
                                <select class="selectboxit" id="distritos" name="district" disabled>
                                    <option value="">Distrito</option>
                                </select>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('other_signs'); ?></label>
                            <div class="col-sm-12">
                                <textarea name="client_address" class="form-control" rows="1" disabled></textarea>
                            </div>
                        </div>
                    </div>
                </div>
          
              
              <!-- Fecha de inclusion -->
              <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">Fecha de Inclusion</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="fecha_inclusion" id="fecha_inclusion"  value="<?php echo date('Y-m-d H:i') ?>" />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <!-- <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label">Ruta</label>
                            <div class="col-sm-12">
                                <input type="text"  class="form-control" name="ruta" >
                            </div>
                        </div>
                    </div> -->
                    <!-- col --><input type="hidden"  class=""  name="forma_pago">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label">Vendedor</label>
                            <div class="col-sm-12">
                                <?php echo $vend_list; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label">Funeraria</label>
                            <div class="col-sm-12">
                                <select   class="selectboxit " name="funeraria" id="funeraria">
                                        <option value="1">La Merced</option>
                                        <option value="2">Shalom</option>
                                    </select>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <!-- <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label">Forma de Pago</label>
                            <div class="col-sm-12">
                                
                            </div>
                        </div>
                    </div> -->
                     <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label">N° Contrato</label>
                            <div class="col-sm-12">
                                <input type="text"  class="form-control" value="0" name="contract_id">
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                </div>

                <!-- Final de fecha de inclusion -->
                
                <div class="row">
                    
                    <!-- col -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label">Monto del contrato</label>
                            <div class="col-sm-12">
                                <input type="text"  class="form-control format-currency" >
                                <input type="hidden" name="amount" value="">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label">Prima</label>
                            <div class="col-sm-12">
                                <input type="text"  class="form-control format-currency" >
                                <input type="hidden" name="prima" value="">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label">Cuota</label>
                            <div class="col-sm-12">
                                <input type="text"  class="form-control format-currency" >
                                <input type="hidden" name="cuota" value="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label">Localización</label>
                            <div class="col-sm-12">
                                <div class="col-md-4">
                                    <select   class="selectboxit " name="local_1" id="local_1">
                                        <?php 
                                            for($i = 1; $i < 29; $i++){
                                                echo '<option value="'.$i.'">'.$i.'</option>';
                                            }
                                         ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select   class="selectboxit " name="local_2" id="local_2">
                                         <?php 
                                            for($i = 1; $i < 1000; $i++){
                                                echo '<option value="'.$i.'">'.$i.'</option>';
                                            }
                                         ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select   class="selectboxit " name="local_3" id="local_3">
                                         <?php 
                                            for($i = 1; $i < 29; $i++){
                                                echo '<option value="'.$i.'">'.$i.'</option>';
                                            }
                                         ?>
                                    </select>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label">N° Recibo</label>
                            <div class="col-sm-12">
                                <input type="text"  class="form-control" value="0" name="no_recibo">
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                   <!--  <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label">Tiempo del contrato (meses)</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="tiempo_contrato">
                            </div>
                        </div>
                    </div> -->
                    <!-- col -->
                    <!-- <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label">Cuota</label>
                            <div class="col-sm-12">
                                <input type="text"  class="form-control format-currency" value="0" disabled>
                                <input type="hidden" value="0" name="monto_cuota">
                            </div>
                        </div>
                    </div> -->
                    <!-- col -->
                </div>
                <!-- fith row -->

                <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="field-1" class="control-label col-sm-12">Mes Al Cobro</label>
                                <div class="col-sm-12">
                                    <?php echo print_months(true,'mes_cobro','class="selectboxit"');?>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="field-1" class="control-label col-sm-12">Año Al Cobro</label>
                                <div class="col-sm-12">                                    
                                    <input type="number" name="anno_cobro" class="form-control" value="<?php echo date("Y");   ?>">
                                </div>
                            </div>
                        </div>
                        <!-- col -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-1" class="col-sm-12 control-label">Saldo Anterior</label>
                                <div class="col-sm-12">
                                    <input type="text" disabled class="form-control format-currency" >
                                    <input type="hidden"   name="saldo_anterior">
                                </div>
                            </div>
                        </div>
                        <!-- col -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-1" class="col-sm-12 control-label">Saldo Actual</label>
                                <div class="col-sm-12">
                                    <input type="text" disabled class="form-control format-currency" >
                                    <input type="hidden"  name="saldo_actual">
                                </div>
                            </div>
                        </div>
                </div>

                
                <!-- eleventh row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('observations'); ?></label>
                            <div class="col-sm-12">
                                <textarea class="form-control" name="observaciones"  rows="1" ></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                </div>
                <!-- eleventh row -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-sm-12 txt-right">
                                <button type="submit" class="btn btn-info" id="submit-button">
                                    <?php echo lang_key('submit'); ?>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

<script>

    
    $('[data-custom]').remove();

    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd'
    });

    $('#fecha_inclusion').datepicker({
        format: 'yyyy-mm-dd'
    });

    

    if ( $('#client_registered').is(':checked') ){
        $('.client input').addClass('on');
    }

    function calcularSaldo(){
        var amount = Number($('[name=amount]').val()),
            time = Number($('[name=tiempo_contrato]').val()),
            cuota = amount || 0;

        if( amount && time ){
            cuota = amount / time;
        }

        $('[name=monto_cuota]').prev().val(cuota).trigger('input');
    }


    $('[name=amount],[name=tiempo_contrato]').on('input', function(e){
        //calcularSaldo();
    });

    $('[name=client_id_card]').autocomplete({
        source: search_json.id_card,
        minLength: 2,
        select: function( event, ui ) {
            setClientData(ui.item.id);
        }
    });

    $('[name=client_first_name]').autocomplete({
        source: search_json.first_name,
        minLength: 2,
        select: function( event, ui ) {
            setClientData(ui.item.id);
        }
    });

    $('[name=client_last_name1]').autocomplete({
        source: search_json.last_name,
        minLength: 2,
        select: function( event, ui ) {
            setClientData(ui.item.id);
        }
    });

    $('[name=client_last_name2]').autocomplete({
        source: search_json.last_name2,
        minLength: 2,
        select: function( event, ui ) {
            setClientData(ui.item.id);
        }
    });

    function setClientData(clientId){
        $('[name=client_id_card]').val(clients[clientId].id_card);
        $('[name=client_first_name]').val(clients[clientId].first_name);
        $('[name=client_last_name]').val(clients[clientId].last_name);
        $('[name=client_last_name2]').val(clients[clientId].last_name2);
        $('[name=client_phone]').val(clients[clientId].phone);
        $('[name=client_phone2]').val(clients[clientId].phone2);
        $('[name=client_phone3]').val(clients[clientId].phone3);
        $('[name=client_email]').val(clients[clientId].email);
        $('#seller').val(clients[clientId].seller_name);
        $('[name=client_address]').val(clients[clientId].address);
        $('#provinciasSelectBoxItText').text(  clients[clientId].province  );
        $('#cantonesSelectBoxItText').text(  clients[clientId].canton  );
        $('#distritosSelectBoxItText').text(  clients[clientId].district  );

        var startsCount = $('.rating span').length;

        $('.rating span').removeClass('active').eq( startsCount - clients[clientId].category ).addClass('active');

        $('[name=contact_id]').val(clientId);
    }
</script>