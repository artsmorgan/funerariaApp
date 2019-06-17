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