<?php 



$sql = "select c.*, cn.* from bk_funeral c inner join bk_contact cn on c.contact_id = cn.contact_id where id_funeral = ?";
// $sql_account = "select * from bk_contratos_account where contract_number = ?";
// echo '$param3 '.$param3.'<br>';
$row = $this->db->query( $sql, array( $param3 ) )->row_array();
// $acc = $this->db->query( $sql_account, array( $param3 ) )->row_array();
// echo '<pre>';
// print_r($row);
// echo '</pre>';

$sql = "select * from bk_vendedores";
$vendedores = $this->db->query( $sql)->result_array();

function checked_input($input){
    return ($input==1) ? "checked" : "";
}

// $trim_row = array();
// foreach ($row as $k=>$v){
//     $row[$k] = trim($v);
// }

?>

<?php if(  !empty($row) ) : ?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    Añadir servicio funeral 
                </div>
            </div>
            
            <div class="panel-body">

                <?php echo form_open(site_url('servicio/servicios/updateFuneral'), array('class' => 'services form-horizontal form-groups-bordered form-fun validate', 'enctype' => 'multipart/form-data')); ?>

                <input type="hidden" name="funeral_tipo" value="funeral">

                <h3>Información Personal</h3>

                <input type="hidden" name="type" value="<?php echo $param3;  ?>">
                
                <div class="row">
                    <div class="col-md-2 pull-right">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">N° Contratación funeral</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control col-sm-12" name="id_funeral"  readonly value="FN-000<?php echo $row['id_funeral']?>" />
                            </div>
                        </div>
                    </div>
                </div>
