<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    Añadir servicio funecrédito 
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
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="deceased_first_name" placeholder="Nombre" />
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="deceased_last_name1" placeholder="Primer apellido" />
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="deceased_last_name2" placeholder="Segundo apellido"  />
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
                    <div class="col-md-1 hide">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">Registrado</label>
                            <div class="col-sm-12">
                                <input type="checkbox" class="form-control" id="client_registered" checked />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-6">
                        <div class="form-group client">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('contractor'); ?></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="client_first_name" id="client_first_name" placeholder="Nombre"/>
                                <input type="hidden" id="client_id" name="client_id"  />
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="client_last_name1" id="client_last_name1" placeholder="Primer apellido"/>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="client_last_name2" id="client_last_name2" placeholder="Segundo apellido"/>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-6">
                        <div class="form-group client">
                            <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('phone'); ?></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="client_phone" id="client_phone"   />
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="client_phone2" id="client_phone2"  />
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="client_phone3" id="client_phone3"  />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                </div>
                <!-- third row -->

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group client">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('email'); ?></label>
                            <div class="col-sm-12">
                                <input type="email" class="form-control" name="client_email" id="client_email"  />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group client">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('identification_card'); ?></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="client_id_card" id="client_id_card"  />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('relationship'); ?></label>
                            <div class="col-sm-12">
                                <select class="selectboxit" name="relationship">
                                    <option value="">Seleccione</option>
                                    <option value="Esposo">Esposo</option>
                                    <option value="Esposa">Esposa</option>
                                    <option value="Padre">Padre</option>
                                    <option value="Madre">Madre</option>
                                    <option value="Hijo">Hijo</option>
                                    <option value="Hija">Hija</option>
                                    <option value="Nieto">Nieto</option>
                                    <option value="Nieta">Nieta</option>
                                    <option value="Abuela">Abuela</option>
                                    <option value="Abuelo">Abuelo</option>
                                    <option value="Tío">Tío</option>
                                    <option value="Tía">Tía</option>
                                    <option value="Sobrino">Sobrino</option>
                                    <option value="Sobrina">Sobrina</option>
                                    <option value="Suegra">Suegra</option>
                                    <option value="Suegro">Suegro</option>
                                    <option value="Yerno">Yerno</option>
                                    <option value="Nuera">Nuera</option>
                                    <option value="Cuñado">Cuñado</option>
                                    <option value="Amigo">Amigo</option>
                                    <option value="Otro">Otro</option>
                                </select> 
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
                                <button class="payment_method" disabled data-tooltip="Seleccione un cliente primero para calcular pagos">Calculo pago</button>
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
                            <label for="field-1" class="col-sm-12 control-label">Monto del servicio</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" disabled>
                                <input type="hidden" name="amount" value="">
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('balance_'); ?></label>
                            <div class="col-sm-12">
                                <input type="text"  class="form-control format-currency" disabled>
                                <input type="hidden" name="balance" value="">
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <input type="hidden"  name="contrato_account_id1" id="contrato_account_id1" />
                    <input type="hidden"  name="contrato_account_id2" id="contrato_account_id2" />
                    <input type="hidden"  name="contrato_account_id3" id="contrato_account_id3"/>
                    <input type="hidden" name="saldoFunecredito" id="saldoFunecredito">
                    <input type="hidden" name="plazoFunecredito" id="plazoFunecredito">
                    <input type="hidden" name="interesFunecredito" id="interesFunecredito">
                    <input type="hidden" name="cuotaFunecredito" id="cuotaFunecredito">
                    <input type="hidden" name="primaFunecredito" id="primaFunecredito">
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

        $('#calcAmount').addClass('has-info');

        $('#payment').closest('.row').remove();

        $('#pay1month').closest('.col-md-12').hide();

        $('#calcAmount').find('input:not(:checkbox)').val('').end()
        .find(':checkbox').prop('checked', false).end()
        .find('#useContract1, #useContract2, #useContract3').prop('disabled',true);

        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd'
        });

        $('#calcAmount').removeClass('has-info');

        $('[data-custom]').remove();

        if ( $('#client_registered').is(':checked') ){
            $('.client input').addClass('on');
        }
    })();
</script>