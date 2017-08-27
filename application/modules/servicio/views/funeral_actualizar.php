<?php 
$sql = "SELECT s.*, c.*, CONCAT( u.first_name, ' ', u.last_name ) AS seller_name, c.id_card AS c_id_card, c.first_name AS c_first_name, c.last_name AS c_last_name, c.last_name2 AS c_last_name2, c.phone AS c_phone, c.phone2 AS c_phone2, c.phone3 AS c_phone3, c.province AS c_province, c.canton AS c_canton, c.district AS c_district, c.category AS c_category, c.email AS c_email, c.address AS c_address
FROM bk_service AS s
LEFT JOIN bk_contact AS c ON s.contact_id = c.contact_id
LEFT JOIN bk_user AS u ON s.user_id = u.user_id 
WHERE s.service_id = ?";

$row = $this->db->query( $sql, array( $param3 ) )->row_array();

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

                <?php echo form_open(site_url('servicio/servicios/create'), array('class' => 'services form-horizontal form-groups-bordered form-fun validate', 'enctype' => 'multipart/form-data')); ?>

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
                                <input type="text" class="form-control col-sm-12" name="client_id_card" value="<?php echo htmlentities( $row['c_id_card'] ); ?>" />
                                <input type="hidden" id="contact_id" name="contact_id" value="<?php echo htmlentities( $row['contact_id'] ); ?>"  />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('first_name'); ?></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="client_first_name" value="<?php echo htmlentities( $row['c_first_name'] ); ?>" />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">Primer apellido</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="client_last_name1" value="<?php echo htmlentities( $row['c_last_name'] ); ?>" />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">Segundo apellido</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="client_last_name2"  value="<?php echo htmlentities( $row['c_last_name2'] ); ?>"/>
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
                                        $rating = $starts - $row['c_category'];
                                    ?>

                                    <?php for( $i = 0; $i < $starts; $i++ ): ?>
                                        <?php echo '<span ' . ( $i ==  $rating ? 'class="active"' : '' ) . ' >☆</span>' ?>
                                    <?php endfor; ?>
                                </div>
                                <input type="hidden" class="form-control col-sm-12" name="category"  value="<?php echo htmlentities( $row['c_category'] ); ?>" />
                            </div>
                        </div>
                    </div>
                     <!-- col -->
                </div>
                <!-- first row -->
                <div class="row">
                    <!-- col -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('phone'); ?></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="client_phone" readonly value="<?php echo htmlentities( $row['c_phone'] ); ?>" />
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="client_phone2" readonly value="<?php echo htmlentities( $row['c_phone2'] ); ?>" />
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="client_phone3" readonly value="<?php echo htmlentities( $row['c_phone3'] ); ?>" />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('email'); ?></label>
                            <div class="col-sm-12">
                                <input type="email" class="form-control" name="client_email" readonly  value="<?php echo htmlentities( $row['c_email'] ); ?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('agent'); ?></label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="seller" readonly  value="<?php echo htmlentities( $row['seller_name'] ); ?>" />
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
                                <select class="selectboxit" id="provincias" name="province" readonly >
                                    <option value="">Provincia</option>
                                    <?php echo "<option selected >" . $row['c_province'] . "</option>"; ?> 
                                </select>
                            </div>
                            <div class="col-sm-4" id="lvl-container-2">
                                <select class="selectboxit selectaux" id="cantones" name="canton" readonly >
                                    <option value="">Cantón</option>
                                    <?php echo "<option selected >" . $row['c_canton'] . "</option>"; ?> 
                                </select>
                            </div>
                            <div class="col-sm-4" id="lvl-container-3">
                                <select class="selectboxit" id="distritos" name="district" readonly >
                                    <option value="">Distrito</option>
                                    <?php echo "<option selected >" . $row['c_district'] . "</option>"; ?> 
                                </select>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('other_signs'); ?></label>
                            <div class="col-sm-12">
                                <textarea name="client_address" class="form-control" rows="1" readonly><?php echo htmlentities( $row['c_address'] ); ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                     <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('deceased'); ?></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="deceased_id_card" placeholder="Cédula" value="<?php echo htmlentities( $row['deceased_id_card'] ); ?>" />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="deceased_first_name" placeholder="Nombre" value="<?php echo htmlentities( $row['deceased_first_name'] ); ?>" />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="deceased_last_name1" placeholder="Primer apellido" value="<?php echo htmlentities( $row['deceased_last_name1'] ); ?>" />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="deceased_last_name2" placeholder="Segundo apellido" value="<?php echo htmlentities( $row['deceased_last_name2'] ); ?>" />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-1">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('age'); ?></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="deceased_age" value="<?php echo htmlentities( $row['deceased_age'] ); ?>" />
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
                                <input type="text" class="form-control" name="death_document" value="<?php echo htmlentities( $row['death_document'] ); ?>" />
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
                                    <?php 
                                        $options = array(
                                            'Padre',
                                            'Madre',
                                            'Hijo',
                                            'Hija',
                                            'Nieto',
                                            'Nieta',
                                            'Abuela',
                                            'Abuelo',
                                            'Tío',
                                            'Tía',
                                            'Sobrino',
                                            'Sobrina',
                                            'Suegra',
                                            'Suegro',
                                            'Yerno',
                                            'Nuera',
                                            'Cuñado',
                                            'Amigo',
                                            'Otro',);
                                    ?>

                                    <?php foreach($options as $opt): ?>
                                        <?php echo "<option value=\"$opt\" " . ($opt == $row['relationship'] ? 'selected' : ''  ) . ">$opt</option>"; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- col -->

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('date'); ?></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" value="" readonly />
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
                <!-- first row -->

                
                <h3>Características del servicio</h3>
    
                <div class="row">
                    <div class="col-md-3 cell-top">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('coffin'); ?></label>
                            <div class="col-sm-12">
                                <select class="selectboxit" name="coffin" data-select-add-custom>
                                    <?php 
                                        $options = array(
                                            'Diplomático',
                                            'Ejecutivo italiano',
                                            'Europeo',
                                            'Aura',
                                            'Italiano vidrio',
                                            'Italiano Diplomático',
                                            'Pino',
                                            'Peluche',
                                            'Presidencial pilares',
                                            'Presidencial octopilar',
                                            'Luna',
                                            'Eco'
                                        );
                                        $optSelected = false;
                                    ?>
                                    <?php for($i = 0, $l = count($options) - 1; $i < $l; $i++ ): ?>
                                        <?php 
                                            if( $options[$i] == $row['coffin']  )  {
                                                $optSelected = true;
                                                echo "<option value=\"" . $row['coffin'] . "\" selected >" . $row['coffin'] . "</option>";
                                            }
                                            else{
                                                echo "<option value=\"" . $options[$i] . "\" >" . $options[$i] . "</option>";
                                            }                                         
                                         ?>
                                    <?php endfor; ?>
                                    <?php 
                                        if( !$optSelected ){
                                            echo "<option data-custom value=\"" . $row['coffin'] . "\" selected >" . $row['coffin'] . "</option>";
                                        }
                                    ?>
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
                                <input type="text" class="form-control" name="bill" value="<?php echo htmlentities( $row['bill'] ); ?>" />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3 cell-top">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('veiling_site'); ?></label>
                            <div class="col-sm-12">
                                <select class="selectboxit" name="veiling_site" data-select-add-custom>
                                        <?php 
                                            $options = array(
                                                'Funeraria Shalom',
                                                'Capilla Colima',
                                                'Capilla Cinco Esquinas',
                                                'Capilla Maria Auxiliadora',
                                                'Capilla Llorente',
                                                'Casa de habitación',
                                                'Salon comunal',
                                                'Iglesia',
                                                'Otro'
                                            );
                                            $optSelected = false;
                                        ?>
                                        <?php for($i = 0, $l = count($options) - 1; $i < $l; $i++ ): ?>
                                        <?php 
                                            if( $options[$i] == $row['veiling_site']  )  {
                                                $optSelected = true;
                                                echo "<option value=\"" . $row['veiling_site'] . "\" selected >" . $row['veiling_site'] . "</option>";
                                            }
                                            else{
                                                echo "<option value=\"" . $options[$i] . "\" >" . $options[$i] . "</option>";
                                            }                                         
                                         ?>
                                    <?php endfor; ?>
                                    <?php 
                                        if( !$optSelected ){
                                            echo "<option data-custom value=\"" . $row['veiling_site'] . "\" selected >" . $row['veiling_site'] . "</option>";
                                        }
                                    ?>
                                    <option value="Otro" data-other>Otro</option>
                                </select>
                            </div>
                        </div>
                        <!-- form-group -->
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('address'); ?></label>
                            <div class="col-sm-12">
                                <textarea name="veiling_site_address" data-duplicate class="form-control" rows="5"><?php echo htmlentities( $row['veiling_site_address'] ); ?></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('veiling_room'); ?></label>
                            <div class="col-sm-12">
                                <input type="checkbox" name="veiling_room" class="form-control" value="1" <?php echo ( $row['veiling_room'] == true ? 'checked' : ''  ); ?>>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                </div>
                <!-- sixth row -->

                <div class="row">
                    <div class="col-md-1">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('transfers'); ?></label>
                            <div class="col-sm-12">
                                <input type="checkbox" name="transfers" class="form-control" value="1" <?php echo ( $row['transfers'] == true ? 'checked' : ''  ); ?>>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('forgetfulness'); ?></label>
                            <div class="col-sm-12">
                                <select class="selectboxit" name="forgetfulness">
                                    <?php 
                                        $options = array(
                                            '1',
                                            '2',
                                            '3',
                                            '4'
                                        );
                                    ?>
                                    <?php foreach($options as $opt): ?>
                                        <?php echo "<option value=\"$opt\" " . ($opt == $row['forgetfulness'] ? 'selected' : ''  ) . ">$opt</option>"; ?>
                                    <?php endforeach; ?>
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
                                    <?php 
                                        $options = array(
                                            '2',
                                            '4',
                                            '6',
                                            '8',
                                            '10',
                                            '12'
                                        );
                                    ?>
                                    <?php foreach($options as $opt): ?>
                                        <?php echo "<option value=\"$opt\" " . ($opt == $row['flowers'] ? 'selected' : ''  ) . ">$opt</option>"; ?>
                                    <?php endforeach; ?>
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
                                    <?php 
                                        $options = array(
                                            '1',
                                            '2',
                                            '3',
                                            '4',
                                            '5',
                                            '6'
                                        );
                                    ?>
                                    <?php foreach($options as $opt): ?>
                                        <?php echo "<option value=\"$opt\" " . ($opt == $row['tributes'] ? 'selected' : ''  ) . ">$opt</option>"; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-3" class="col-sm-12 control-label"><?php echo lang_key('pathology'); ?></label>
                            <div class="col-sm-3">
                                <input type="checkbox" name="pathology" class="form-control" value="1" <?php echo ( $row['pathology'] == true ? 'checked' : ''  ); ?> >
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="pathology_technician" class="form-control" placeholder="<?php echo lang_key('technician'); ?>" value="<?php echo htmlentities( $row['pathology_technician'] ); ?>">
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">Costo</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="pathology_cost"  value="<?php echo htmlentities( $row['pathology_cost'] ); ?>" />
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
                                <input type="checkbox" name="cremation" class="form-control"  value="1" <?php echo ( $row['cremation'] == true ? 'checked' : ''  ); ?> >
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-3" class="col-sm-12 control-label">Autopsia</label>
                            <div class="col-sm-3">
                                <input type="checkbox" name="autopsy" class="form-control" value="1" <?php echo ( $row['autopsy'] == true ? 'checked' : ''  ); ?> >
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="autopsy_technician" class="form-control" placeholder="<?php echo lang_key('technician'); ?>" value="<?php echo htmlentities( $row['autopsy_technician'] ); ?>" >
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">Costo</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="autopsy_cost" value="<?php echo htmlentities( $row['autopsy_cost'] ); ?>" />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label">Urna</label>
                            <div class="col-sm-12">
                                <select class="selectboxit" name="urn" data-select-add-custom>
                                        <?php 
                                            $options = array(
                                                'Ecológica',
                                                'Metálica',
                                                'Madera'
                                            );
                                            $optSelected = false;
                                        ?>
                                        <?php for($i = 0, $l = count($options) - 1; $i < $l; $i++ ): ?>
                                        <?php 
                                            if( $options[$i] == $row['urn']  )  {
                                                $optSelected = true;
                                                echo "<option value=\"" . $row['urn'] . "\" selected >" . $row['urn'] . "</option>";
                                            }
                                            else{
                                                echo "<option value=\"" . $options[$i] . "\" >" . $options[$i] . "</option>";
                                            }                                         
                                         ?>
                                    <?php endfor; ?>
                                    <?php 
                                        if( !$optSelected ){
                                            echo "<option data-custom value=\"" . $row['urn'] . "\" selected >" . $row['urn'] . "</option>";
                                        }
                                    ?>
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
                                            <?php 
                                                $options = array(
                                                    'Casa de habitación',
                                                    'Hogar de ancianos',
                                                    'Medicatura forense',
                                                    'Hospital Blanco Cervantes',
                                                    'Hospital México',
                                                    'Hospital San Juan de Dios',
                                                    'Hospital Calderón Guardia',
                                                    'Hospital Cartago',
                                                    'Hospital Heredia',
                                                    'Hospital Alajuela'
                                                );
                                                $optSelected = false;
                                            ?>
                                            <?php for($i = 0, $l = count($options) - 1; $i < $l; $i++ ): ?>
                                            <?php 
                                                if( $options[$i] == $row['morgue']  )  {
                                                    $optSelected = true;
                                                    echo "<option value=\"" . $row['morgue'] . "\" selected >" . $row['morgue'] . "</option>";
                                                }
                                                else{
                                                    echo "<option value=\"" . $options[$i] . "\" >" . $options[$i] . "</option>";
                                                }                                         
                                            ?>
                                            <?php endfor; ?>
                                            <?php 
                                                if( !$optSelected ){
                                                    echo "<option data-custom value=\"" . $row['morgue'] . "\" selected >" . $row['morgue'] . "</option>";
                                                }
                                            ?>
                                            <option value="Otro" data-other>Otro</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- form-group -->
                            </div>
                            
                        </div>
                        
                    </div>
                    <!-- col -->
                    <div class="col-md-6 cell-top">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('address'); ?></label>
                            <div class="col-sm-12">
                                <textarea name="morgue_address" class="form-control" rows="5"><?php echo htmlentities( $row['morgue_address'] ); ?></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3 cell-top">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('driver'); ?></label>
                                    <div class="col-sm-12">
                                        <input type="checkbox" name="driver" class="form-control" value="1" <?php echo ( $row['driver'] == true ? 'checked' : ''  ); ?>>
                                    </div>
                                </div>
                                <!-- form-group -->
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('float'); ?></label>
                                    <div class="col-sm-12">
                                        <input type="checkbox" name="float" class="form-control" value="1" <?php echo ( $row['float'] == true ? 'checked' : ''  ); ?>>
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
                    <div class="col-md-3 cell-top">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('veiling_site'); ?></label>
                            <div class="col-sm-12">
                                <select class="selectboxit" data-duplicate-name="veiling_site" readonly>
                                    <?php echo "<option value=\"" . $row['veiling_site'] . "\" selected >" . $row['veiling_site'] . "</option>"; ?>
                                </select>
                            </div>
                        </div>
                        <!-- form-group -->
                    </div>
                    <!-- col -->
                    <div class="col-md-6 cell-top">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('address'); ?></label>
                            <div class="col-sm-12">
                                <textarea data-duplicate-name="veiling_site_address" class="form-control" rows="5" readonly><?php echo htmlentities( $row['veiling_site_address'] ); ?></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3 cell-top">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('hour'); ?></label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="transfer_time" value="<?php echo htmlentities( $row['transfer_time'] ); ?>" />
                                    </div>
                                </div>
                            </div>
                            <!-- col -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('vault_coffin'); ?></label>
                                    <div class="col-sm-12">
                                        <select class="selectboxit" name="vault_coffin">
                                            <?php 
                                                $options = array(
                                                    'Shalom',
                                                    'Merced'
                                                );
                                            ?>
                                            <?php foreach($options as $opt): ?>
                                                <?php echo "<option value=\"$opt\" " . ($opt == $row['vault_coffin'] ? 'selected' : ''  ) . ">$opt</option>"; ?>
                                            <?php endforeach; ?>
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
                                    <?php 
                                        $options = array(
                                            '1',
                                            '2',
                                            '3',
                                            '4',
                                            '5',
                                            '6',
                                            '7',
                                            '8',
                                            '9',
                                            '10',
                                            '11',
                                            '12'
                                        );
                                    ?>
                                    <?php foreach($options as $opt): ?>
                                        <?php echo "<option value=\"$opt\" " . ($opt == $row['veiling_site_arrangements'] ? 'selected' : ''  ) . ">$opt</option>"; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('pedestal'); ?></label>
                            <div class="col-sm-12">
                                <select class="selectboxit" name="pedestal">
                                    <?php 
                                        $options = array(
                                            '2',
                                            '4',
                                            '6',
                                            '8',
                                            '10',
                                            '12'
                                        );
                                    ?>
                                    <?php foreach($options as $opt): ?>
                                        <?php echo "<option value=\"$opt\" " . ($opt == $row['pedestal'] ? 'selected' : ''  ) . ">$opt</option>"; ?>
                                    <?php endforeach; ?>
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
                                    <?php 
                                        $options = array(
                                            'No',
                                            '2',
                                            '4'
                                        );
                                    ?>
                                    <?php foreach($options as $opt): ?>
                                        <?php echo "<option value=\"$opt\" " . ($opt == $row['candlestick'] ? 'selected' : ''  ) . ">$opt</option>"; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-1">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('carpet'); ?></label>
                            <div class="col-sm-12">
                                <input type="checkbox" name="carpet" class="form-control" value="1" <?php echo ( $row['carpet'] == true ? 'checked' : ''  ); ?> >
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('pushcart'); ?></label>
                            <div class="col-sm-12">
                                <select class="selectboxit" name="pushcart">
                                    <?php 
                                        $options = array(
                                            'Europea',
                                            'Americana',
                                            'Nacional'
                                        );
                                    ?>
                                    <?php foreach($options as $opt): ?>
                                        <?php echo "<option value=\"$opt\" " . ($opt == $row['pushcart'] ? 'selected' : ''  ) . ">$opt</option>"; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-1">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('lectern'); ?></label>
                            <div class="col-sm-12">
                                <input type="checkbox" name="lectern" class="form-control" value="1" <?php echo ( $row['lectern'] == true ? 'checked' : ''  ); ?>>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-1">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('curtain'); ?></label>
                            <div class="col-sm-12">
                                <input type="checkbox" name="curtain" class="form-control" value="1" <?php echo ( $row['curtain'] == true ? 'checked' : ''  ); ?>>
                            </div>
                        </div>
                    </div>
                    <!-- col -->                    
                </div>
                <!-- tenth row -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('observations'); ?></label>
                            <div class="col-sm-12">
                                <textarea class="form-control" name="transfer_observations" rows="3"><?php echo $row['transfer_observations']?></textarea>
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
                                <input type="text" class="form-control datepicker" name="funeral_date"  value="<?php echo htmlentities( $row['funeral_date'] ); ?>" />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('hour'); ?></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="funeral_time" value="<?php echo htmlentities( $row['funeral_time'] ); ?>" />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('church'); ?></label>
                            <div class="col-sm-12">
                                <select class="selectboxit" name="church" data-select-add-custom>
                                    <?php 
                                        $options = array(
                                            'Tibás',
                                            'Colima',
                                            'Cinco Esquinas',
                                            'Llorente',
                                            'Sta Mónica',
                                            'Santo Domingo',
                                            'Santo Thomas',
                                            'Santa Rosa',
                                            'San Miguel',
                                            'San Luis',
                                            'Moravia',
                                            'Guadalupe',
                                            'Hatillo Centro',
                                            'Calle Blancos',
                                            'Alajuelita',
                                            'Pavas Sta Barbara',
                                            'Pavas Maria Reina',
                                            'Escazú',
                                            'Desamparados',
                                            'Paso Ancho'
                                        );
                                        $optSelected = false;
                                    ?>
                                    <?php for($i = 0, $l = count($options) - 1; $i < $l; $i++ ): ?>
                                    <?php 
                                        if( $options[$i] == $row['church']  )  {
                                            $optSelected = true;
                                            echo "<option value=\"" . $row['church'] . "\" selected >" . $row['church'] . "</option>";
                                        }
                                        else{
                                            echo "<option value=\"" . $options[$i] . "\" >" . $options[$i] . "</option>";
                                        }                                         
                                    ?>
                                    <?php endfor; ?>
                                    <?php 
                                        if( !$optSelected ){
                                            echo "<option data-custom value=\"" . $row['church'] . "\" selected >" . $row['church'] . "</option>";
                                        }
                                    ?>
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
                                    <?php 
                                        $options = array(
                                            'Tibás',
                                            'Moravia',
                                            'Guadalupe',
                                            'Santo Domingo',
                                            'Jardines del Recuerdo',
                                            'Desamparados',
                                            'Bosques de Paz',
                                            'Obrero',
                                            'Alajuelita',
                                            'Pavas',
                                            'Metropolitano',
                                            'Escazú',
                                            'Calvo',
                                            'Piedad Heredia',
                                            'Piedad Desamparados',
                                            'Piedad Sto Domingo',
                                            'Piedad Moravia',
                                            'Piedad Sto Thomas',
                                            'Piedad Escazú',
                                            'Cartago'
                                        );
                                        $optSelected = false;
                                    ?>
                                    <?php for($i = 0, $l = count($options) - 1; $i < $l; $i++ ): ?>
                                    <?php 
                                        if( $options[$i] == $row['cemetery']  )  {
                                            $optSelected = true;
                                            echo "<option value=\"" . $row['cemetery'] . "\" selected >" . $row['cemetery'] . "</option>";
                                        }
                                        else{
                                            echo "<option value=\"" . $options[$i] . "\" >" . $options[$i] . "</option>";
                                        }                                         
                                    ?>
                                    <?php endfor; ?>
                                    <?php 
                                        if( !$optSelected ){
                                            echo "<option data-custom value=\"" . $row['cemetery'] . "\" selected >" . $row['cemetery'] . "</option>";
                                        }
                                    ?>
                                    <option value="Otro" data-other>Otro</option>
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
                                <select class="selectboxit" name="service_float" data-select-add-custom>
                                    <?php 
                                        $options = array(
                                            'Toyota',
                                            'Hyundai',
                                            'Buick',
                                            'Mercedes Shalom',
                                            'Mercedes Merced'
                                        );
                                        $optSelected = false;
                                    ?>
                                    <?php for($i = 0, $l = count($options) - 1; $i < $l; $i++ ): ?>
                                    <?php 
                                        if( $options[$i] == $row['service_float']  )  {
                                            $optSelected = true;
                                            echo "<option value=\"" . $row['service_float'] . "\" selected >" . $row['service_float'] . "</option>";
                                        }
                                        else{
                                            echo "<option value=\"" . $options[$i] . "\" >" . $options[$i] . "</option>";
                                        }                                         
                                    ?>
                                    <?php endfor; ?>
                                    <?php 
                                        if( !$optSelected ){
                                            echo "<option data-custom value=\"" . $row['service_float'] . "\" selected >" . $row['service_float'] . "</option>";
                                        }
                                    ?>
                                    <option value="Otro" data-other>Otro</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="service_driver" placeholder="<?php echo lang_key('driver');  ?>" value="<?php echo htmlentities( $row['service_driver'] ); ?>" >
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('decoration'); ?></label>
                            <div class="col-sm-6">
                                <select class="selectboxit" name="decoration_float" data-select-add-custom>
                                    <?php 
                                        $options = array(
                                            'Toyota',
                                            'Hyundai',
                                            'Buick',
                                            'Mercedes Shalom',
                                            'Mercedes Merced'
                                        );
                                        $optSelected = false;
                                    ?>
                                    <?php for($i = 0, $l = count($options) - 1; $i < $l; $i++ ): ?>
                                    <?php 
                                        if( $options[$i] == $row['decoration_float']  )  {
                                            $optSelected = true;
                                            echo "<option value=\"" . $row['decoration_float'] . "\" selected >" . $row['decoration_float'] . "</option>";
                                        }
                                        else{
                                            echo "<option value=\"" . $options[$i] . "\" >" . $options[$i] . "</option>";
                                        }                                         
                                    ?>
                                    <?php endfor; ?>
                                    <?php 
                                        if( !$optSelected ){
                                            echo "<option data-custom value=\"" . $row['decoration_float'] . "\" selected >" . $row['decoration_float'] . "</option>";
                                        }
                                    ?>
                                    <option value="Otro" data-other>Otro</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="decoration_driver" placeholder="<?php echo lang_key('driver');  ?>"  value="<?php echo htmlentities( $row['decoration_driver'] ); ?>" >
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
                                <textarea class="form-control" name="service_observations"  rows="5" ><?php echo htmlentities( $row['service_observations'] ); ?></textarea>
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
                                <input type="text" class="form-control " name="amount" required value="<?php echo htmlentities( $row['amount'] ); ?>" />
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
                                <input type="text" class="form-control " name=""  />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">Valor</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control " name=""  />
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
                                Aplicar Contrato 1
                            </label>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">Número</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control " name=""  />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">Valor</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control " name=""  />
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
                                Aplicar Contrato 1
                            </label>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">Número</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control " name=""  />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">Valor</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control " name=""  />
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
                            <label for="field-1" class="control-label col-sm-12">Prima</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control " name=""  />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">Saldo total</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control " name=""  />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-1">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">Contado</label>
                            <div class="col-sm-12">
                                <input type="checkbox" name="" class="form-control" value="1">
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-1">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">Crédito</label>
                            <div class="col-sm-12">
                                <input type="checkbox" name="" class="form-control" value="1">
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-sm-12">
                        <p style="margin: 15px 0;">Historial de pagos en servicio de contado</p>
                        <table style="width: 100%;height: 60px;border: 1px solid grey;border-collapse: unset;margin: 15px 0;"></table>
                    </div>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">Monto del crédito</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control " name=""  />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">Plazo</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control " name=""  />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">Intereses</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control " name=""  />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">Cuota Mensual</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control " name=""  />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                </div>
                <!-- row -->

                <div class="row">
                    <div class="col-sm-12">
                        <p style="margin: 15px 0;">Historial de pagos en servicio de crédito</p>
                        <table style="width: 100%;height: 60px;border: 1px solid grey;border-collapse: unset;margin: 15px 0;"></table>
                    </div>
                </div>
                <!-- row -->

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">Saldo a financiar de contratos</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control " name=""  />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">Cuota Mensual</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control " name=""  />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-sm-12">
                        <p style="margin: 15px 0;">Historial de pagos en servicio de contrato</p>
                        <table style="width: 100%;height: 60px;border: 1px solid grey;border-collapse: unset;margin: 15px 0;"></table>
                    </div>
                </div>
                <!-- row -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-sm-12 txt-right">
                                <button type="submit" class="btn btn-info" id="submit-button">
                                    <?php echo lang_key('submit'); ?>
                                </button>
                                 <button type="submit" class="btn btn-info" id="transfer-button">
                                    Traslado
                                </button>
                                 <button type="submit" class="btn btn-info" id="print-button">
                                    Imprimir
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
    })();
</script>

<?php endif; ?>