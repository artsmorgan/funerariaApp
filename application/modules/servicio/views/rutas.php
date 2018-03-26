<?php
    $service_type_opt = $service_type;
    $createBtn = $service_type;
    if($service_type=='funecredito'){
        $createBtn = 'funeral';
        $service_type_opt = 'funecredito';
    }
?>

<?php 
$this->db->order_by('user_id', 'desc');
$userlist = $this->db->get_where('user')->result_array();

$this->db->order_by('contact_id', 'desc');
$clientlist = $this->db->get_where('contact')->result_array();




?>

<?php
    $sql_client = "select c.*, CONCAT( u.first_name, ' ', u.last_name ) AS seller_name FROM bk_contact AS c LEFT JOIN bk_user AS u ON c.user_id = u.user_id";
    $clients_data = $this->db->query( $sql_client )->result_array();
    $script_js_id_card = array();
    $script_js_first_name = array();
    $script_js_last_name = array();
    $script_js_last_name2 = array();
    $script_js_clients = array();

    foreach($clients_data as $client) {
        $script_js_clients[] = $client['contact_id'] . ': { id_card: "' .  $client['id_card'] . '", first_name: "' . $client['first_name'] . '", last_name: "' . $client['last_name'] . '", last_name2:"' . $client['last_name2'] . '", phone: "' . $client['phone'] . '", phone2:"' . $client['phone2'] . '", phone3:"' . $client['phone3'] . '", email:"' . $client['email'] . '", category: "' . $client['category'] .'", seller_name: "' . $client['seller_name'] . '", province: "' . $client['province'] . '", canton: "' . $client['canton'] . '", district: "' . $client['district'] .'", address: "' . $client['address'] . '" }';
        $script_js_id_card[] = '{ id:' . $client['contact_id'] . ', label: "' .  $client['id_card'] . ' - ' . $client['first_name'] . ' ' . $client['last_name']  . ' ' .  $client['last_name2']  .'" ,value: "' . $client['id_card'] . '" }';
        $script_js_first_name[] = '{ id:' . $client['contact_id'] . ', label: "' .$client['first_name'] . ' ' . $client['last_name']  . ' ' .  $client['last_name2'] . '" ,value: "' . $client['first_name'] . '" }';
        $script_js_last_name[] = '{ id:' . $client['contact_id'] . ', label: "' . $client['first_name'] . ' ' . $client['last_name']  . ' ' .  $client['last_name2'] . '" ,value: "' .  $client['last_name'] . '" }';
        $script_js_last_name2[] = '{ id:' . $client['contact_id'] . ', label: "' . $client['first_name'] . ' ' . $client['last_name']  . ' ' .  $client['last_name2'] . '" ,value: "' . $client['last_name2'] . '" }';
    }

    $script_js_clients = "{" . join(',', $script_js_clients) . "}";
    $script_js_search = "{ id_card: [ " . join(',', $script_js_id_card) . "], first_name: [" . join(',', $script_js_first_name) . "], last_name: [" . join(',', $script_js_last_name) . "], last_name2: [" . join(',', $script_js_last_name2) . "] }";
?>

<?php
$sql = "SELECT s.service_id, CONCAT(s.client_first_name, ' ', s.client_last_name1, ' ', s.client_last_name2) AS name, s.client_id_card, s.contract_id FROM bk_service AS s WHERE s.type = ?";
if($service_type=='contrato'){
   $sql = "select 
                c.id,
                c.no_contrato as contract_id, c.id as service_id, c.mes_cobro, c.vendedor, c.ruta,
                CONCAT(cn.first_name, ' ', cn.last_name, ' ', cn.last_name2) AS name , cn.phone, cn.id_card as client_id_card
            from bk_contratos c
            inner join bk_contact cn on c.contact_id = cn.contact_id;";
}
else if($service_type=='apartado'){
    $sql = "select id,
    c.id as contract_id, c.id as service_id, 
    CONCAT(cn.first_name, ' ', cn.last_name, ' ', cn.last_name2) AS name , cn.phone, cn.id_card as client_id_card
    from bk_apartados c
    inner join bk_contact cn on c.contact_id = cn.contact_id;";
}
else if($service_type=='funeral'){
    $sql = "select c.id_funeral as id, c.id_funeral as contract_id, 
    CONCAT(cn.first_name, ' ', cn.last_name, ' ', cn.last_name2) AS name , cn.phone, cn.id_card as client_id_card, CONCAT(c.fallecido_nombre, ' ', c.fallecido_apellido, ' ', c.fallecido_apellido2) AS fallecido
    from bk_funeral c
    inner join bk_contact cn on c.contact_id = cn.contact_id
    where c.funeral_tipo = 'funeral'; ";
}

