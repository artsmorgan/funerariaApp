<?php 
$sql = "SELECT s.*, 
c.contact_id AS client_id, CONCAT( c.first_name, c.last_name) AS client_name, c.id_card AS client_id_card, c.email AS client_email, c.phone AS client_phone, c.phone2 AS client_phone2, c.phone3 AS client_phone3, 
u.user_id AS seller_id, CONCAT( u.first_name, u.last_name ) AS seller_name
FROM bk_service AS s 
INNER JOIN bk_contact AS c ON c.contact_id = s.contact_id 
INNER JOIN bk_user AS u ON s.user_id = u.user_id 
WHERE s.service_id = ?";

$row = $this->db->query( $sql, array( $service_id ) )->row_array();

?>
<?php if(  !empty($row) ) : ?>
<hr style="margin-bottom: 0px;">
<ol class="breadcrumb bc-3 pull-right" style="margin-bottom: 0px;">
    <li><a href="<?php echo base_url(); ?>"><?php echo lang_key('home'); ?></a></li>
    <li><a href="<?php echo site_url('servicio/servicios/' . $row['type']); ?>"><?php echo 'Servicios ' . $row['type']; ?></a></li>
    <li class="active"><?php echo lang_key('details'); ?></li>
</ol>

<div class="row">

    <div class="col-md-12">

        <ul class="nav nav-tabs">
            <li class="<?php if($active_tab == 'summary') echo 'active'; ?>">
                <a href="#summary" data-toggle="tab">
                    <span class="visible-xs"><i class="entypo-home"></i></span>
                    <span class="hidden-xs"><?php echo lang_key('summary');?></span>
                </a>
            </li>
        </ul>
        
        <div class="tab-content">
            
            <div class="tab-pane <?php if($active_tab == 'summary') echo 'active'; ?>" id="summary">
                <br>
                    <div class="profile-env">
                        
                        <section class="profile-info-tabs services">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-primary" data-collapsed="0">
                                        <div class="panel-body">


                                            <h3>Información Personal</h3>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('date'); ?></label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control datepicker" name="death_date" disabled value="<?php echo $row['death_date']; ?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- col -->
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('death_document'); ?></label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" name="death_document"  disabled value="<?php echo $row['death_document']; ?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- col -->
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="field-1" class="control-label col-sm-12" ><?php echo lang_key('seller'); ?></label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="seller"  disabled value="<?php echo $row['seller_name']; ?>" />
                                                            <input type="hidden" id="seller_id" name="seller_id"  value="<?php echo $row['seller_id']; ?>" />
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
                                                            <input type="text" class="form-control" name="deceased_name" disabled value="<?php echo $row['deceased_name']; ?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- col -->
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('identification_card'); ?></label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" name="deceased_id_card"  disabled value="<?php echo $row['deceased_id_card']; ?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- col -->
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('age'); ?></label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" name="deceased_age" disabled value="<?php echo $row['deceased_age']; ?>" />
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
                                                            <input type="text" class="form-control client" id="client_name" disabled value="<?php echo $row['client_name']; ?>" />
                                                            <input type="hidden" id="client_id" name="client_id"  value="<?php echo $row['client_id']; ?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- col -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('phone'); ?></label>
                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control client" id="client_phone" disabled value="<?php echo $row['client_phone']; ?>"  />
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control client" id="client_phone2" disabled value="<?php echo $row['client_phone2']; ?>"  />
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control client" id="client_phone3"  disabled value="<?php echo $row['client_phone3']; ?>" />
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
                                                            <input type="email" class="form-control client" id="client_email"  disabled value="<?php echo $row['client_email']; ?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- col -->
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('identification_card'); ?></label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control client" id="client_id_card" disabled value="<?php echo $row['client_id_card']; ?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- col -->
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('relationship'); ?></label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control col-sm-12" name="relationship" disabled value="<?php echo $row['relationship']; ?>" />
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
                                                            <select class="selectboxit" disabled name="payment_method">
                                                                <?php echo "<option value=\"" . $row['payment_method'] . "\" selected>" .  $row['payment_method'] . "</option>"; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- col -->
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('contract_id'); ?></label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" name="contract_id"  disabled value="<?php echo $row['contract_id']; ?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- col -->
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('amount_'); ?></label>
                                                        <div class="col-sm-12">
                                                            <input type="number" name="amount" class="form-control" disabled value="<?php echo $row['amount']; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- col -->
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('balance_'); ?></label>
                                                        <div class="col-sm-12">
                                                            <input type="number" name="balance" class="form-control" disabled value="<?php echo $row['balance']; ?>">
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
                                                            <select class="selectboxit" disabled name="coffin" data-select-add-custom>
                                                                <?php echo "<option value=\"" . $row['coffin'] . "\" selected>" .  $row['coffin'] . "</option>"; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- col -->
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('bill'); ?></label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" name="bill" disabled value="<?php echo $row['bill']; ?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- col -->
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('veiling_room'); ?></label>
                                                        <div class="col-sm-12">
                                                            <input type="checkbox" name="veiling_room" class="form-control" disabled value="1" <?php echo ( $row['veiling_room']  ? 'checked' : ''  ); ?>>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- col -->
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('transfers'); ?></label>
                                                        <div class="col-sm-12">
                                                            <input type="checkbox" name="transfers" class="form-control" disabled value="1" <?php echo ( $row['transfers'] == true ? 'checked' : ''  ); ?>>
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
                                                            <select class="selectboxit" disabled name="forgetfulness">
                                                                <?php echo "<option value=\"" . $row['forgetfulness'] . "\" selected>" .  $row['forgetfulness'] . "</option>"; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- col -->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="field-3" class="col-sm-12 control-label"><?php echo lang_key('pathology'); ?></label>
                                                        <div class="col-sm-3">
                                                            <input type="checkbox" name="pathology" class="form-control" disabled value="1" <?php echo ( $row['pathology'] == true ? 'checked' : ''  ); ?>>
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="technician" class="form-control" placeholder="<?php echo lang_key('technician'); ?>" disabled value="<?php echo $row['technician']; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- col -->
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('flowers'); ?></label>
                                                        <div class="col-sm-12">
                                                            <select class="selectboxit" disabled name="flowers">
                                                                <?php echo "<option value=\"" . $row['flowers'] . "\" selected>" .  $row['flowers'] . "</option>"; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- col -->
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('cremation'); ?></label>
                                                        <div class="col-sm-12">
                                                            <input type="checkbox" name="cremation" class="form-control" disabled value="1" <?php echo ( $row['cremation'] == true ? 'checked' : ''  ); ?>>
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
                                                                    <select class="selectboxit" disabled name="morgue">
                                                                        <?php echo "<option value=\"" . $row['morgue'] . "\" selected>" .  $row['morgue'] . "</option>"; ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <!-- form-group -->
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('veiling_site'); ?></label>
                                                                <div class="col-sm-12">
                                                                    <select class="selectboxit" disabled name="veiling_site" data-select-add-custom>
                                                                        <?php echo "<option value=\"" . $row['veiling_site'] . "\" selected>" .  $row['veiling_site'] . "</option>"; ?>
                                                                        
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
                                                            <textarea disabled name="transfer_address" class="form-control" rows="5"><?php echo $row['transfer_address']; ?></textarea>
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
                                                                    <input type="checkbox" name="driver" class="form-control" disabled value="1" <?php echo ( $row['driver'] == true ? 'checked' : ''  ); ?>>
                                                                </div>
                                                            </div>
                                                            <!-- form-group -->
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('float'); ?></label>
                                                                <div class="col-sm-12">
                                                                    <input type="checkbox" name="float" class="form-control" disabled value="1" <?php echo ( $row['driver'] == true ? 'checked' : ''  ); ?>>
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
                                                            <input type="text" class="form-control" name="transfer_hour" disabled value="<?php echo $row['transfer_hour']; ?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- col -->
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('vault_coffin'); ?></label>
                                                        <div class="col-sm-12">
                                                            <select class="selectboxit" disabled name="vault_coffin">
                                                                <?php echo "<option value=\"" . $row['vault_coffin'] . "\" selected>" .  $row['vault_coffin'] . "</option>"; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- col -->
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('candlestick'); ?></label>
                                                        <div class="col-sm-12">
                                                            <select class="selectboxit" disabled name="candlestick">
                                                                <?php echo "<option value=\"" . $row['candlestick'] . "\" selected>" .  $row['candlestick'] . "</option>"; ?>
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- col -->
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('pushcart'); ?></label>
                                                        <div class="col-sm-12">
                                                            <select class="selectboxit" disabled name="pushcart">
                                                                <?php echo "<option value=\"" . $row['pushcart'] . "\" selected>" .  $row['pushcart'] . "</option>"; ?>
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- col -->
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('curtain'); ?></label>
                                                        <div class="col-sm-12">
                                                            <input type="checkbox" name="curtain" class="form-control" disabled value="1" <?php echo ( $row['curtain'] == true ? 'checked' : ''  ); ?>>
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
                                                            <textarea  disabled class="form-control" name="transfer_observations" rows="5"><?php echo $row['transfer_observations']?></textarea>
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
                                                                    <select class="selectboxit" disabled name="arrangements">
                                                                        <?php echo "<option value=\"" . $row['arrangements'] . "\" selected>" .  $row['arrangements'] . "</option>"; ?>
                                                                        
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- col -->
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('pedestal'); ?></label>
                                                                <div class="col-sm-12">
                                                                    <select class="selectboxit" disabled name="pedestal">
                                                                        <?php echo "<option value=\"" . $row['pedestal'] . "\" selected>" .  $row['pedestal'] . "</option>"; ?>
                                                                        
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- col -->
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('lectern'); ?></label>
                                                                <div class="col-sm-12">
                                                                    <input type="checkbox" name="lectern" class="form-control" disabled value="1" <?php echo ( $row['lectern'] == true ? 'checked' : ''  ); ?>>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- col -->
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('carpet'); ?></label>
                                                                <div class="col-sm-12">
                                                                    <input type="checkbox" name="carpet" class="form-control" disabled value="1" <?php echo ( $row['carpet'] == true ? 'checked' : ''  ); ?>>
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
                                                            <input type="text" class="form-control datepicker" name="service_date" disabled value="<?php echo $row['service_date']; ?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- col -->
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('hour'); ?></label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" name="service_hour"  disabled value="<?php echo $row['service_hour']; ?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- col -->
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('church'); ?></label>
                                                        <div class="col-sm-12">
                                                            <select class="selectboxit" disabled name="church" data-select-add-custom>
                                                                <?php echo "<option value=\"" . $row['church'] . "\" selected>" .  $row['church'] . "</option>"; ?>
                                                                
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
                                                            <select class="selectboxit" disabled name="cemetery" data-select-add-custom>
                                                                <?php echo "<option value=\"" . $row['cemetery'] . "\" selected>" .  $row['cemetery'] . "</option>"; ?>
                                                                
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
                                                                    <select class="selectboxit" disabled name="service_float" data-select-add-custom>
                                                                        <?php echo "<option value=\"" . $row['service_float'] . "\" selected>" .  $row['service_float'] . "</option>"; ?>
                                                                        
                                                                    </select>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <input type="text" class="form-control" name="service_driver" placeholder="<?php echo lang_key('driver');  ?>" disabled value="<?php echo $row['service_driver']; ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- col -->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('decoration'); ?></label>
                                                                <div class="col-sm-6">
                                                                    <select class="selectboxit" disabled name="decoration_float" data-select-add-custom>
                                                                        <?php echo "<option value=\"" . $row['decoration_float'] . "\" selected>" .  $row['decoration_float'] . "</option>"; ?>
                                                                        
                                                                    </select>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <input type="text" class="form-control" name="decoration_driver" placeholder="<?php echo lang_key('driver');  ?>" disabled value="<?php echo $row['decoration_driver']; ?>">
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
                                                            <textarea disabled class="form-control" name="service_observations"  rows="5" ><?php echo $row['service_observations']; ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- col -->
                                            </div>
                                            <!-- eleventh row -->

                                        </div>
                                    </div>
                                </div>
                            </div>    
                        </section>
                        
                    </div>

            </div>
            
        </div>

    </div>

</div>

<!-----  DATA TABLE EXPORT CONFIGURATIONS ---->                      
<script type="text/javascript">

    jQuery(document).ready(function($)
    {
        var datatable = $("#table_export").dataTable({
            "sPaginationType"   : "bootstrap"
        });

        $(".dataTables_wrapper select").select2({
            minimumResultsForSearch: -1
        });
    });
		
</script>

<?php endif; ?>