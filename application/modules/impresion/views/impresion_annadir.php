<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    <?php echo lang_key('add_service'); ?> 
                </div>
            </div>
            
            <div class="panel-body">

                <?php echo form_open(site_url('servicio/servicios/create'), array('class' => 'services form-horizontal form-groups-bordered form-fun validate', 'enctype' => 'multipart/form-data')); ?>

                <h3>Información Personal</h3>

                <input type="hidden" name="type" value="<?php echo $param3;  ?>">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('date'); ?></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control datepicker" name="death_date"  />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('death_document'); ?></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="death_document"  />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12" ><?php echo lang_key('seller'); ?></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="seller"  />
                                <input type="hidden" id="seller_id" name="seller_id"  />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                </div>
                <!-- first row -->

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('deceased'); ?></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="deceased_name"  />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('identification_card'); ?></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="deceased_id_card"  />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('age'); ?></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="deceased_age"  />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                </div>
                <!-- seccond row -->

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('contractor'); ?></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control client" id="client_name"/>
                                <input type="hidden" id="client_id" name="client_id"  />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('phone'); ?></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control client" id="client_phone"   />
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control client" id="client_phone2"  />
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control client" id="client_phone3"  />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                </div>
                <!-- third row -->

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('email'); ?></label>
                            <div class="col-sm-12">
                                <input type="email" class="form-control client" id="client_email"  />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('identification_card'); ?></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control client" id="client_id_card"  />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('relationship'); ?></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control col-sm-12" name="relationship"  />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                </div>
                <!-- fourth row -->

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('payment_method'); ?></label>
                            <div class="col-sm-12">
                                <select class="selectboxit" name="payment_method">
                                    <option value="Contado">Contado</option>
                                    <option value="Contrato">Contrato</option>
                                    <option value="Funecrédito">Funecrédito</option>
                                    <option value="Contrato - Funecrédito">Contrato - Funecrédito</option>
                                    <option value="Contrato -Contado">Contrato -Contado</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('contract_id'); ?></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="contract_id"  />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('amount_'); ?></label>
                            <div class="col-sm-12">
                                <input type="number" name="amount" class="form-control">
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('balance_'); ?></label>
                            <div class="col-sm-12">
                                <input type="number" name="balance" class="form-control">
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                </div>
                <!-- fith row -->

                <h3>Desglose del Servicio Traslado</h3>

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('coffin'); ?></label>
                            <div class="col-sm-12">
                                <select class="selectboxit" name="coffin" data-select-add-custom>
                                    <option value="Diplomático">Diplomático</option>
                                    <option value="Ejecutivo italiano">Ejecutivo italiano</option>
                                    <option value="Europeo">Europeo</option>
                                    <option value="Aura">Aura</option>
                                    <option value="Italiano vidrio">Italiano vidrio</option>
                                    <option value="Italiano Diplomático">Italiano Diplomático</option>
                                    <option value="Pino">Pino</option>
                                    <option value="Peluche">Peluche</option>
                                    <option value="Presidencial pilares">Presidencial pilares</option>
                                    <option value="Presidencial octopilar">Presidencial octopilar</option>
                                    <option value="Luna">Luna</option>
                                    <option value="Eco">Eco</option>
                                    <option value="Otro" data-other>Otro</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('bill'); ?></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="bill"  />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('veiling_room'); ?></label>
                            <div class="col-sm-12">
                                <input type="checkbox" name="veiling_room" class="form-control" value="1">
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('transfers'); ?></label>
                            <div class="col-sm-12">
                                <input type="checkbox" name="transfers" class="form-control" value="1">
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                </div>
                <!-- sixth row -->

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('forgetfulness'); ?></label>
                            <div class="col-sm-12">
                                <select class="selectboxit" name="forgetfulness">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-3" class="col-sm-12 control-label"><?php echo lang_key('pathology'); ?></label>
                            <div class="col-sm-3">
                                <input type="checkbox" name="pathology" class="form-control" value="1">
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="technician" class="form-control" placeholder="<?php echo lang_key('technician'); ?>">
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('flowers'); ?></label>
                            <div class="col-sm-12">
                                <select class="selectboxit" name="flowers">
                                    <option value="2">2</option>
                                    <option value="4">4</option>
                                    <option value="6">6</option>
                                    <option value="8">8</option>
                                    <option value="10">10</option>
                                    <option value="12">12</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('cremation'); ?></label>
                            <div class="col-sm-12">
                                <input type="checkbox" name="cremation" class="form-control" value="1">
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                </div>
                <!-- seventh row -->

                <div class="row">
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('morgue'); ?></label>
                                    <div class="col-sm-12">
                                        <select class="selectboxit" name="morgue">
                                            <option value="Casa de habitación">Casa de habitación</option>
                                            <option value="Hogar de ancianos">Hogar de ancianos</option>
                                            <option value="Medicatura forense">Medicatura forense</option>
                                            <option value="Hospital Blanco Cervantes">Hospital Blanco Cervantes</option>
                                            <option value="Hospital México">Hospital México</option>
                                            <option value="Hospital San Juan de Dios">Hospital San Juan de Dios</option>
                                            <option value="Hospital Calderón Guardia">Hospital Calderón Guardia</option>
                                            <option value="Hospital Cartago">Hospital Cartago</option>
                                            <option value="Hospital Heredia">Hospital Heredia</option>
                                            <option value="Hospital Alajuela">Hospital Alajuela</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- form-group -->
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('veiling_site'); ?></label>
                                    <div class="col-sm-12">
                                        <select class="selectboxit" name="veiling_site" data-select-add-custom>
                                            <option value="Funeraria Shalom">Funeraria Shalom</option>
                                            <option value="Capilla Colima">Capilla Colima</option>
                                            <option value="Capilla Cinco Esquinas">Capilla Cinco Esquinas</option>
                                            <option value="Capilla Maria Auxiliadora">Capilla Maria Auxiliadora</option>
                                            <option value="Capilla Llorente">Capilla Llorente</option>
                                            <option value="Casa de habitación">Casa de habitación</option>
                                            <option value="Salon comunal">Salon comunal</option>
                                            <option value="Iglesia">Iglesia</option>
                                            <option value="Otro" data-other>Otro</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- form-group -->
                            </div>
                        </div>
                        
                    </div>
                    <!-- col -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('address'); ?></label>
                            <div class="col-sm-12">
                                <textarea name="transfer_address" class="form-control" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('driver'); ?></label>
                                    <div class="col-sm-12">
                                        <input type="checkbox" name="driver" class="form-control" value="1">
                                    </div>
                                </div>
                                <!-- form-group -->
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('float'); ?></label>
                                    <div class="col-sm-12">
                                        <input type="checkbox" name="float" class="form-control" value="1">
                                    </div>
                                </div>
                                <!-- form-group -->
                            </div>
                        </div>
                        
                    </div>
                    <!-- col -->
                </div>
                <!-- eight row -->

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('hour'); ?></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="transfer_hour"  />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('vault_coffin'); ?></label>
                            <div class="col-sm-12">
                                <select class="selectboxit" name="vault_coffin">
                                    <option value="Shalom">Shalom</option>
                                    <option value="Merced">Merced</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('candlestick'); ?></label>
                            <div class="col-sm-12">
                                <select class="selectboxit" name="candlestick">
                                    <option value="No">No</option>
                                    <option value="2">2</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('pushcart'); ?></label>
                            <div class="col-sm-12">
                                <select class="selectboxit" name="pushcart">
                                    <option value="Europea">Europea</option>
                                    <option value="Americana">Americana</option>
                                    <option value="Nacional">Nacional</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('curtain'); ?></label>
                            <div class="col-sm-12">
                                <input type="checkbox" name="curtain" class="form-control" value="1">
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                </div>
                <!-- nineth row -->

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('observations'); ?></label>
                            <div class="col-sm-12">
                                <textarea class="form-control" name="transfer_observations" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('arrangements'); ?></label>
                                    <div class="col-sm-12">
                                        <select class="selectboxit" name="arrangements">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- col -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('pedestal'); ?></label>
                                    <div class="col-sm-12">
                                        <select class="selectboxit" name="pedestal">
                                            <option value="2">2</option>
                                            <option value="4">4</option>
                                            <option value="6">6</option>
                                            <option value="8">8</option>
                                            <option value="10">10</option>
                                            <option value="12">12</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- col -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('lectern'); ?></label>
                                    <div class="col-sm-12">
                                        <input type="checkbox" name="lectern" class="form-control" value="1">
                                    </div>
                                </div>
                            </div>
                            <!-- col -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('carpet'); ?></label>
                                    <div class="col-sm-12">
                                        <input type="checkbox" name="carpet" class="form-control" value="1">
                                    </div>
                                </div>
                            </div>
                            <!-- col -->
                        </div>
                    </div>
                    
                </div>
                <!-- tenth row -->
            
                <h3>Información del Servicio</h3>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('date'); ?></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control datepicker" name="service_date"  />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('hour'); ?></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="service_hour"  />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('church'); ?></label>
                            <div class="col-sm-12">
                                <select class="selectboxit" name="church" data-select-add-custom>
                                    <option value="Tibás">Tibás</option>
                                    <option value="Colima">Colima</option>
                                    <option value="Cinco Esquinas">Cinco Esquinas</option>
                                    <option value="Llorente">Llorente</option>
                                    <option value="Sta Mónica">Sta Mónica</option>
                                    <option value="Santo Domingo">Santo Domingo</option>
                                    <option value="Santo Thomas">Santo Thomas</option>
                                    <option value="Santa Rosa">Santa Rosa</option>
                                    <option value="San Miguel">San Miguel</option>
                                    <option value="San Luis">San Luis</option>
                                    <option value="Moravia">Moravia</option>
                                    <option value="Guadalupe">Guadalupe</option>
                                    <option value="Hatillo Centro">Hatillo Centro</option>
                                    <option value="Calle Blancos">Calle Blancos</option>
                                    <option value="Alajuelita">Alajuelita</option>
                                    <option value="Pavas Sta Barbara">Pavas Sta Barbara</option>
                                    <option value="Pavas Maria Reina">Pavas Maria Reina</option>
                                    <option value="Escazú">Escazú</option>
                                    <option value="Desamparados">Desamparados</option>
                                    <option value="Paso Ancho">Paso Ancho</option>
                                    <option value="Otro" data-other>Otro</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                </div>
                <!-- eleventh row -->

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('cemetery'); ?></label>
                            <div class="col-sm-12">
                                <select class="selectboxit" name="cemetery" data-select-add-custom>
                                    <option value="Tibás">Tibás</option>
                                    <option value="Moravia">Moravia</option>
                                    <option value="Guadalupe">Guadalupe</option>
                                    <option value="Santo Domingo">Santo Domingo</option>
                                    <option value="Jardines del Recuerdo">Jardines del Recuerdo</option>
                                    <option value="Desamparados">Desamparados</option>
                                    <option value="Bosques de Paz">Bosques de Paz</option>
                                    <option value="Obrero">Obrero</option>
                                    <option value="Alajuelita">Alajuelita</option>
                                    <option value="Pavas">Pavas</option>
                                    <option value="Metropolitano">Metropolitano</option>
                                    <option value="Escazú">Escazú</option>
                                    <option value="Calvo">Calvo</option>
                                    <option value="Piedad Heredia">Piedad Heredia</option>
                                    <option value="Piedad Desamparados">Piedad Desamparados</option>
                                    <option value="Piedad Sto Domingo">Piedad Sto Domingo</option>
                                    <option value="Piedad Moravia">Piedad Moravia</option>
                                    <option value="Piedad Sto Thomas">Piedad Sto Thomas</option>
                                    <option value="Piedad Escazú">Piedad Escazú</option>
                                    <option value="Cartago">Cartago</option>
                                    <option value="Otros" data-other>Otros</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('float'); ?></label>
                                    <div class="col-sm-6">
                                        <select class="selectboxit" name="service_float" data-select-add-custom>
                                            <option value="Toyota">Toyota</option>
                                            <option value="Hyundai">Hyundai</option>
                                            <option value="Buick">Buick</option>
                                            <option value="Mercedes Shalom">Mercedes Shalom</option>
                                            <option value="Mercedes Merced">Mercedes Merced</option>
                                            <option value="Otros" data-other>Otros</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="service_driver" placeholder="<?php echo lang_key('driver');  ?>">
                                    </div>
                                </div>
                            </div>
                            <!-- col -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('decoration'); ?></label>
                                    <div class="col-sm-6">
                                        <select class="selectboxit" name="decoration_float" data-select-add-custom>
                                            <option value="Toyota">Toyota</option>
                                            <option value="Hyundai">Hyundai</option>
                                            <option value="Buick">Buick</option>
                                            <option value="Mercedes Shalom">Mercedes Shalom</option>
                                            <option value="Mercedes Merced">Mercedes Merced</option>
                                            <option value="Otros" data-other>Otros</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="decoration_driver" placeholder="<?php echo lang_key('driver');  ?>">
                                    </div>
                                </div>
                            </div>
                            <!-- col -->
                        </div>
                    </div>
                    <!-- col -->
                    
                </div>
                <!-- eleventh row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('observations'); ?></label>
                            <div class="col-sm-12">
                                <textarea class="form-control" name="service_observations"  rows="5" ></textarea>
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
    (function(){

        $('[data-custom]').remove();

        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd'
        });
    
        var $addMoreModal = $('#selectAddMore'),
            $currentAddMore = null;

        $('[data-select-add-custom]').on('change', function(){
            if( $(this).find('option:selected').is('[data-other]') ){
                $currentAddMore = $(this);
                showModal($addMoreModal);
            }
        });

        $addMoreModal.off('hide.bs.modal');

        $addMoreModal.on('hide.bs.modal', function(){
            
            var value = $.trim( $addMoreModal.find('input').val() );
                
            if( value ){
                var valueExists = $currentAddMore.find('option[value="' + value + '"]').index();

                if( valueExists == -1 ){
                    var $otherOption = $currentAddMore.find('[data-other]'),
                        otherValue = $otherOption.text(),
                        $customOption = $currentAddMore.find('[data-custom]');

                    $currentAddMore.data("selectBox-selectBoxIt").remove( $otherOption.index() );
                    $currentAddMore.data("selectBox-selectBoxIt").remove( $customOption.index() );

                    $currentAddMore.data("selectBox-selectBoxIt").add([{
                        text: value,
                        value: value,
                        'data-custom': true
                    },{
                        text: otherValue,
                        value: otherValue,
                        'data-other': true
                    }]);

                    $currentAddMore.data("selectBox-selectBoxIt").selectOption(value);
                }
                else{
                    $currentAddMore.data("selectBox-selectBoxIt").selectOption(valueExists);
                }
               
            }
            else{
                $currentAddMore.data("selectBox-selectBoxIt").selectOption(0);
            }

             $addMoreModal.find('input').val('');
        });

        $('#seller').on('click input', function(){
            showModal('#vendedoresModal');
        });

         $('.add-vendedor').off('click');

        $('.add-vendedor').on('click', function(e){
            e.preventDefault();
            var name = $(this).data('username');
            var id =  $(this).data('id');
            
            $('#seller').val(name);
            $('#seller_id').val(id);

            $('#vendedoresModal').modal('hide');

        });


        $('.client').on('click input', function(){
            showModal('#clienteModal');
        });

        $('.add-client').off('click');

        $('.add-client').on('click', function(e){
            e.preventDefault();
            var name = $(this).data('name');
            var id =  $(this).data('id');
            var id_card = $(this).data('id_card');
            var email = $(this).data('email');
            var phone = $(this).data('phone');
            var phone2 = $(this).data('phone2');
            var phone3 = $(this).data('phone3');
            
            $('#client_id').val(id);
            $('#client_name').val(name);
            $('#client_id_card').val(id_card);
            $('#client_email').val(email);
            $('#client_phone').val(phone);
            $('#client_phone2').val(phone2);
            $('#client_phone3').val(phone3);

            $('#clienteModal').modal('hide');

        });
    })();
</script>