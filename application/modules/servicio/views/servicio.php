<a href="javascript:;" onclick="showAjaxModal('<?php echo site_url('admin/modal/popup/servicio/'. $service_type  .'_annadir/' . $service_type ); ?>')" 
    class="btn btn-primary pull-right">
        <i class="entypo-plus-circled"></i>
        Añadir <?php echo $page_type; ?>
</a> 
<br><br><br>
<?php 
$this->db->order_by('user_id', 'desc');
$userlist = $this->db->get_where('user')->result_array();

$this->db->order_by('contact_id', 'desc');
$clientlist = $this->db->get_where('contact')->result_array();

?>

<?php
$sql = "SELECT s.service_id, CONCAT(s.client_first_name, ' ', s.client_last_name1, ' ', s.client_last_name2) AS name, s.client_id_card, s.contract_id FROM bk_service AS s WHERE s.type = ?";
$services = $this->db->query( $sql, array( $service_type ) )->result_array();

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
                
                <th>Historial de Pagos</th>
                <th><?php echo lang_key('options'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 1;
            foreach ($services as $row): ?>
                <tr>
                    <td><?php echo $count++ ?></td>
                    <td><?php echo $row['contract_id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['client_id_card']; ?></td>
                    <td> <a href="/servicios/pagos" class="btn btn-primary">Ver Pagos</a> <a href="/servicios/pagos" class="btn btn-danger">Realizar Pago</a> </td>                    
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                <?php echo lang_key('actions') ?> <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                <li>
                                    <a href="javascript:;" onclick="showAjaxModal('<?php echo site_url('admin/modal/popup/servicio/'. $service_type  .'_actualizar/' . $row['service_id'] . '/' . $service_type); ?>');">
                                        <i class="entypo-pencil"></i>
                                        <?php echo lang_key('edit');?>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('servicio/service_details/' . $row['service_id'] . '/' . $service_type ); ?>">
                                        <i class="entypo-eye"></i>
                                        <?php echo lang_key('view_details');?>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#" onclick="confirm_modal('<?php echo site_url('servicio/servicios/delete/' . $row['service_id'] . '/' . $service_type); ?>');">
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



<div class="modal fade" id="calcAmount" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Calculo</h4>
            </div>
            <div class="modal-body form-horizontal">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-6">Monto servicio</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control for-contado format-currency"  id="amountService"   />
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
                                <input type="text" class="form-control format-currency"  id="advance_payment"   />
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
                            <label class="control-label col-md-6">Monto contrato 1</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control lock format-currency" disabled  id="amountContract1"   />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label col-md-12">Monto total</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control lock format-currency" disabled  id="totalContract1"   />
                                    </div>                                    
                                </div>
                            </div>
                            <!--  inner col -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label col-md-12">N° contrato</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control lock" disabled  id="idContract1"   />
                                    </div>                                    
                                </div>
                            </div>
                            <!--  inner col -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label col-md-12">Aplicar contrato <input type="checkbox" class="lock" disabled id="useContract1"></label>                                 
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
                                <input type="text" class="form-control lock format-currency" disabled id="amountContract2"   />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control lock format-currency" disabled  id="totalContract2"   />
                                    </div>                                    
                                </div>
                            </div>
                            <!--  inner col -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control lock" disabled  id="idContract2"   />
                                    </div>                                    
                                </div>
                            </div>
                            <!--  inner col -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label col-md-12">Aplicar contrato <input type="checkbox" class="lock" disabled id="useContract2"></label>                                 
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
                            <label class="control-label col-md-6">Monto contrato 3</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control lock format-currency" disabled id="amountContract3"   />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control lock format-currency" disabled  id="totalContract3"   />
                                    </div>                                    
                                </div>
                            </div>
                            <!--  inner col -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control lock" disabled  id="idContract3"   />
                                    </div>                                    
                                </div>
                            </div>
                            <!--  inner col -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label col-md-12">Aplicar contrato <input type="checkbox" class="lock" disabled id="useContract3"></label>                                 
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
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label col-md-6">Saldo a cancelar 1 mes</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control lock format-currency" disabled id="pay1month"   />
                                    </div>
                                </div>
                            </div>
                            <!-- inner col -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label col-md-6">Saldo a financiar Funecrédito</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control format-currency lock" disabled  id="debt"   />
                                    </div>
                                </div>
                            </div>
                            <!-- inner col -->
                        </div>
                        <!-- inner row -->
                    </div>
                    <!-- col -->
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label col-md-12">Plazo meses</label>
                                    <div class="col-md-12">
                                        <input type="number" class="form-control"  id="plazo"   />
                                    </div>
                                </div>
                            </div>
                            <!-- inner col -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label col-md-12">Interés</label>
                                    <div class="col-md-12">
                                        <input type="number" class="form-control"  id="interes"   />
                                    </div>
                                </div>
                            </div>
                            <!-- inner col -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label col-md-12">Cuota mensual funecrédito</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control  format-currency lock" disabled id="cuota"   />
                                    </div>
                                </div>
                            </div>
                            <!-- inner col -->
                        </div>
                        <!-- inner row -->
                    </div>
                    <!-- col -->
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-6">Saldo a financiar contrato</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control lock format-currency"  disabled id="saldoContrato"   />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="col-md-4">
                                <input type="text" class="form-control lock format-currency" disabled id="cuotaContrato"   />
                               
                            </div>
                            <label class="control-label col-md-8">Cuota mensual del contrato</label>
                        </div>
                    </div>
                    <!-- col -->
                </div>
                <!-- row -->
                 <input  type="hidden" id="saldoTotal" >
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-close data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-default" data-accept data-dismiss="modal">Aceptar</button>
            </div>
        </div>
    </div>
</div>

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

                    setCaretPosition($(this).get(0), indexDot + 1 );
                
                }
                return false;
            }
        });

        $('.modal').on('input', '.format-currency', function(e){
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

            showModal('#calcAmount');
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


        $('#calcAmount').on('keyup change', 'input', function(){
            calPago();
        });

       $('#calcAmount').on('keyup change', '#advance_payment, :checkbox', function(){
            var saldo = $('#pay1month').asNumber() + $('#debt').asNumber();

                $('#pay1month').val(0);
                $('#debt').val(saldo).trigger('input');
        });

        $('#calcAmount').on( 'click', '[data-accept]', function(){
            $('[name=amount]').val( $('#amountService').asNumber() ).prev().val( $('#amountService').val() );
            $('[name=balance]').prev().val( $('#saldoTotal').val() ).trigger('input');
            $('[name=primaFunecredito]').val( $('#advance_payment').asNumber() );
            $('[name=cuotaFunecredito]').val( $('#cuota').asNumber() );
            $('[name=plazoFunecredito]').val( $('#plazo').val() );
            $('[name=interesFunecredito]').val( $('#interes').val() );
            $('[name=saldoFunecredito]').val( $('#debt').asNumber() );
            $('[name=abono]').val( $('#payment').asNumber() );

            $('#useContract1,#useContract2,#useContract3').each(function(i){
                if( $(this).is(':checked') ){
                    $('#contrato_account_id' + (i + 1)).val( $(this).data('id') );
                }
            });
        });

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

    });
		
</script>