<div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('identification_card'); ?></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control col-sm-12" name="client_id_card" value="<?php echo htmlentities( $row['id_card'] ); ?>" readonly/>
                                <input type="hidden" id="contact_id" name="contact_id"  value="<?php echo htmlentities( $row['contact_id'] ); ?>"  />
                                <input type="hidden" id="contact_id" name="service_id"  value="<?php echo htmlentities( $row['id_funeral'] ); ?>"  />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('first_name'); ?></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="client_first_name" value="<?php echo htmlentities( $row['first_name'] ); ?>" readonly/>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">Primer apellido</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="client_last_name"  value="<?php echo htmlentities( $row['last_name'] ); ?>" readonly/>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">Segundo apellido</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="client_last_name2"  value="<?php echo htmlentities( $row['last_name2'] ); ?>" readonly/>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    
                     <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('category'); ?></label>
                            <div class="col-sm-12">
                               <div class="rating">
                                    <?php 
                                        $starts = 5;
                                        $rating = $starts - $row['category'];
                                    ?>

                                    <?php for( $i = 0; $i < $starts; $i++ ): ?>
                                        <?php echo '<span ' . ( $i ==  $rating ? 'class="active"' : '' ) . ' >☆</span>' ?>
                                    <?php endfor; ?>
                                </div>
                                <input type="hidden" class="form-control col-sm-12" name="category"  value="<?php echo htmlentities( $row['category'] ); ?>" />
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
                                <input type="text" class="form-control" name="client_phone" disabled value="<?php echo htmlentities( $row['phone'] ); ?>"/>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="client_phone2" disabled value="<?php echo htmlentities( $row['phone2'] ); ?>"/>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="client_phone3" disabled value="<?php echo htmlentities( $row['phone3'] ); ?>"/>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('email'); ?></label>
                            <div class="col-sm-12">
                                <input type="email" class="form-control" name="client_email" disabled value="<?php echo htmlentities( $row['email'] ); ?>"/>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('address'); ?></label>
                            <div class="col-sm-4">
                                <select class="selectboxit" id="provincias" name="province" disabled >
                                     <?php echo "<option selected >" . $row['province'] . "</option>"; ?>           
                                </select>
                            </div>
                            <div class="col-sm-4" id="lvl-container-2">
                                    <select class="selectboxit selectaux" id="cantones" name="canton" disabled>
                                         <?php echo "<option selected >" . $row['canton'] . "</option>"; ?>  
                                    </select>
                            </div>
                            <div class="col-sm-4" id="lvl-container-3">
                                <select class="selectboxit" id="distritos" name="district" disabled>
                                    <?php echo "<option selected >" . $row['district'] . "</option>"; ?>  
                                </select>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('other_signs'); ?></label>
                            <div class="col-sm-12">
                                <textarea name="client_address" class="form-control" rows="1" disabled><?php echo htmlentities( $row['address'] ); ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                     <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('deceased'); ?></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="deceased_id_card" placeholder="Cédula"   value="<?php echo htmlentities( $row['fallecido_ced'] ); ?>"/>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="deceased_first_name" placeholder="Nombre" value="<?php echo htmlentities( $row['fallecido_nombre'] ); ?>"/>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="deceased_last_name1" placeholder="Primer apellido" value="<?php echo htmlentities( $row['fallecido_apellido'] ); ?>"/>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="deceased_last_name2" placeholder="Segundo apellido"  value="<?php echo htmlentities( $row['fallecido_apellido2'] ); ?>"/>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-1">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('age'); ?></label>
                            <div class="col-sm-12">
                                <input type="number" class="form-control" value="50" name="deceased_age"  value="<?php echo htmlentities( $row['fallecido_edad'] ); ?>"/>
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
                                <input type="text" class="form-control" name="death_document"  value="<?php echo htmlentities( $row['acta_defuncion'] ); ?>"/>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('relationship'); ?></label>
                            <div class="col-sm-12">
                                <select class="selectboxit" name="relationship">
                                    <?php echo "<option selected value='". $row['parentesco']."'>" . $row['parentesco'] . "</option>"; ?>
                                    <option value="">Seleccione</option>
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

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('date'); ?></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control datepicker" value="<?php echo htmlentities( $row['fecha'] ); ?>" name="deseace_date" />
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
                                    <?php echo "<option selected value='". $row['cofre']."'>" . $row['cofre'] . "</option>"; ?>
                                    <option value="-" disabled="">---</option>
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
                                <input type="text" class="form-control" name="bill"  value="<?php echo htmlentities( $row['factura'] ); ?>"/>
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
                                <input type="checkbox" name="transfers" class="form-control" <?php echo checked_input( $row['serv_traslado'] ); ?> >
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('forgetfulness'); ?></label>
                            <div class="col-sm-12">
                                <select class="selectboxit" name="forgetfulness">
                                    <?php echo "<option selected value='". $row['serv_esquelas']."'>" . $row['serv_esquelas'] . "</option>"; ?>
                                    <option value="-" disabled="">---</option>
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
                                    <?php echo "<option selected value='". $row['serv_flores']."'>" . $row['serv_flores'] . "</option>"; ?>
                                    <option value="-" disabled="">---</option>
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
                                    <?php echo "<option selected value='". $row['serv_tributos']."'>" . $row['serv_tributos'] . "</option>"; ?>
                                    <option value="-" disabled="">---</option>
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
                                <input type="checkbox" name="pathology" class="form-control" <?php echo checked_input( $row['serv_patologia'] ); ?> >
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="pathology_technician" class="form-control" placeholder="<?php echo lang_key('technician'); ?>" value="<?php echo htmlentities( $row['serv_patologia_tecnico'] ); ?>">
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">Costo</label>
                            <div class="col-sm-12">
                                <input type="text"  class="form-control format-currency" value="<?php echo htmlentities( $row['serv_patologia_costo'] ); ?>"/>
                                    <input type="hidden"  name="pathology_cost" value="<?php echo htmlentities( $row['serv_patologia_costo'] ); ?>"/>
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
                                <input type="checkbox" name="cremation" class="form-control" <?php echo checked_input( $row['serv_cremacion'] ); ?> >
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-3" class="col-sm-12 control-label">Autopsia</label>
                            <div class="col-sm-3">
                                <input type="checkbox" name="autopsy" class="form-control" <?php echo checked_input( $row['serv_autopsia'] ); ?>>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="autopsy_technician" class="form-control" placeholder="<?php echo lang_key('technician'); ?>" value="<?php echo htmlentities( $row['serv_autopsia_tecnico'] ); ?>">
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">Costo</label>
                            <div class="col-sm-12">
                                <input type="text"  class="form-control format-currency" value="<?php echo htmlentities( $row['serv_autopsia_costo'] ); ?>"/>
                                    <input type="hidden"  name="autopsy_cost" value="<?php echo htmlentities( $row['serv_autopsia_costo'] ); ?>"/>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label">Urna</label>
                            <div class="col-sm-12">
                                <select class="selectboxit" name="urn" data-select-add-custom>
                                    <?php echo "<option selected value='". $row['serv_urna']."'>" . $row['serv_urna'] . "</option>"; ?>
                                    <option value="-" disabled="">---</option>
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
                                            <?php echo "<option selected value='". $row['tras_morgue']."'>" . $row['tras_morgue'] . "</option>"; ?>
                                    <option value="-" disabled="">---</option>
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
                            <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('address'); ?>
                                
                            </label>
                            <div class="col-sm-12">
                                <textarea name="morgue_address" class="form-control" rows="5"><?php echo $row['tras_direccion']; ?></textarea>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!-- eight row -->

                <div class="row">
                    <div class="col-md-3 cell-top">

                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('veiling_site'); ?></label>
                            <div class="col-sm-12">
                                <input type="text"  name="veiling_site" class="form-control" value="<?php echo htmlentities( $row['tras_velacion'] ); ?>">
                            </div>
                        </div>
                        <!-- form-group -->
                    </div>
                    <!-- col -->
                    <div class="col-md-6 cell-top">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('address'); ?></label>
                            <div class="col-sm-12">
                                <textarea data-duplicate-name="veiling_site_address" class="form-control" rows="5" ><?php echo $row['tras_velacion_direccion']; ?></textarea>
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
                                            <?php echo "<option selected value='". $row['tras_hora']."'>" . $row['tras_hora'] . "</option>"; ?>
                                            <option value="-" disabled="">---</option>
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
                                        <?php echo "<option selected value='". $row['tras_hora_det']."'>" . $row['tras_hora_det'] . "</option>"; ?>
                                            <option value="-" disabled="">---</option>
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
                                            <?php echo "<option selected value='". $row['tras_bodega_cofre']."'>" . $row['tras_bodega_cofre'] . "</option>"; ?>
                                            <option value="-" disabled="">---</option>
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
                                     <?php echo "<option selected value='". $row['tras_arreglos']."'>" . $row['tras_arreglos'] . "</option>"; ?>
                                    <option value="-" disabled="">---</option>
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
                                    <?php echo "<option selected value='". $row['tras_pedestal']."'>" . $row['tras_pedestal'] . "</option>"; ?>
                                    <option value="-" disabled="">---</option>
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
                                    <?php echo "<option selected value='". $row['tras_candelero']."'>" . $row['tras_candelero'] . "</option>"; ?>
                                    <option value="-" disabled="">---</option>
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
                                <input type="checkbox" name="carpet" class="form-control" <?php echo checked_input( $row['tras_alfombra_int'] ); ?>>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('pushcart'); ?></label>
                            <div class="col-sm-12">
                                <select class="selectboxit" name="pushcart">
                                    <?php echo "<option selected value='". $row['tras_candelero']."'>" . $row['tras_candelero'] . "</option>"; ?>
                                    <option value="-" disabled="">---</option>
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
                                <input type="checkbox" name="lectern" class="form-control" <?php echo checked_input( $row['tras_atril'] ); ?>>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-1">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('curtain'); ?></label>
                            <div class="col-sm-12">
                                <input type="checkbox" name="curtain" class="form-control" <?php echo checked_input( $row['tras_cortinero'] ); ?> >
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
                                    <?php echo "<option selected value='". $row['tras_carroza']."'>" . $row['tras_carroza'] . "</option>"; ?>
                                    <option value="-" disabled="">---</option>
                                    <option value="Toyota">Toyota</option>
                                    <option value="Hyundai">Hyundai</option>
                                    <option value="Buick">Buick</option>
                                    <option value="Mercedes Shalom">Mercedes Shalom</option>
                                    <option value="Mercedes Merced">Mercedes Merced</option>
                                    <option value="Otros" data-other>Otros</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="service_driver" placeholder="<?php echo lang_key('driver');  ?>" value="<?php echo $row['tras_chofer']?>">
                            </div>
                        </div>
                    </div>
                </div>    


                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('observations'); ?></label>
                            <div class="col-sm-12">
                                <textarea class="form-control" name="transfer_observations" rows="3"><?php echo $row['tras_observaciones']?></textarea>
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
                                <input type="text" class="form-control datepicker" name="funeral_date" value="<?php echo $row['info_fecha']?>" />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('hour'); ?></label>
                            <div class="col-sm-12">
                                
                                <select class="selectboxit" name="funeral_time">
                                    <?php echo "<option selected value='". $row['info_hora']."'>" . $row['info_hora'] . "</option>"; ?>
                                    <option value="-" disabled="">---</option>
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
                                <?php echo "<option selected value='". $row['info_hora_det']."'>" . $row['info_hora_det'] . "</option>"; ?>
                                    <option value="-" disabled="">---</option>
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
                                    <?php echo "<option selected value='". $row['info_iglesia']."'>" . $row['info_iglesia'] . "</option>"; ?>
                                    <option value="-" disabled="">---</option>
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
                                      <?php echo "<option selected value='". $row['info_cementerio']."'>" . $row['info_cementerio'] . "</option>"; ?>
                                    <option value="-" disabled="">---</option>
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
                                    <?php echo "<option selected value='". $row['info_carroza']."'>" . $row['info_carroza'] . "</option>"; ?>
                                    <option value="-" disabled="">---</option>
                                    <option value="Toyota">Toyota</option>
                                    <option value="Hyundai">Hyundai</option>
                                    <option value="Buick">Buick</option>
                                    <option value="Mercedes Shalom">Mercedes Shalom</option>
                                    <option value="Mercedes Merced">Mercedes Merced</option>
                                    <option value="Otros" data-other>Otros</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="info_service_driver" placeholder="<?php echo lang_key('driver');  ?>" value="<?php echo $row['info_chofer']?> ">
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('decoration'); ?></label>
                            <div class="col-sm-6">
                                <select class="selectboxit" name="info_decoration_float" data-select-add-custom>
                                    <?php echo "<option selected value='". $row['info_decora']."'>" . $row['info_decora'] . "</option>"; ?>
                                    <option value="-" disabled="">---</option>
                                    <option value="Toyota">Toyota</option>
                                    <option value="Hyundai">Hyundai</option>
                                    <option value="Buick">Buick</option>
                                    <option value="Mercedes Shalom">Mercedes Shalom</option>
                                    <option value="Mercedes Merced">Mercedes Merced</option>
                                    <option value="Otros" data-other>Otros</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="info_decoration_driver" placeholder="<?php echo lang_key('driver');  ?>" value="<?php echo $row['info_decora_chofer'] ?>">
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
                                <textarea class="form-control" name="info_service_observations"  rows="5" ><?php echo $row['info_observaciones'] ?></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                </div>
                <!-- eleventh row -->

                <h3>Forma de pago</h3>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">Monto Total del Servicio</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control format-currency "  required  value="<?php echo $row['monto_total'] ?>"/>
                                <input type="hidden" name="amount" value="<?php echo $row['monto_total'] ?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">Prima</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control format-currency " required  value="<?php echo $row['prima'] ?>"/>
                                <input type="hidden" name="prima" value="<?php echo $row['prima'] ?>" />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">Saldo total</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control format-currency "required  value="<?php echo $row['saldo_total'] ?>"/>
                                <input type="hidden" name="saldo" value="<?php echo $row['saldo_total'] ?>" />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-1">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">Contado</label>
                            <div class="col-sm-12">
                                <input type="radio" name="forma_pago" class="form-control" value="1">
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-1">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">Crédito</label>
                            <div class="col-sm-12">
                                <input type="radio" name="forma_pago" class="form-control" value="2">
                            </div>
                        </div>
                    </div>
                    <!-- col -->
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
                                <input type="text" class="form-control " name="contrato_1_num"  value="<?php echo $row['contrato_1_numero'] ?>"/>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">Valor</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control format-currency "  value="<?php echo $row['contrato_1_valor'] ?>" />
                                <input type="hidden" name="contrato_1_val" value="<?php echo $row['contrato_1_valor'] ?>"/>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">Aplicar</label>
                            <div class="col-sm-12">
                                <input type="checkbox" name="" class="form-control" value="1">
                            </div>
                        </div>
                    </div>
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
                               <input type="text" class="form-control " value="<?php echo $row['contrato_2_numero'] ?>" name="contrato_2_num"  />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">Valor</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control format-currency" value="<?php echo $row['contrato_2_valor'] ?>" />
                                <input type="hidden"     name="contrato_2_val"  value="<?php echo $row['contrato_2_valor'] ?>"/>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">Aplicar</label>
                            <div class="col-sm-12">
                                <input type="checkbox" name="" class="form-control" value="1">
                            </div>
                        </div>
                    </div>
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
                                <input type="text" class="form-control " name="contrato_3_num" value="<?php echo $row['contrato_3_numero'] ?>" />                        
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">Valor</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control format-currency"  value="<?php echo $row['contrato_3_valor'] ?>" />
                                <input type="hidden"  name="contrato_3_val" value="<?php echo $row['contrato_3_valor'] ?>" />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">Aplicar</label>
                            <div class="col-sm-12">
                                <input type="checkbox" name="" class="form-control" value="1">
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    
                </div>
                <!-- row -->
                
               
                <!-- row -->
                <!-- <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">Monto del crédito</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control format-currency " name="monto_credito" required  />
                                <input type="hidden"   data-info="amount_word"  />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">Plazo</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control " name=""  />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">Intereses</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control " name=""  />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">Cuota Mensual</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control " name=""  />
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- row -->

               
                <!-- row -->

                <!-- <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">Saldo a financiar de contratos</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control format-currency " name="saldo_financiar" required  />
                                <input type="hidden"   data-info="amount_word"  />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">Cuota Mensual</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control format-currency " name="cuota_mensual" required  />
                                <input type="hidden"   data-info="amount_word"  />
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- row -->
                
                <!-- row -->

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

        // $('textarea').html().trim();


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
<?php endif; ?>