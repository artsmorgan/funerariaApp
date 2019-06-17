<?php 

// echo 'param1 '.  $param1;
// echo 'param2 '.  $param2;
// echo 'param3 '.  $param3;

// $params = explode("_", $param3);

// $reciboID = $params[0];
// $tipo = $params[1];

// echo '<pre>';
// print_r($params);
// echo '</pre>';




$sql_recibo = "select * from bk_transaccion where id = ?";
$recibo = $this->db->query( $sql_recibo, array( $param3 ) )->row_array();
$servicio_id = $recibo['servicio_id'];
$tipo = $recibo['servicio_tipo'];

if($tipo == 'contrato'){
    $sql = "select c.*, cn.* from bk_contratos c inner join bk_contact cn on c.contact_id = cn.contact_id where id = ?";
    $sql_account = "select * from bk_contratos_account where contract_number = ?";
    $prefix = 'CT';
}


// echo $param3;
$row = $this->db->query( $sql, array( $servicio_id ) )->row_array();
$acc = $this->db->query( $sql_account, array( $servicio_id ) )->row_array();
// $row = $this->db->query( $sql, array( $param3 ) )->row_array();
// echo '<pre>';
// print_r($row);
// echo '</pre>';

// echo '<pre>';
// print_r($acc);
// echo '</pre>';

$f = new NumberFormatter("es", NumberFormatter::SPELLOUT);
?>
<?php if(  !empty($row) ) : ?>
    <?php echo form_open(site_url('servicio/servicios/contractPay'), array('class' => 'services form-horizontal form-groups-bordered form-fun validate', 'enctype' => 'multipart/form-data')); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title" >
                        <!-- <i class="entypo-plus-circled"></i> -->
                        Ver Detalle de recibo #: <?php echo $prefix.'000'.$recibo['id'] ?> - <strong>Contrato # <?php echo $row['no_contrato']  ?></strong>
                    </div>
                </div>

                <input type="hidden" name="contractID" value="<?php echo $param3 ; ?>">

                <div class="panel-body form-horizontal form-groups-bordered">
                    <!-- <input type="hidden" name="contractID" value="$row['id']"> -->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-1" class="control-label col-sm-12">Nombre: </label>
                                <div class="col-sm-12">
                                    <input type="text" data-info="name" class="form-control" disabled value="<?php echo $row['first_name'] . ' '. $row['last_name']; ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-1" class="control-label col-sm-12">Fecha: </label>
                                <div class="col-sm-12">
                                    <input type="text" data-info="date" class="form-control" disabled value="<?php $recibo['fecha_pago'] ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-1" class="control-label col-sm-12">Monto total: </label>
                                <div class="col-sm-12">
                                    <input type="text" data-info="amount" class="form-control format-currency" disabled value="<?php echo $acc['monto_total']; ?>" />
                                    <!-- <input type="hidden" class="exclude" data-info="amount_word" value="<?php echo $f->format( $row['monto_total'] ); ?>"  /> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="background: #fff !important">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-1" class="control-label col-sm-12">Concepto: </label>
                                <div class="col-sm-12">
                                    <input type="text" data-info="concepto" disabled name="concepto" class="form-control"  value="<?php echo $recibo['descripcion']; ?> " />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-1" class="control-label col-sm-12">Tipo de pago: </label>
                                <div class="col-sm-12">
                                   <input type="text" disabled class="form-control" name="tipo-pago" value="<?php echo $recibo['metodo_pago'] ?>">
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-1" class="control-label col-sm-12">Número de transferencia o cheque: </label>
                                <div class="col-sm-12">
                                    <input type="text" data-info="numero_transferencia" 
                                        disabled class="form-control exclude" name="no_transferencia" value="<?php echo $recibo['detalles'] ?>"  />
                                </div>
                            </div>
                        </div>
                        
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-1" class="control-label col-sm-12">Saldo anterior: </label>
                                <div class="col-sm-12">
                                    <input type="text" data-info="saldo_anterior" class="form-control format-currency" disabled  value="<?php echo htmlentities( $acc['saldo_anterior'] ); ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-1" class="control-label col-sm-12">Abono: </label>
                                <div class="col-sm-12">
                                    <input type="text" data-info="abono" class="form-control format-currency" disabled value="<?php echo htmlentities( $acc['monto_cuota'] ); ?>" />
                                    <input type="hidden"  value="<?php echo  $acc['monto_cuota'] ; ?>" name="abono" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-1" class="control-label col-sm-12">Interes: </label>
                                <div class="col-sm-12">
                                    <input type="text" data-info="interes" class="form-control" disabled value="TBP" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row" style="background: #fff !important">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-1" class="control-label col-sm-12">Mes al cobro: </label>
                                <div class="col-sm-12">
                                    <input type="text" name="mes_cobro" class="form-control"  disabled value="<?php echo  $acc['mes_cobro'] ; ?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-1" class="control-label col-sm-12">Saldo actual: </label>
                                <div class="col-sm-12">
                                    <input type="text" data-info="saldo_actual" disabled class="form-control format-currency"  value="<?php echo htmlentities( $acc['saldo']); ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <br>
                            <div class="form-group">
                                <div class="col-sm-12 txt-right">
                                    <input type="hidden" id="contract_id" value="<?php echo $row['id']; ?>">
