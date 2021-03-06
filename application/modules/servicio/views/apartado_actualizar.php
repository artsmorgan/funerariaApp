<?php 

$sql = "select c.*, cn.* from bk_apartados c inner join bk_contact cn on c.contact_id = cn.contact_id where id = ?";
// echo $param3;
$row = $this->db->query( $sql, array( $param3 ) )->row_array();
// echo '<pre>';
// print_r($row);
// echo '</pre>';
$sql_account = "select * from bk_apartados_account where contract_number = ?";
$acc = $this->db->query( $sql_account, array( $param3 ) )->row_array();

function checked_input($input){
    return ($input==1) ? "checked" : "";
}

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

                <?php echo form_open(site_url('servicio/servicios/updateApartado' ), array('class' => 'services form-horizontal form-groups-bordered form-fun validate', 'enctype' => 'multipart/form-data')); ?>

                <!-- <h3>Información Personal</h3> -->

                <input type="hidden" name="type" value="<?php echo $param3;  ?>">

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('identification_card'); ?></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control col-sm-12" name="client_id_card" value="<?php echo htmlentities( $row['id_card'] ); ?>" />
                                <input type="hidden" id="contact_id" name="contact_id"  value="<?php echo htmlentities( $row['contact_id'] ); ?>"  />
                                <input type="hidden" id="contact_id" name="service_id"  value="<?php echo htmlentities( $row['id'] ); ?>"  />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('first_name'); ?></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="client_first_name" value="<?php echo htmlentities( $row['first_name'] ); ?>" />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">Primer apellido</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="client_last_name"  value="<?php echo htmlentities( $row['last_name'] ); ?>"/>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">Segundo apellido</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="client_last_name2"  value="<?php echo htmlentities( $row['last_name2'] ); ?>"/>
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
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('email'); ?></label>
                            <div class="col-sm-12">
                                <input type="email" class="form-control" name="client_email" disabled value="<?php echo htmlentities( $row['email'] ); ?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('agent'); ?></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="seller" disabled />
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
          
              
              <!-- cremacion, autopsia, tecnico, costo, urna -->
              <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">Cremación</label>
                            <div class="col-sm-12">
                                <input type="checkbox" class="form-control" name="cremacion"  <?php echo checked_input( $row['cremacion'] ); ?> />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label">Autopsia</label>
                            <div class="col-sm-12">
                                <input type="checkbox"  class="form-control" name="autopsia" <?php echo checked_input( $row['autopsia'] ); ?>>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label">Técnico</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="tecnico" value="<?php echo $row['tecnico']; ?> ">
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label">Costo</label>
                            <div class="col-sm-12">
                                
                                <input type="text"  class="form-control format-currency" value="<?php echo htmlentities( $row['costo'] ); ?>">
                                <input type="hidden"   name="costo" value="<?php echo htmlentities( $row['costo'] ); ?>">
                            </div>
                        </div>
                    </div>
                     <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label">Urna</label>
                            <div class="col-sm-12">
                                <select class="selectboxit" name="urna" data-select-add-custom>
                                    <?php echo "<option selected >" . $row['urna'] . "</option>"; ?> 
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


                <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-1" class="control-label col-sm-12">Preservación</label>
                                <div class="col-sm-12">
                                    <input type="checkbox" class="form-control" name="preservacion"<?php echo checked_input( $row['preservacion'] ); ?> />
                                </div>
                            </div>
                        </div>
                        <!-- col -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-1" class="col-sm-12 control-label">Monto</label>
                                <div class="col-sm-12">
                                    <input type="text"  class="form-control format-currency" value="<?php echo htmlentities( $row['monto'] ); ?>">
                                    <input type="hidden"   name="monto" value="<?php echo htmlentities( $row['monto'] ); ?>">
                                </div>
                            </div>
                        </div>
                       
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                                <label for="field-1" class="control-label col-sm-12">Monto Total del funeral</label>
                                <div class="col-sm-12">
                                    <input type="text"  class="form-control format-currency" value="<?php echo htmlentities( $row['costo_total'] ); ?>" required>
                                    <input type="hidden"  name="costo_total"  value="<?php echo htmlentities( $row['costo_total'] ); ?>"/>
                                </div>
                            </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                                <label for="field-1" class="control-label col-sm-12">Monto Inicial</label>
                                <div class="col-sm-12">
                                    <input type="text"  class="form-control format-currency" value="<?php echo htmlentities( $row['abono'] ); ?>">
                                    <input type="hidden" name="abono"  value="<?php echo htmlentities( $row['abono'] ); ?>"/>
                                </div>
                            </div>
                    </div>
                </div>

                <br><br>
                
                <!-- eleventh row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('observations'); ?></label>
                            <div class="col-sm-12">
                                <textarea class="form-control" name="observaciones"  rows="1" ><?php echo htmlentities( $row['observaciones'] ); ?></textarea>
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

     $('.format-currency').formatCurrency({
        symbol: '₡ '
    });

    $('[name=amount],[name=tiempo_contrato]').on('input', function(e){
        // calcularSaldo();
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

<?php endif; ?>