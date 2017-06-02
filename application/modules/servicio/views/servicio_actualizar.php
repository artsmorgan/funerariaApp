<?php 
$sql = "SELECT s.*, 
c.contact_id AS client_id, CONCAT( c.first_name, c.last_name) AS client_name, c.id_card AS client_id_card, c.email AS client_email, c.phone AS client_phone, c.phone2 AS client_phone2, c.phone3 AS client_phone3, 
u.user_id AS seller_id, CONCAT( u.first_name, ' ', u.last_name ) AS seller_name
FROM bk_service AS s 
INNER JOIN bk_contact AS c ON c.contact_id = s.contact_id 
INNER JOIN bk_user AS u ON s.user_id = u.user_id 
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
                    <?php echo lang_key('edit_service'); ?> 
                </div>
            </div>
            
            <div class="panel-body">

                <?php echo form_open(site_url('servicio/servicios/update/' . $param3 ), array('class' => 'services form-horizontal form-groups-bordered form-fun validate', 'enctype' => 'multipart/form-data')); ?>

                <h3>Información Personal</h3>

                <input type="hidden" name="type" value="<?php echo $param4;  ?>">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('date'); ?></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control datepicker" name="death_date" value="<?php echo $row['death_date']; ?>" />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('death_document'); ?></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="death_document"  value="<?php echo $row['death_document']; ?>" />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12" ><?php echo lang_key('seller'); ?></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="seller"  value="<?php echo $row['seller_name']; ?>" />
                                <input type="hidden" id="seller_id" name="seller_id" value="<?php echo $row['seller_id']; ?>" />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                </div>
                <!-- first row -->

                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('deceased'); ?> nombre</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="deceased_first_name" value="<?php echo $row['deceased_first_name']; ?>" />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">Primer apellido</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="deceased_last_name1" value="<?php echo $row['deceased_last_name1']; ?>" />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">Segundo apellido</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="deceased_last_name2" value="<?php echo $row['deceased_last_name2']; ?>" />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('identification_card'); ?></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="deceased_id_card"  value="<?php echo $row['deceased_id_card']; ?>"/>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('age'); ?></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="deceased_age" value="<?php echo $row['deceased_age']; ?>" />
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
                                <input type="text" class="form-control client" id="client_name" value="<?php echo $row['client_name']; ?>" />
                                <input type="hidden" id="client_id" name="client_id" value="<?php echo $row['client_id']; ?>" />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('phone'); ?></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control client" id="client_phone" value="<?php echo $row['client_phone']; ?>"  />
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control client" id="client_phone2" value="<?php echo $row['client_phone2']; ?>"  />
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control client" id="client_phone3"  value="<?php echo $row['client_phone3']; ?>" />
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
                                <input type="email" class="form-control client" id="client_email"  value="<?php echo $row['client_email']; ?>"/>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('identification_card'); ?></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control client" id="client_id_card" value="<?php echo $row['client_id_card']; ?>" />
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
                </div>
                <!-- fourth row -->

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('payment_method'); ?></label>
                            <div class="col-sm-12">
                                <select class="selectboxit" name="payment_method">
                                    <?php 
                                        $options = array(
                                            'Contado',
                                            'Contrato',
                                            'Funecrédito',
                                            'Contrato - Funecrédito',
                                            'Contrato -Contado');
                                    ?>
                                    <?php foreach($options as $opt): ?>
                                        <?php echo "<option value=\"$opt\" " . ($opt == $row['payment_method'] ? 'selected' : ''  ) . ">$opt</option>"; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('contract_id'); ?></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="contract_id"  value="<?php echo $row['contract_id']; ?>" />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label">Monto del contrato</label>
                            <div class="col-sm-12">
                                <input type="text"  class="form-control format-currency" value="<?php echo $row['amount']; ?>">
                                <input type="hidden" name="amount" value="<?php echo $row['amount']; ?>">
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('balance_'); ?></label>
                            <div class="col-sm-12">
                                <input type="text"  class="form-control format-currency" value="<?php echo $row['balance']; ?>">
                                <input type="hidden" name="balance" value="<?php echo $row['balance']; ?>">
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
                                            'Eco',
                                            'Otro'
                                        );
                                        $optSelected = false;
                                    ?>
                                    <?php for($i = 0, $l = count($options) - 1; $i < $l; $i++ ): ?>
                                        <?php 
                                            if( ( !$optSelected && $i == $l  - 1) || $options[$i] == $row['coffin']  )  {
                                                $optSelected = true;
                                                echo "<option value=\"" . $row['coffin'] . "\" selected >" . $row['coffin'] . "</option>";
                                            }
                                            else{
                                                echo "<option value=\"" . $options[$i] . "\" >" . $options[$i] . "</option>";
                                            }                                         
                                         ?>
                                    <?php endfor; ?>
                                    <?php echo "<option data-other value=\"" . $options[$l] . "\" >" . $options[$l] . "</option>"; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('bill'); ?></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="bill" value="<?php echo $row['bill']; ?>" />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('veiling_room'); ?></label>
                            <div class="col-sm-12">
                                <input type="checkbox" name="veiling_room" class="form-control" value="1" <?php echo ( $row['veiling_room']  ? 'checked' : ''  ); ?>>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('transfers'); ?></label>
                            <div class="col-sm-12">
                                <input type="checkbox" name="transfers" class="form-control" value="1" <?php echo ( $row['transfers'] == true ? 'checked' : ''  ); ?>>
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
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-3" class="col-sm-12 control-label"><?php echo lang_key('pathology'); ?></label>
                            <div class="col-sm-3">
                                <input type="checkbox" name="pathology" class="form-control" value="1" <?php echo ( $row['pathology'] == true ? 'checked' : ''  ); ?>>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="technician" class="form-control" placeholder="<?php echo lang_key('technician'); ?>" value="<?php echo $row['technician']; ?>">
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
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
                            <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('cremation'); ?></label>
                            <div class="col-sm-12">
                                <input type="checkbox" name="cremation" class="form-control" value="1" <?php echo ( $row['cremation'] == true ? 'checked' : ''  ); ?>>
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
                                            ?>
                                            <?php foreach($options as $opt): ?>
                                                <?php echo "<option value=\"$opt\" " . ($opt == $row['morgue'] ? 'selected' : ''  ) . ">$opt</option>"; ?>
                                            <?php endforeach; ?>
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
                                                if( ( !$optSelected && $i == $l  - 1) || $options[$i] == $row['veiling_site']  )  {
                                                    $optSelected = true;
                                                    echo "<option value=\"" . $row['veiling_site'] . "\" selected >" . $row['veiling_site'] . "</option>";
                                                }
                                                else{
                                                    echo "<option value=\"" . $options[$i] . "\" >" . $options[$i] . "</option>";
                                                }                                         
                                            ?>
                                        <?php endfor; ?>
                                        <?php echo "<option data-other value=\"" . $options[$l] . "\" >" . $options[$l] . "</option>"; ?>
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
                                <textarea name="transfer_address" class="form-control" rows="5"><?php echo $row['transfer_address']; ?></textarea>
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
                                        <input type="checkbox" name="driver" class="form-control" value="1" <?php echo ( $row['driver'] == true ? 'checked' : ''  ); ?>>
                                    </div>
                                </div>
                                <!-- form-group -->
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('float'); ?></label>
                                    <div class="col-sm-12">
                                        <input type="checkbox" name="float" class="form-control" value="1" <?php echo ( $row['driver'] == true ? 'checked' : ''  ); ?>>
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
                                <input type="text" class="form-control" name="transfer_hour" value="<?php echo $row['transfer_hour']; ?>" />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
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
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('curtain'); ?></label>
                            <div class="col-sm-12">
                                <input type="checkbox" name="curtain" class="form-control" value="1" <?php echo ( $row['curtain'] == true ? 'checked' : ''  ); ?>>
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
                                <textarea class="form-control" name="transfer_observations" rows="5"><?php echo $row['transfer_observations']?></textarea>
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
                                            <?php 
                                                $options = array(
                                                    '1',
                                                    '2',
                                                    '3'
                                                );
                                            ?>
                                            <?php foreach($options as $opt): ?>
                                                <?php echo "<option value=\"$opt\" " . ($opt == $row['arrangements'] ? 'selected' : ''  ) . ">$opt</option>"; ?>
                                            <?php endforeach; ?>
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
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('lectern'); ?></label>
                                    <div class="col-sm-12">
                                        <input type="checkbox" name="lectern" class="form-control" value="1" <?php echo ( $row['lectern'] == true ? 'checked' : ''  ); ?>>
                                    </div>
                                </div>
                            </div>
                            <!-- col -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('carpet'); ?></label>
                                    <div class="col-sm-12">
                                        <input type="checkbox" name="carpet" class="form-control" value="1" <?php echo ( $row['carpet'] == true ? 'checked' : ''  ); ?>>
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
                                <input type="text" class="form-control datepicker" name="service_date" value="<?php echo $row['service_date']; ?>" />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('hour'); ?></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="service_hour"  value="<?php echo $row['service_hour']; ?>"/>
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
                                                'Paso Ancho',
                                                'Otro'
                                            );
                                            $optSelected = false;
                                    ?>
                                    <?php for($i = 0, $l = count($options) - 1; $i < $l; $i++ ): ?>
                                        <?php 
                                            if( ( !$optSelected && $i == $l  - 1) || $options[$i] == $row['church']  )  {
                                                $optSelected = true;
                                                echo "<option value=\"" . $row['church'] . "\" selected >" . $row['church'] . "</option>";
                                            }
                                            else{
                                                echo "<option value=\"" . $options[$i] . "\" >" . $options[$i] . "</option>";
                                            }                                         
                                        ?>
                                    <?php endfor; ?>
                                    <?php echo "<option data-other value=\"" . $options[$l] . "\" >" . $options[$l] . "</option>"; ?>
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
                                                'Cartago',
                                                'Otros'
                                            );
                                            $optSelected = false;
                                    ?>
                                    <?php for($i = 0, $l = count($options) - 1; $i < $l; $i++ ): ?>
                                        <?php 
                                            if( ( !$optSelected && $i == $l  - 1) || $options[$i] == $row['cemetery']  )  {
                                                $optSelected = true;
                                                echo "<option value=\"" . $row['cemetery'] . "\" selected >" . $row['cemetery'] . "</option>";
                                            }
                                            else{
                                                echo "<option value=\"" . $options[$i] . "\" >" . $options[$i] . "</option>";
                                            }                                         
                                        ?>
                                    <?php endfor; ?>
                                    <?php echo "<option data-other value=\"" . $options[$l] . "\" >" . $options[$l] . "</option>"; ?>
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
                                            <?php 
                                                    $options = array(
                                                        'Toyota',
                                                        'Hyundai',
                                                        'Buick',
                                                        'Mercedes Shalom',
                                                        'Mercedes Merced',
                                                        'Otros'
                                                    );
                                                    $optSelected = false;
                                            ?>
                                            <?php for($i = 0, $l = count($options) - 1; $i < $l; $i++ ): ?>
                                                <?php 
                                                    if( ( !$optSelected && $i == $l  - 1) || $options[$i] == $row['service_float']  )  {
                                                        $optSelected = true;
                                                        echo "<option value=\"" . $row['service_float'] . "\" selected >" . $row['service_float'] . "</option>";
                                                    }
                                                    else{
                                                        echo "<option value=\"" . $options[$i] . "\" >" . $options[$i] . "</option>";
                                                    }                                         
                                                ?>
                                            <?php endfor; ?>
                                            <?php echo "<option data-other value=\"" . $options[$l] . "\" >" . $options[$l] . "</option>"; ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="service_driver" placeholder="<?php echo lang_key('driver');  ?>" value="<?php echo $row['service_driver']; ?>">
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
                                                        'Mercedes Merced',
                                                        'Otros'
                                                    );
                                                    $optSelected = false;
                                            ?>
                                            <?php for($i = 0, $l = count($options) - 1; $i < $l; $i++ ): ?>
                                                <?php 
                                                    if( ( !$optSelected && $i == $l  - 1) || $options[$i] == $row['decoration_float']  )  {
                                                        $optSelected = true;
                                                        echo "<option value=\"" . $row['decoration_float'] . "\" selected >" . $row['decoration_float'] . "</option>";
                                                    }
                                                    else{
                                                        echo "<option value=\"" . $options[$i] . "\" >" . $options[$i] . "</option>";
                                                    }                                         
                                                ?>
                                            <?php endfor; ?>
                                            <?php echo "<option data-other value=\"" . $options[$l] . "\" >" . $options[$l] . "</option>"; ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="decoration_driver" placeholder="<?php echo lang_key('driver');  ?>" value="<?php echo $row['decoration_driver']; ?>">
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
                                <textarea class="form-control" name="service_observations"  rows="5" ><?php echo $row['service_observations']; ?></textarea>
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

        $('.format-currency').formatCurrency({
            symbol: '₡ '
        });

        $('.format-currency').on('keypress', function(e){
            
            var str = String.fromCharCode(e.which);

            if( !/\d/.test(str) || str == '.'  ){
                if( str == '.' ){
                    var indexDot = $(this).val().indexOf(str);

                    setCaretPosition($(this).get(0), indexDot + 1 );
                
                }
                return false;
            }
        });

        $('.format-currency').on('input', function(e){
            var inputElem = $(this).get(0),
                inputLength = inputElem.value.length, 
                caretPos = doGetCaretPosition( inputElem ),
                minLength = 6;

            if( inputLength <  minLength){
                inputLength = minLength;
                caretPos += 2;
            }

            inputElem.value = inputElem.value.replace( /\.\d+/ , function(match){
                return match.substr(0,3);
            });

            $(this).formatCurrency({
                symbol: '₡ '
            });

            $(this).parent().find('[type=hidden]').val( $(this).asNumber() );

            inputLength = inputElem.value.length - inputLength;
            caretPos += inputLength;

            if( caretPos > inputElem.value.indexOf('.') ){
                caretPos++;
            }

            setCaretPosition(inputElem, caretPos );

        });

        function setCaretPosition(elem, caretPos) {
            
            if(elem.createTextRange) {
                var range = elem.createTextRange();
                range.move('character', caretPos);
                range.select();
            }
            else {
                if(elem.selectionStart) {
                    elem.focus();
                    elem.setSelectionRange(caretPos, caretPos);
                }
                else
                    elem.focus();
            }
        }

        function doGetCaretPosition (oField) {

            // Initialize
            var iCaretPos = 0;

            // IE Support
            if (document.selection) {

                // Set focus on the element
                oField.focus();

                // To get cursor position, get empty selection range
                var oSel = document.selection.createRange();

                // Move selection start to 0 position
                oSel.moveStart('character', -oField.value.length);

                // The caret position is selection length
                iCaretPos = oSel.text.length;
            }

            // Firefox support
            else if (oField.selectionStart || oField.selectionStart == '0')
                iCaretPos = oField.selectionStart;

            // Return results
            return iCaretPos;
        }
    })();
</script>

<?php endif; ?>