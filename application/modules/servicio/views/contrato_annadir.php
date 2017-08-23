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

                <?php echo form_open(site_url('servicio/servicios/create'), array('class' => 'services form-horizontal form-groups-bordered form-fun validate', 'enctype' => 'multipart/form-data')); ?>

                <!-- <h3>Información Personal</h3> -->

                <input type="hidden" name="type" value="<?php echo $param3;  ?>">

                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('first_name'); ?></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="first_name"  />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">Primer apellido</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="last_name"  />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">Segundo apellido</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="last_name2"  />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('identification_card'); ?></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control col-sm-12" name="id_card"  />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                     <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('category'); ?></label>
                            <div class="col-sm-12">
                                <div class="rating">
                                    <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                                </div>
                                <input type="hidden" class="form-control col-sm-12" name="category"  />
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
                                <input type="text" class="form-control" name="phone"  />
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="phone2"  />
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="phone3"  />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('email'); ?></label>
                            <div class="col-sm-12">
                                <input type="email" class="form-control" name="email"  />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('agent'); ?></label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="seller"   />
                                        <input type="hidden" id="seller_id" name="seller_id"  />
                                    </div>
                                </div>
                                <!-- form-group -->
                            </div>
                    <!-- col -->
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('address'); ?></label>
                            <div class="col-sm-4">
                                <select class="selectboxit" id="provincias" name="province">
                                    <option value="">Provincia</option>             
                                    <option value="Alajuela">Alajuela</option>
                                    <option value="Cartago">Cartago</option>
                                    <option value="Guanacaste">Guanacaste</option>
                                    <option value="Heredia">Heredia</option>
                                    <option value="Limón">Limón</option>
                                    <option value="Puntarenas">Puntarenas</option>
                                    <option value="San José">San José</option>
                                </select>
                            </div>
                            <div class="col-sm-4" id="lvl-container-2">
                                    <select class="selectboxit selectaux" id="cantones" name="canton">
                                        <option value="">Cantón</option>
                                    </select>
                            </div>
                            <div class="col-sm-4" id="lvl-container-3">
                                <select class="selectboxit" id="distritos" name="district">
                                    <option value="">Distrito</option>
                                </select>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('other_signs'); ?></label>
                            <div class="col-sm-12">
                                <textarea name="address" class="form-control" rows="1"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
          
              
              <!-- Fecha de inclusion -->
              <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">Fecha de Inclusion</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="fecha_inclusion"  />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label">Ruta</label>
                            <div class="col-sm-12">
                                <input type="text"  class="form-control format-currency" name="ruta" >
                                <input type="hidden" name="ruta" value="">
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label">Vendedor</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="vendedor">
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label">Forma de Pago</label>
                            <div class="col-sm-12">
                                <input type="text"  class="form-control format-currency"  name="forma_pago">
                            </div>
                        </div>
                    </div>
                     <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label">N° Contrato</label>
                            <div class="col-sm-12">
                                <input type="text"  class="form-control format-currency" value="0" name="contract_id">
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
                                    <input type="text"  class="form-control format-currency" name="local_1">
                                </div>
                                <div class="col-md-4">
                                    <input type="text"  class="form-control format-currency" name="local_2">
                                </div>
                                <div class="col-md-4">
                                    <input type="text"  class="form-control format-currency" name="local_3">
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label">N° Recibo</label>
                            <div class="col-sm-12">
                                <input type="text"  class="form-control format-currency" value="0" name="no_recibo">
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
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-1" class="control-label col-sm-12">Mes Al Cobro</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="mes_cobro"  />
                                </div>
                            </div>
                        </div>
                        <!-- col -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-1" class="col-sm-12 control-label">Saldo Anterior</label>
                                <div class="col-sm-12">
                                    <input type="text"  class="form-control " name="saldo_anterior" >
                                </div>
                            </div>
                        </div>
                        <!-- col -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-1" class="col-sm-12 control-label">Saldo Actual</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="saldo_actual">
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
                                <textarea class="form-control" name="service_observations"  rows="1" ></textarea>
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

    if ( $('#client_registered').is(':checked') ){
        $('.client input').addClass('on');
    }

    $('[name=amount],[name=tiempo_contrato]').on('input', function(e){
        calcularSaldo();
    });

    function calcularSaldo(){
        var amount = Number($('[name=amount]').val()),
            time = Number($('[name=tiempo_contrato]').val()),
            cuota = amount || 0;

        if( amount && time ){
            cuota = amount / time;
        }

        $('[name=monto_cuota]').prev().val(cuota).trigger('input');
    }
</script>