<!--                                     <button class="btn btn-info" id="print-button" type="submit"> -->
                                    <button class="btn btn-info" type="submit">
                                        Reimprimir
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="msgs_container"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo form_close(); ?>
    <div class="print_container">
        <div class="page_print">
            <div class="print_header">
                <h3>Funeraria Shalom</h3>
                <p>Tel: +506 22354721</p>
                <p class="print_date"><?= $recibo['fecha_pago'] ?></p>
            </div>
            <p>Detalle de recibo #: <?php echo $prefix.'000'.$recibo['id'] ?> - Contrato # <?= $row['no_contrato']  ?></p>
            <p>Nombre: <?= $row['first_name'] . ' '. $row['last_name']. ' '. $row['last_name2'] ?></p>
            <p>Monto total: <?= $acc['monto_total'] ?></p>
            <p>Concepto: <?= $recibo['descripcion']; ?></p>
            <p>Tipo de pago: <?= $recibo['metodo_pago'] ?></p>
            <p>Número de transferencia o cheque: <?= $recibo['detalles'] ?></p>
            <p>Mes al cobro: <?=  $acc['mes_cobro'] ; ?></p>
            <p>Interes: TBP</p>
            <p>Saldo anterior: <?= $recibo['saldo_anterior'] ?></p>
            <p>Saldo actual: <?= $acc['saldo'] ?></p>
            <h2>Abono: <?= $recibo['monto_cuota'] ?></h2>
        </div>
    </div>
<?php endif; ?>

<script>
    var site_url = "<?php echo site_url() . '/';?>";

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

    function show_print_page(){
        var $print_container = $('.print_container').clone();
        var $aux = $('body .print_aux');
        
        if($aux.length == 0){
            $aux = $('<div class="print_aux" />');
            $('body').prepend($aux);
        }

        $aux.html('<div />');
        $aux.find('div').replaceWith($print_container);

        window.print();
    }

    function printPageReady(){
        if(typeof print_popup != 'undefined' && print_popup ){
            print_popup = null;
            show_print_page();
        }
    }

    $(function(){

        printPageReady();

        $('.btn-info').on('click', function(e){
            e.preventDefault();
            show_print_page();
            return false;
        });

        $('.panel-primary .format-currency').formatCurrency({
            symbol: '₡ '
        });

        $( '[data-info=abono]' ).on( 'input', function(){
            var saldo_actutal = $( '[data-info=saldo_anterior]').asNumber() - $(this).asNumber();
            $('[data-info=saldo_actual]').val(saldo_actutal).formatCurrency({
                symbol: '₡ '
            });

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

        $('[data-info=tipo_pago]').on('change', function(){
            $('[data-info=numero_transferencia]').prop('disabled', !$(this).find('option:selected').is('[data-enable]') );
        });

        var processing_transaction = false;
        $('#print-button').on('click', function(e){
            e.preventDefault();

            if( processing_transaction ) return;

            processing_transaction = true;
            $('.msgs_container').html('<p>Procesando, por favor espere...</p>');

            $.ajax({
                url: site_url + 'transaction/start_transaction',
                method: 'POST',
                datatype: 'json',
                data: {
                    id: $( '#contract_id' ).val(),
                    amount: $( '[data-info=abono]' ).asNumber(),
                    metodo_pago: $('[data-info=tipo_pago]').val(),
                    desc: $('[data-info=concepto]').val(),
                    type: 'contrato'
                }
            }).done(function(response){
                var msgs = '';
                console.log(response);
                if( typeof response !== 'object' ) return;

                if( response.errors.length ){
                    msgs = '<p class="error">' + response.errors.join('</p><p class="error">') + '</p>';
                }
                else{
                    msgs = '<p>' + response.success.join('</p><p>') + '</p>';
                    show_print_page();
                    $('#modal_ajax').modal('hide');
                }

                $('.msgs_container').html(msgs);
                $('.msgs_container').find('.format-currency').formatCurrency({
                    symbol: '₡ '
                });

            }).always(function(){
                processing_transaction = false;
            })

            
        });
    });
</script>