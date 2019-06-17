<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    Añadir servicio  <?php echo $param3 ?>
                </div>
            </div>
            
            <div class="panel-body">

                <?php echo form_open(site_url('servicio/servicios/createFuneral'), array('class' => 'services form-horizontal form-groups-bordered form-fun validate', 'enctype' => 'multipart/form-data')); ?>

                <input type="hidden" name="funeral_tipo" value="funeral">
                <h3>Información Personal</h3>

                <input type="hidden" name="type" value="<?php echo $param3;  ?>">
                
                <div class="row">
                    <div class="col-md-2 pull-right">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">N° Contratación funeral</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control col-sm-12" name="id_funeral"  readonly/>
                            </div>
                        </div>
                    </div>
                </div>

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
                                <input type="text" class="form-control" name="client_last_name1"  />
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
                                <input type="text" class="form-control" name="client_phone" readonly />
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="client_phone2" readonly />
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="client_phone3" readonly />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('email'); ?></label>
                            <div class="col-sm-12">
                                <input type="email" class="form-control" name="client_email" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('seller'); ?></label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="seller"  />
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
                                <select class="selectboxit" id="provincias" name="province" readonly>
                                    <option value="">Provincia</option>             
                                </select>
                            </div>
                            <div class="col-sm-4" id="lvl-container-2">
                                    <select class="selectboxit selectaux" id="cantones" name="canton" readonly>
                                        <option value="">Cantón</option>
                                    </select>
                            </div>
                            <div class="col-sm-4" id="lvl-container-3">
                                <select class="selectboxit" id="distritos" name="district" readonly>
                                    <option value="">Distrito</option>
                                </select>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('other_signs'); ?></label>
                            <div class="col-sm-12">
                                <textarea name="client_address" class="form-control" rows="1" readonly></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                     <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('deceased'); ?></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="deceased_id_card" placeholder="Cédula"  />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="deceased_first_name" placeholder="Nombre" />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="deceased_last_name1" placeholder="Primer apellido" />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="deceased_last_name2" placeholder="Segundo apellido"  />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-1">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('age'); ?></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" value="50" name="deceased_age"  />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    
                </div>
                <!-- seccond row -->

                <div class="row">
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
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('relationship'); ?></label>
                            <div class="col-sm-12">
                                <select class="selectboxit" name="relationship">
                                    <option value="">Seleccione</option>
                                    <option value="Esposo">Esposo</option>
                                    <option value="Esposa">Esposa</option>
                                    <option value="Padre">Padre</option>
                                    <option value="Madre">Madre</option>
                                    <option value="Hermano">Hermano</option>
                                    <option value="Hermana">Hermana</option>
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

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('date'); ?></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control datepicker" value="<?php echo date('Y-m-d'); ?>" name="deseace_date" />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    
                    <!--<div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12" ><?php echo lang_key('seller'); ?></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="seller"  />
                                <input type="hidden" id="seller_id" name="seller_id"  />
                            </div>
                        </div>
                    </div>-->
                    <!-- col -->
                </div>
                <div class="row">
                    <div class="col-md-3 cell-top">
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
                    <div class="col-md-3 cell-top">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('bill'); ?></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="bill"  />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- first row -->

                <hr>
                <h3>Características del servicio</h3>
                <hr>
                <!-- <div class="row"> -->
                    
                    <!-- col -->
                    <!-- <div class="col-md-3 cell-top">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('veiling_site'); ?></label>
                            <div class="col-sm-12">
                                <select class="selectboxit" name="veiling_site" data-select-add-custom data-duplicate>
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
                        </div> -->
                        <!-- form-group -->
                    <!-- </div> -->
                    <!-- col -->
                    <!-- <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('address'); ?></label>
                            <div class="col-sm-12">
                                <textarea name="veiling_site_address" data-duplicate class="form-control" rows="5"></textarea>
                            </div>
                        </div>
                    </div> -->
                    <!-- col -->
                    <!-- <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('veiling_room'); ?></label>
                            <div class="col-sm-12">
                                <input type="checkbox" name="veiling_room" class="form-control" value="1">
                            </div>
                        </div>
                    </div> -->
                    <!-- col -->
                <!-- </div> -->
                <!-- sixth row -->

                <div class="row">
                    <div class="col-md-1">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('transfers'); ?></label>
                            <div class="col-sm-12">
                                <input type="checkbox" name="transfers" class="form-control" value="1">
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('forgetfulness'); ?></label>
                            <div class="col-sm-12">
                                <select class="selectboxit" name="forgetfulness">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('flowers'); ?></label>
                            <div class="col-sm-12">
                                <select class="selectboxit" name="flowers">
                                    <option value="0">0</option>
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
                            <label for="field-1" class="col-sm-12 control-label">Tributos</label>
                            <div class="col-sm-12">
                                <select class="selectboxit" name="tributes">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-3" class="col-sm-12 control-label"><?php echo lang_key('pathology'); ?></label>
                            <div class="col-sm-3">
                                <input type="checkbox" name="pathology" class="form-control" value="1">
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="pathology_technician" class="form-control" placeholder="<?php echo lang_key('technician'); ?>">
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">Costo</label>
                            <div class="col-sm-12">
                                <input type="text"  class="form-control format-currency" value="0" />
                                    <input type="hidden" name="pathology_cost" value="0" />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('cremation'); ?></label>
                            <div class="col-sm-12">
                                <input type="checkbox" name="cremation" class="form-control" value="1">
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-3" class="col-sm-12 control-label">Autopsia</label>
                            <div class="col-sm-3">
                                <input type="checkbox" name="autopsy" class="form-control" value="1">
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="autopsy_technician" class="form-control" placeholder="<?php echo lang_key('technician'); ?>">
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">Costo</label>
                            <div class="col-sm-12">
                                <input type="text"  class="form-control format-currency" value="0" />
                                    <input type="hidden"  name="autopsy_cost" value="0"/>
                            </div>  
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label">Urna</label>
                            <div class="col-sm-12">
                                <select class="selectboxit" name="urn" data-select-add-custom>
                                    <option value="Ecológica">Ecológica</option>
                                    <option value="Metálica">Metálica</option>
                                    <option value="Madera">Madera</option>
                                    <option value="Otro" data-other>Otro</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                </div>
                <!-- seventh row -->

                <h3>Desglose del traslado</h3>
                <div class="row">
                    <div class="col-md-3 cell-top">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('morgue'); ?></label>
                                    <div class="col-sm-12">
                                        <select class="selectboxit" name="morgue" data-select-add-custom>
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
                                            <option value="Otro" data-other>Otro</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- form-group -->
                            </div>
                            
                        </div>
                        
                    </div>
                    <!-- col -->
                    <div class="col-md-9 cell-top">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('address'); ?></label>
                            <div class="col-sm-12">
                                <textarea name="morgue_address" class="form-control" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                   <!--  <div class="col-md-3 cell-top">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('driver'); ?></label>
                                    <div class="col-sm-12">
                                        <input type="checkbox" name="driver" class="form-control" value="1">
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('float'); ?></label>
                                    <div class="col-sm-12">
                                        <input type="checkbox" name="float" class="form-control" value="1">
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        
                    </div> -->
                    <!-- col -->
                </div>
                <!-- eight row -->

                <div class="row">
                    <div class="col-md-3 cell-top">

                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('veiling_site'); ?></label>
                            <div class="col-sm-12">
                                <input type="text"  name="veiling_site" class="form-control" >
                            </div>
                        </div>
                        <!-- form-group -->
                    </div>
                    <!-- col -->
                    <div class="col-md-6 cell-top">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('address'); ?></label>
                            <div class="col-sm-12">
                                <textarea data-duplicate-name="veiling_site_address" class="form-control" rows="5" ></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3 cell-top">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('hour'); ?></label>
                                    <div class="col-sm-12">
                                        
                                        <select class="selectboxit" name="veiling_time">
                                            <option value="12">12:00</option>
                                            <option value="1">1:00</option>
                                            <option value="2">2:00</option>
                                            <option value="3">3:00</option>
                                            <option value="4">4:00</option>
                                            <option value="5">5:00</option>
                                            <option value="6">6:00</option>
                                            <option value="7">7:00</option>
                                            <option value="8">8:00</option>
                                            <option value="9">9:00</option>
                                            <option value="10">10:00</option>
                                            <option value="11">11:00</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select class="selectboxit" name="veiling_time_det">
                                            <option value="am">AM</option>
                                            <option value="pm">PM</option>
                                        </select>
                                </div>
                            </div>
                            <!-- col -->
                            <div class="col-md-12">
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
                        </div>
                        
                    </div>
                    <!-- col -->
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('arrangements'); ?></label>
                            <div class="col-sm-12">
                                <select class="selectboxit" name="veiling_site_arrangements">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('pedestal'); ?></label>
                            <div class="col-sm-12">
                                <select class="selectboxit" name="veiling_pedestal">
                                    <option value="0">0</option>
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
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('candlestick'); ?></label>
                            <div class="col-sm-12">
                                <select class="selectboxit" name="veiling_candlestick">
                                    <option value="0">0</option>
                                    <option value="2">2</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-1">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('carpet'); ?></label>
                            <div class="col-sm-12">
                                <input type="checkbox" name="carpet" class="form-control" value="1">
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('pushcart'); ?></label>
                            <div class="col-sm-12">
                                <select class="selectboxit" name="pushcart">
                                    <option value="No">No</option>
                                    <option value="Europea">Europea</option>
                                    <option value="Americana">Americana</option>
                                    <option value="Nacional">Nacional</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-1">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('lectern'); ?></label>
                            <div class="col-sm-12">
                                <input type="checkbox" name="lectern" class="form-control" value="1">
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-1">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('curtain'); ?></label>
                            <div class="col-sm-12">
                                <input type="checkbox" name="curtain" class="form-control" value="1">
                            </div>
                        </div>
                    </div>
                    <!-- col -->                    
                </div>
                <!-- tenth row -->

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
                </div>    


                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('observations'); ?></label>
                            <div class="col-sm-12">
                                <textarea class="form-control" name="transfer_observations" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                </div>
                <!-- row -->
            
                <h3>Información del servicio</h3>

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('date'); ?></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control datepicker" name="funeral_date"  />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('hour'); ?></label>
                            <div class="col-sm-12">
                                
                                <select class="selectboxit" name="funeral_time">
                                    <option value="12">12:00</option>
                                    <option value="1">1:00</option>
                                    <option value="2">2:00</option>
                                    <option value="3">3:00</option>
                                    <option value="4">4:00</option>
                                    <option value="5">5:00</option>
                                    <option value="6">6:00</option>
                                    <option value="7">7:00</option>
                                    <option value="8">8:00</option>
                                    <option value="9">9:00</option>
                                    <option value="10">10:00</option>
                                    <option value="11">11:00</option>
                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group">
                            <select class="selectboxit" name="funeral_time_det">
                                    <option value="am">AM</option>
                                    <option value="pm">PM</option>
                                </select>
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
                </div>
                <!-- eleventh row -->

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('float'); ?></label>
                            <div class="col-sm-6">
                                <select class="selectboxit" name="info_service_float" data-select-add-custom>
                                    <option value="Toyota">Toyota</option>
                                    <option value="Hyundai">Hyundai</option>
                                    <option value="Buick">Buick</option>
                                    <option value="Mercedes Shalom">Mercedes Shalom</option>
                                    <option value="Mercedes Merced">Mercedes Merced</option>
                                    <option value="Otros" data-other>Otros</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="info_service_driver" placeholder="<?php echo lang_key('driver');  ?>">
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('decoration'); ?></label>
                            <div class="col-sm-6">
                                <select class="selectboxit" name="info_decoration_float" data-select-add-custom>
                                    <option value="Toyota">Toyota</option>
                                    <option value="Hyundai">Hyundai</option>
                                    <option value="Buick">Buick</option>
                                    <option value="Mercedes Shalom">Mercedes Shalom</option>
                                    <option value="Mercedes Merced">Mercedes Merced</option>
                                    <option value="Otros" data-other>Otros</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="info_decoration_driver" placeholder="<?php echo lang_key('driver');  ?>">
                            </div>
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
                                <textarea class="form-control" name="info_service_observations"  rows="5" ></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                </div>
                <!-- eleventh row -->

                <h3>Forma de pago</h3>
                <div class="row">
                    <?php if($param3 == 'funeral'){ ?>
                    <div class="col-md-11">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">Monto Total del Servicio</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control format-currency "  required  />
                                <input type="hidden" name="amount" />
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">Prima</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control format-currency " required  />
                                <input type="hidden"   name="prima"  />
                            </div>
                        </div>
                    </div> -->
                    <!-- col -->
                   <!--  <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">Saldo total</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control format-currency "required  />
                                <input type="hidden"     name="saldo" />
                            </div>
                        </div>
                    </div> -->
                    <!-- col -->
                    <div class="col-md-1">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">Contado</label>
                            <div class="col-sm-12">
                                <input type="radio" name="forma_pago" class="form-control" checked="true">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="col-sm-12 control-label">
                                Aplicar Contrato 1
                            </label>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">Número</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control " name="contrato_1_num"  />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">Valor</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control format-currency "   />
                                <input type="hidden"    name="contrato_1_val" />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                   <!--  <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">Aplicar</label>
                            <div class="col-sm-12">
                                <input type="checkbox" name="" class="form-control" value="1">
                            </div>
                        </div>
                    </div> -->
                    <!-- col -->
                    
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="col-sm-12 control-label">
                                Aplicar Contrato 2
                            </label>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">Número</label>
                            <div class="col-sm-12">
                               <input type="text" class="form-control "   />
                                <input type="hidden"    name="contrato_2_num"  />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">Valor</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control format-currency" />
                                <input type="hidden"     name="contrato_2_val"  />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                   <!--  <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">Aplicar</label>
                            <div class="col-sm-12">
                                <input type="checkbox" name="" class="form-control" value="1">
                            </div>
                        </div>
                    </div> -->
                    <!-- col -->
                    
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="col-sm-12 control-label">
                                Aplicar Contrato 3
                            </label>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">Número</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control " name="contrato_3_num" />
                                <input type="hidden"    />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">Valor</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control format-currency"  />
                                <input type="hidden"  name="contrato_3_val"  />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <!-- <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">Aplicar</label>
                            <div class="col-sm-12">
                                <input type="checkbox" name="" class="form-control" value="1">
                            </div>
                        </div>
                    </div> -->
                    <!-- col -->
                    <?php }else{ ?>
                        <!-- funecredito pagos -->
                    <input type="hidden" name="forma_pago" value="2">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-6">Monto servicio</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control for-contado format-currency"  />
                                <input type="hidden"  id="amountService"  name="amountService" />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-6">Prima funecrédito</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control format-currency"   />
                                <input type="hidden"  id="advance_payment"  name="advance_payment"   />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-6">Abono Inicial</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control for-contado format-currency"  id="payment"   />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-6">Monto contrato #1</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control lock format-currency"   />
                                <input type="hidden"  id="amountContract1"  name="amountContract1"   />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label col-md-12">N° contrato</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control lock"   id="idContract1"   />
                                    </div>                                    
                                </div>
                            </div>
                           
                            <!--  inner col -->
                        </div>
                        <!-- inner row -->
                    </div>
                    <!-- col -->
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-6">Monto contrato 2</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control lock format-currency"  id=""   />
                                <input type="hidden"  id="amountContract2"  name="amountContract2"   />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-6">
                        <div class="row">
                        
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control lock"   id="idContract2"   />
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-6">Monto contrato 3</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control lock format-currency"  />
                                <input type="hidden"  id="amountContract3"  name="amountContract3"   />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control lock"  id="idContract3"   />
                                    </div>                                    
                                </div>
                            </div>
                           
                            <!--  inner col -->
                        </div>
                        <!-- inner row -->
                    </div>
                    <!-- col -->
                </div>
                <!-- row -->
                <div class="row" style="background-color: lightsteelblue;">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label col-md-6">Saldo a financiar Funecrédito</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control format-currency lock" disabled  id="debt_format"/>
                                        <input type="hidden"  id="debt"  name="debt" value="0"  />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-6" >
                        <div class="row" >
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label col-md-12">Plazo meses</label>
                                    <div class="col-md-12">
                                        <input type="number" class="form-control" value="0"  id="plazo"  name="plazo" min="1" />
                                    </div>
                                </div>
                            </div>
                            <!-- inner col -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label col-md-12">Interés Mensual</label>
                                    <div class="col-md-12">
                                        <input type="number" class="form-control"  id="interesMensual" value="0" name="interes_mensual"  />
                                    </div>
                                </div>
                            </div>
                            <!-- inner col -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label col-md-12">Cuota mensual funecrédito</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control  format-currency lock" disabled id="cuota_format"   />
                                        <input type="hidden"  id="couta"  name="couta"   />
                                    </div>
                                </div>
                            </div>
                            <!-- inner col -->
                        </div>
                        <!-- inner row -->
                    </div>
                    <!-- col -->
                </div>
            
                    <?php } ?>                

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            
                            <div class="col-sm-12 txt-right">
                                <?php if($param3 =='funecredito'){ ?>
                                <a class="btn btn-info"  id="calcCuotaBTN">
                                    Calcular Cuota
                                </a>
                                <?php } ?>
                                <button type="submit" class="btn btn-info" id="submit-button" style="display: none">
                                    Crear Servicio
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

    $(document).ready(function(){
        $('#calcCuotaBTN').on('click', calPagoFN);

    })

    function calPagoFN(){

        var montoServicio = $('#amountService').asNumber() || 0,
            primaFunecredito = $('#advance_payment').asNumber() || 0,
            saldoFunecredito = $('#debt').asNumber() || 0,
            abono = $('#payment').asNumber() || 0,
            montoContratos = 0,
            totalContratos = 0,
            saldoContrato = 0,
            cuotaContrato = 0,
            saldo = 0,
            plazo = $('#plazo').val() || 1,
            interesMensual = $('#interesMensual').val() || 0;
            
            montoContrato1 = $('#amountContract1').asNumber() || 0,//
            montoContrato2 = $('#amountContract2').asNumber() || 0,
            montoContrato3 = $('#amountContract3').asNumber() || 0;

            // console.log('montoServicio',montoServicio);
            // console.log('primaFunecredito',primaFunecredito);
            // console.log('saldoFunecredito',saldoFunecredito);
            // console.log('amountContract1',montoContrato1);
            // console.log('amountContract2',montoContrato2);
            // console.log('amountContract3',montoContrato3);

        var montoContratos =  montoContrato1 + montoContrato2 + montoContrato3;

            saldo = montoServicio - primaFunecredito -montoContratos;

            // console.log('saldo', saldo);            

            $('#debt').val(saldo);
            $('#debt_format').val(saldo).formatCurrency({
                symbol: '₡ '
            });

            //calcular cuota mensual.
            // console.log('saldo',saldo);
            // console.log('plazo',plazo);
            // console.log('cuotaSinInteres',cuotaSinInteres);
            var cuotaSinInteres = saldo / plazo;    
            var coutaConInteres = cuotaSinInteres ;
        
        if(interesMensual > 0){
            console.log('interesMensual',interesMensual);

            interesMensual = interesMensual / 100;
            console.log('interesMensual porcentual',interesMensual);

            var interesCalculado = cuotaSinInteres * interesMensual;
            console.log('cuotaSinInteres',cuotaSinInteres);
            console.log('X')
            console.log('interesCalculado',interesCalculado);

            coutaConInteres = coutaConInteres + interesCalculado;
            console.log('coutaConInteres',coutaConInteres);

        }

        if(isNaN(coutaConInteres)){
            coutaConInteres = 0;
        }


        $('#couta').val(coutaConInteres);
        $('#cuota_format').val(coutaConInteres).formatCurrency({
            symbol: '₡ '
        });

        
        $('#submit-button').show();


            // $('#pay1month').val(saldo).trigger('input');
            // $('#saldoContrato').val(saldoContrato).trigger('input');
            // $('#cuotaContrato').val(cuotaContrato).trigger('input');
    }


    (function(){

        $('.panel-primary .format-currency').formatCurrency({
            symbol: '₡ '
        });

        $('[data-custom]').remove();

        $('#calcAmount').addClass('has-info');

        $('#payment').closest('.row').remove();

        $('#pay1month').closest('.col-md-12').hide();

        $('#calcAmount').find('input:not(:checkbox)').val('').end()
        .find(':checkbox').prop('checked', false).end()
        .find('#useContract1, #useContract2, #useContract3').prop('readonly',true);

        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd'
        });

        $('#calcAmount').removeClass('has-info');

        $('[data-custom]').remove();

        if ( $('#client_registered').is(':checked') ){
            $('.client input').addClass('on');
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
            console.log('clients[clientId]',clients[clientId])
            $('[name=client_id_card]').val(clients[clientId].id_card);
            $('[name=client_first_name]').val(clients[clientId].first_name);
            $('[name=client_last_name1]').val(clients[clientId].last_name);
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

       


    })();
</script>