else if($service_type=='funecredito'){
    $sql = "select c.id_funeral as id, c.id_funeral as contract_id, 
    CONCAT(cn.first_name, ' ', cn.last_name, ' ', cn.last_name2) AS name , cn.phone, cn.id_card as client_id_card, CONCAT(c.fallecido_nombre, ' ', c.fallecido_apellido, ' ', c.fallecido_apellido2) AS fallecido
    from bk_funeral c
    inner join bk_contact cn on c.contact_id = cn.contact_id
    where c.funeral_tipo = 'funecredito'";
}


$services = $this->db->query( $sql, array( $service_type ) )->result_array();

?>
<br><br><br>
<div class="row">
    <div class="col-md-2">
        Seleccionar Ruta
    </div>
    <div class="col-md-2">    
        <select class="selectboxit" style="width: 200px">
                <option>00</option>
        </select>
    </div>
    <div class="col-md-2">    
        <select class="selectboxit" style="width: 200px">
                <option>00</option>
        </select>
    </div>
    <div class="col-md-2">    
        <select class="selectboxit" style="width: 200px">
                <option>00</option>
        </select>
    </div>
    <div class="col-md-1">    
        <a href="#" class="btn btn-primary ">Seleccionar Ruta</a>
    </div>
    
</div>
<br><br><br>
<?php
if(empty($services)){ ?>
    <div class="alert alert-info">
        <?php
        echo 'No se encontraron servicios ' . $service_type;
        ?>
    </div>
<?php } else { ?>

    <table class="table table-bordered responsive datatable" id="table_export">
        <thead>
            <tr>
                <th>#Id</th>
                <th>Contrato</th>
                <th>Nombre</th>
                <th>Cédula</th>
                <?php if($service_type=='funeral'){ ?>
                <th>Nombre Fallecido</th>
                <?php }else { ?>
                <th>Historial de Pagos</th>
                <?php }?>                                
                <th><?php echo lang_key('options'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 1;
            foreach ($services as $row): ?>
                <tr>
                    <td><?php echo $count++ ?></td>
                    <td><?php 
                            if($service_type=='contrato'){
                                echo 'CT-';
                            }else if($service_type=='apartado'){
                                echo 'AP-';
                            }else if($service_type == 'funeral'){
                                echo 'FN-';
                            }
                            echo '000'.$row['contract_id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['client_id_card']; ?></td>
                    <td> 
                        <?php
                            if($service_type=='contrato'){
                                $service_url = site_url('admin/modal/popup/impresion/recibo_dinero_contrato/' . $row['id'] );
                                $view_pays_url = site_url('admin/modal/popup/servicio/list_contratos_payments/' . $row['id'] );
                                $discount_url = site_url('admin/modal/popup/impresion/aplicar_descuento/' . $row['id'] );
                                $adjustment_url = site_url('admin/modal/popup/impresion/aplicar_ajuste/' . $row['id'] );
                            }else if($service_type=='apartado'){
                                $service_url = site_url('admin/modal/popup/impresion/recibo_dinero_apartado/' . $row['id'] );
                                $view_pays_url = site_url('admin/modal/popup/servicio/list_apartados_payments/' . $row['id'] );
                                $discount_url = site_url('admin/modal/popup/impresion/aplicar_descuento/' . $row['id'] );
                                $adjustment_url = site_url('admin/modal/popup/impresion/aplicar_ajuste/' . $row['id'] );
                            }
                            else if($service_type == 'funeral'){
                                echo $row['fallecido'];
                            }
                            //     $service_url = site_url('admin/modal/popup/impresion/recibo_dinero_apartado/' . $row['id'] );
                            //     $view_pays_url = site_url('admin/modal/popup/servicio/list_apartados_payments/' . $row['id'] ); 
                            //      $discount_url = site_url('admin/modal/popup/impresion/aplicar_descuento/' . $row['id'] );
                            //     $adjustment_url = site_url('admin/modal/popup/impresion/aplicar_ajuste/' . $row['id'] );  
                            // }
                        ?>
                        <?php if($service_type != 'funeral'){ ?>
                        <a href="javascript:;" class="btn btn-primary"  onclick="showAjaxModal('<?php echo $view_pays_url ?>')">
                          Ver Transacciones
                        </a>                    
                        <a href="javascript:;" class="btn btn-danger"  onclick="showAjaxModal('<?php echo $service_url ?>')">
                            Realizar Pago
                        </a>
                        <?php } ?>
                    </td>                    
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                <?php echo lang_key('actions') ?> <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-default pull-right" role="menu">

                                <?php  if($service_type == 'apartado'){ ?>
                                    <li>
                                    <a href="javascript:;" 
                                        onclick="showAjaxModal('<?php echo site_url('admin/modal/popup/servicio/funeral_apartado_annadir/funeral?ap=apartado&row='. $row['id']  ); ?>')" 
                                    >
                                       
                                       Hacer Funeral Contado
                                    </a>
                                </li>  
                                <li class="divider"></li>
                                 <li>
                                    <a href="javascript:;" 
                                        onclick="showAjaxModal('<?php echo site_url('admin/modal/popup/servicio/funeral_apartado_annadir/funecredito?ap=apartado&row='. $row['id']  ); ?>')" 
                                    >
                                        
                                       Hacer Funeral Credito
                                    </a>
                                </li>
                                <li class="divider"></li>                                
                                <?php } ?>
                             

                                 <?php if($service_type != 'funeral'){ ?>
                                <li>
                                    <a href="javascript:;" onclick="showAjaxModal('<?php echo $adjustment_url ?>')">
                                        <i class="fa fa-money"></i> 
                                       Ajuste de Precio
                                    </a>
                                </li>
                               
                                <li class="divider"></li>
                                 <li>
                                    <a href="javascript:;" onclick="showAjaxModal('<?php echo $discount_url ?>')">
                                        <i class="fa fa-minus-square"></i> 
                                        Aplicar Descuento
                                    </a>
                                </li>                                
                                <li class="divider"></li>
                                <?php } ?>
                                 <li>
                                    <a href="javascript:;" onclick="showAjaxModal('<?php echo site_url('admin/modal/popup/servicio/'. $service_type  .'_actualizar/' . $row['id'] . '/' . $service_type); ?>');">
                                        <i class="entypo-pencil"></i>
                                       Ver / Editar
                                    </a>
                                </li>
                                <li class="divider"></li>
                                 <?php if($service_type=='funeral'){ ?>
                                    <li>
                                        <a href="#" onclick="showAjaxModal('<?php echo site_url('admin/modal/popup/servicio/funeral_traslado_ver/' . $row['id'] . '/' . $service_type); ?>');">
                                            <i class="fa fa-truck"></i>
                                            Ver Traslado
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                     <li>
                                        <a href="#" onclick="">
                                            <i class="fa fa-print"></i>
                                            Imprimir Contrato
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                <?php } ?>
                                <li>
                                    <?php
                                        if($service_type=='contrato'){
                                            $delete_servicio =site_url('servicio/servicios/deleteContrato/' . $row['contract_id'] );
                                        }else if($service_type=='apartado'){
                                            $delete_servicio =site_url('servicio/servicios/deleteApartado/' . $row['contract_id'] );
                                        }else if($service_type=='funeral'){
                                            $delete_servicio =site_url('servicio/servicios/deleteApartado/' . $row['contract_id'] );
                                        }
                                    ?>

                                    <a href="#" onclick="confirm_modal('<?php echo $delete_servicio; ?>');">
                                        <i class="entypo-trash"></i>
                                        <?php echo lang_key('delete');?>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
<?php } ?>


<div class="modal fade" id="selectAddMore" role="dialog">
    <div class="modal-dialog modal-sm">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Nueva opción</h4>
            </div>
            <div class="modal-body">
                <input type="text" class="form-control">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-close data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-default" data-add-more-to-select data-dismiss="modal">Añadir</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="clienteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Seleccionar cliente</h4>
        </div>
        <div class="modal-body">
        <table id="user-table" class="table table-striped">
            <thead>
            <tr>
                <th>Nombre</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
                <?php for($i = 0; $i < count($clientlist);$i++ ){?>                      
                <tr>
                <td><?php  echo $clientlist[$i]['first_name'].' '. $clientlist[$i]['last_name'];  ?></td>
                <td>
                    <a href="#" class="add-client btn btn-primary" 
                                    data-id="<?php  echo $clientlist[$i]['contact_id']; ?>" 
                                    data-client_first_name="<?php  echo $clientlist[$i]['first_name']; ?>"
                                    data-client_last_name1="<?php  echo $clientlist[$i]['last_name']; ?>"
                                    data-client_last_name2="<?php  echo $clientlist[$i]['last_name2']; ?>"
                                    data-email="<?php  echo $clientlist[$i]['email'];  ?>"
                                    data-id_card="<?php  echo $clientlist[$i]['id_card'];  ?>"
                                    data-phone="<?php  echo $clientlist[$i]['phone'];  ?>"
                                    data-phone2="<?php  echo $clientlist[$i]['phone2'];  ?>"
                                    data-phone3="<?php  echo $clientlist[$i]['phone3'];  ?>">
                    <i class="fa fa-user-plus" aria-hidden="true"></i> Agregar
                    </a>
                </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        </div>             
    </div>
    </div>
</div>

<div class="modal fade" id="vendedoresModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Seleccionar vendedor</h4>
        </div>
        <div class="modal-body">
        <table id="user-table" class="table table-striped">
            <thead>
            <tr>
                <th>Nombre</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
                <?php for($i = 0; $i < count($userlist);$i++ ){?>                      
                <tr>
                <td><?php  echo $userlist[$i]['first_name'].' '. $userlist[$i]['last_name'];  ?></td>
                <td>
                    <a href="#" class="add-vendedor btn btn-primary" 
                                    data-id="<?php  echo $userlist[$i]['user_id']; ?>" 
                                    data-username="<?php  echo $userlist[$i]['first_name'].' '. $userlist[$i]['last_name'];  ?>">
                    <i class="fa fa-user-plus" aria-hidden="true"></i> Agregar
                    </a>
                </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        </div>             
    </div>
    </div>
</div>

<!--  DATA TABLE EXPORT CONFIGURATIONS -->                      
<script type="text/javascript">
    var search_json = <?php echo $script_js_search; ?>;
    var clients = <?php echo $script_js_clients; ?>;

    function showModal(id){
        var zIndex = 1400;
        $(id).modal().css('z-index', zIndex);
        $('.modal-backdrop:last').css('z-index', zIndex - 1);
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

    jQuery(document).ready(function($)
    {
        var site_url = "<?php echo site_url() . '/';?>";
        var datatable = $("#table_export").dataTable({
            "sPaginationType"   : "bootstrap"
        });

        $(".dataTables_wrapper select").select2({
            minimumResultsForSearch: -1
        });

        $('.modal').on('keypress', '.format-currency', function(e){
            
            var str = String.fromCharCode(e.which);

            if( !/\d/.test(str) || str == '.'  ){
                if( str == '.' ){
                    var indexDot = $(this).val().indexOf(str);

                    if(indexDot == -1){
                        return true;
                    }

                    setCaretPosition($(this).get(0), indexDot + 1 );
                
                }

                return false;
            }
        });

        $('.modal').on('input', '.format-currency', function(e){
            var inputElem = $(this).get(0),
                caretPos = doGetCaretPosition( inputElem ),
                val = $.trim($(this).val()),
                valLength = val.length,
                lastDigit = val.substr(-1);

            // inputElem.value = inputElem.value.replace( /\.\d+/ , function(match){
            //     return match.substr(0,3);
            // });

            if( lastDigit !== '.'){
                $(this).val($(this).asNumber()).formatCurrency({symbol: '₡ ', roundToDecimalPlace: -1});
            }

            $(this).parent().find('[type=hidden]').val( $(this).asNumber() );

            if( val.indexOf('.') !== -1 && lastDigit === '0' ){
                 $(this).val( val );
            }

            if( $(this).val().length > valLength ){
                caretPos += ( $(this).val().length - valLength );
            }
            else if( $(this).val().length < valLength ){
                caretPos - ( valLength - $(this).val().length  );
            }

            setCaretPosition(inputElem, caretPos );

        });

        $('.modal').on('click','.payment_method', function(e){
            e.preventDefault();
            var $modal = $('#calcAmount');

            if( !$('#calcAmount').hasClass('has-info') ){
                $('#calcAmount').addClass('has-info');
                // $modal.find('input:not(:checkbox)').val('');
                // $modal.find('input[type=checkbox]').prop('checked', false);
                // $('#useContract1, #useContract2, #useContract3').prop('disabled',true);

                if( $('#client_registered').is(':checked') ){
                    $modal.find('input:not(.lock)').prop('disabled', false);

                    $.ajax(site_url + 'servicio/contratosCliente/' + $('#client_id').val())
                    .done(function(response){
                        if( $.isArray(response) && response.length){
                            $.each(response, function(i, data){
                                
                                data.monto_abonado = data.monto_abonado || 0;
                                i++;
                                var selected_contract  = $('#contrato_account_id'+i).val();
                                $( '#totalContract' + i ).val(data.monto_total).trigger('input');
                                $( '#amountContract' + i ).val(data.monto_abonado).trigger('input');
                                $( '#idContract' + i ).val(data.contract_number);
                                

                                $('#useContract' + i).prop('disabled', data.id == selected_contract).prop('checked', data.id == selected_contract)
                                .data('monto_abonado', data.monto_abonado)
                                .data('monto_total', data.monto_total)
                                .data('monto_cuota', data.monto_cuota)
                                .data('id', data.id);


                            });
                        }

                        $('#amountService').filter(function(){ return this.value != ''; }).trigger('keyup');
                    });
                }
                else{
                    //$modal.find('input:not(.for-contado)').prop('disabled', true);
                    $('#amountService').filter(function(){ return this.value != ''; }).trigger('keyup');
                }
            }

            //showModal('#calcAmount');
        });

        $('.modal').on('click','.add-client', function(e){
            e.preventDefault();
            var client_first_name = $(this).data('client_first_name');
            var client_last_name1 = $(this).data('client_last_name1');
            var client_last_name2 = $(this).data('client_last_name2');
            var id =  $(this).data('id');
            var id_card = $(this).data('id_card');
            var email = $(this).data('email');
            var phone = $(this).data('phone');
            var phone2 = $(this).data('phone2');
            var phone3 = $(this).data('phone3');
            
            $('#client_id').val(id);
            $('#client_first_name').val(client_first_name);
            $('#client_last_name1').val(client_last_name1);
            $('#client_last_name2').val(client_last_name2);
            $('#client_id_card').val(id_card);
            $('#client_email').val(email);
            $('#client_phone').val(phone);
            $('#client_phone2').val(phone2);
            $('#client_phone3').val(phone3);

            $('#clienteModal').modal('hide');

            $('.payment_method').prop('disabled', false);
            $('#calcAmount').removeClass('has-info');
            $('[name=amount]').val('').prev().val('');
            $('[name=balance]').val('').prev().val('');
            $('#primaFunecredito').val('');
            $('#saldoFunecredito').val('');
            $('#plazoFunecredito').val('');
            $('#cuotaFunecredito').val('');
            $('#abono').val('');
            $('#calcAmount').removeClass('has-info');

            $('#calcAmount').find('input:not(:checkbox)').val('').end().find(':checkbox').prop('checked', false).end().find('#useContract1, #useContract2, #useContract3').prop('disabled',true);
        });

        var $addMoreModal = $('#selectAddMore'),
            $currentAddMore = null;

        $('.modal').on('change', '[data-select-add-custom]', function(){
            if( $(this).find('option:selected').is('[data-other]') ){
                $currentAddMore = $(this);
                showModal($addMoreModal);
            }
        });

        $addMoreModal.off('hide.bs.modal');

        $addMoreModal.on('click', '[data-close]', function(){
            $addMoreModal.find('input').val('');
            $currentAddMore.data("selectBox-selectBoxIt").selectOption(0);
            $currentAddMore.trigger('change');
        })

        $addMoreModal.on('click', '[data-add-more-to-select]', function(){
            
            var value = $.trim( $addMoreModal.find('input').val() );
                
            if( value ){
                var valueExists = $currentAddMore.find('option[value="' + value + '"]').index();

                if( valueExists == -1 ){
                    var $otherOption = $currentAddMore.find('[data-other]'),
                        otherValue = $otherOption.text(),
                        $customOption = $currentAddMore.find('[data-custom]');


                    $currentAddMore.data("selectBox-selectBoxIt").remove( $otherOption.index() );

                    if($customOption.length){
                        $currentAddMore.data("selectBox-selectBoxIt").remove( $customOption.index() );
                    }

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

            $currentAddMore.trigger('change');
             $addMoreModal.find('input').val('');
        });

        $('.modal').on('click input', '#seller', function(){
            showModal('#vendedoresModal');
        });

        $('.modal').on('click', '.add-vendedor', function(e){
            e.preventDefault();
            var name = $(this).data('username');
            var id =  $(this).data('id');
            
            $('#seller').val(name);
            $('#seller_id').val(id);

            $('#vendedoresModal').modal('hide');
        });

        $('.modal').on('click','#client_registered', function(){
            $('.client input').toggleClass('on', $(this).is(':checked'));
            $('.payment_method').prop('disabled', $(this).is(':checked'));
            $('#calcAmount').removeClass('has-info');
            $('.client input').val('');
        });

        $('.modal').on('keypress', '.client .on',  function(){
            return false;
        });

        $('.modal').on('click', '.client .on',  function(){
            showModal('#clienteModal');
        });


        // $('#calcAmount').on('keyup change', 'input', function(){
        //     calPago();
        // });

       // $('#calcAmount').on('keyup change', '#advance_payment, :checkbox', function(){
       //      var saldo = $('#pay1month').asNumber() + $('#debt').asNumber();

       //          $('#pay1month').val(0);
       //          $('#debt').val(saldo).trigger('input');
       //  });

       //  $('#calcAmount').on( 'click', '[data-accept]', function(){
       //      $('[name=amount]').val( $('#amountService').asNumber() ).prev().val( $('#amountService').val() );
       //      $('[name=balance]').prev().val( $('#saldoTotal').val() ).trigger('input');
       //      $('[name=primaFunecredito]').val( $('#advance_payment').asNumber() );
       //      $('[name=cuotaFunecredito]').val( $('#cuota').asNumber() );
       //      $('[name=plazoFunecredito]').val( $('#plazo').val() );
       //      $('[name=interesFunecredito]').val( $('#interes').val() );
       //      $('[name=saldoFunecredito]').val( $('#debt').asNumber() );
       //      $('[name=abono]').val( $('#payment').asNumber() );

       //      $('#useContract1,#useContract2,#useContract3').each(function(i){
       //          if( $(this).is(':checked') ){
       //              $('#contrato_account_id' + (i + 1)).val( $(this).data('id') );
       //          }
       //      });
       //  });

        function calPago(){
            var montoServicio = $('#amountService').asNumber() || 0,
                primaFunecredito = $('#advance_payment').asNumber() || 0,
                saldoFunecredito = $('#debt').asNumber() || 0,
                abono = $('#payment').asNumber() || 0,
                montoContratos = 0,
                totalContratos = 0,
                saldoContrato = 0,
                cuotaContrato = 0,
                saldo = 0;
                
                $('#calcAmount [type=checkbox]').each(function(){
                    if( $(this).is(':checked') ){
                        montoContratos += Number( $(this).data('monto_abonado') || 0 );
                        totalContratos += Number( $(this).data('monto_total') || 0 );
                        cuotaContrato += Number( $(this).data('monto_cuota') || 0 );
                    }
                });

                saldo = montoServicio - abono;

                if( saldo >= totalContratos ){
                    saldo -= totalContratos;
                    saldoContrato = totalContratos - montoContratos;
                }
                else{
                    saldo = 0;
                }

                saldo = saldo - primaFunecredito - saldoFunecredito;

                $('#saldoTotal').val(saldo + saldoContrato + saldoFunecredito);
    
                $('#pay1month').val(saldo).trigger('input');
                $('#saldoContrato').val(saldoContrato).trigger('input');
                $('#cuotaContrato').val(cuotaContrato).trigger('input');
        }

        $('#debt, #plazo, #interes').on('keyup', function(){
            updateCuotaFunecredito();
        });

        $('.modal').on('input change', '[data-duplicate]', function(){
             var name = $(this).attr('name'),
                $dupElemen = $('[data-duplicate-name=' + name + ']');

            
            if( $(this).is('textarea') ){
                $dupElemen.val( $(this).val()) ;
            }
            else if( $(this).is('select') ) {
                $dupElemen.next().find('.selectboxit-text').text( $(this).val() );
            }
        });

        function updateCuotaFunecredito(){
            var saldoFunecredito = $('#debt').asNumber() || 0,
                plazo = Number($('#plazo').val() || 0 ),
                interes = Number($('#interes').val() || 0) / 100,
                cuota = 0;

                if( saldoFunecredito && plazo ){
                    cuota = saldoFunecredito / plazo;
                    cuota = cuota + ( cuota *  interes);
                }

                $('#cuota').val(cuota).trigger('input');
        }

        $('#modal_ajax').on('show.bs.modal', modal_service_loaded);

        function modal_service_loaded(e){
            
            $('[name=amount],[name=tiempo_contrato]').on('input', function(e){
                calcularSaldo();
            });

            $('[name=id_card]').autocomplete({
                source: search_json.id_card,
                minLength: 2,
                select: function( event, ui ) {
                    setClientData(ui.item.id);
                }
            });

            $('[name=first_name]').autocomplete({
                source: search_json.first_name,
                minLength: 2,
                select: function( event, ui ) {
                    setClientData(ui.item.id);
                }
            });

            $('[name=last_name]').autocomplete({
                source: search_json.last_name,
                minLength: 2,
                select: function( event, ui ) {
                    setClientData(ui.item.id);
                }
            });

            $('[name=last_name2]').autocomplete({
                source: search_json.last_name2,
                minLength: 2,
                select: function( event, ui ) {
                    setClientData(ui.item.id);
                }
            });

            function setClientData(clientId){
                $('[name=id_card]').val(clients[clientId].id_card);
                $('[name=first_name]').val(clients[clientId].first_name);
                $('[name=last_name]').val(clients[clientId].last_name);
                $('[name=last_name2]').val(clients[clientId].last_name2);
                $('[name=phone]').val(clients[clientId].phone);
                $('[name=phone2]').val(clients[clientId].phone2);
                $('[name=phone3]').val(clients[clientId].phone3);
                $('[name=email]').val(clients[clientId].email);
                $('#seller').val(clients[clientId].seller_name);
                $('[name=address]').val(clients[clientId].address);
                $('#provinciasSelectBoxItText').text(  clients[clientId].province  );
                $('#cantonesSelectBoxItText').text(  clients[clientId].canton  );
                $('#distritosSelectBoxItText').text(  clients[clientId].district  );

                var startsCount = $('.rating span').length;

                $('.rating span').removeClass('active').eq( startsCount - clients[clientId].category ).addClass('active');

                $('[name=client_id]').val(clientId);
            }
        }

    });
		
</script>