<?php 

$sql = "SELECT CONCAT(s.client_first_name, ' ', s.client_last_name1, ' ', s.client_last_name2) AS name,
s.amount, ca.saldo AS saldo_actual, ca.id FROM bk_service AS s 
INNER JOIN bk_apartados_account AS ca ON ca.service_id = s.service_id WHERE s.service_id = ?";

$row = $this->db->query( $sql, array( $param3 ) )->row_array();

$f = new NumberFormatter("es", NumberFormatter::SPELLOUT);
?>
<?php if(  !empty($row) ) : ?>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title" >
                        <i class="entypo-plus-circled"></i>
                        Imprimir recibo dinero
                    </div>
                </div>
                <div class="panel-body form-horizontal form-groups-bordered">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-1" class="control-label col-sm-12">Nombre: </label>
                                <div class="col-sm-12">
                                    <input type="text" data-info="name" class="form-control" disabled value="<?php echo $row['name']; ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-1" class="control-label col-sm-12">Fecha: </label>
                                <div class="col-sm-12">
                                    <input type="text" data-info="date" class="form-control" disabled value="<?php echo date( 'd/m/Y' ) ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-1" class="control-label col-sm-12">Monto total: </label>
                                <div class="col-sm-12">
                                    <input type="text" data-info="amount" class="form-control format-currency" disabled value="<?php echo $row['amount']; ?>" />
                                    <input type="hidden" class="exclude" data-info="amount_word" value="<?php echo $f->format( $row['amount'] ); ?>" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-1" class="control-label col-sm-12">Concepto: </label>
                                <div class="col-sm-12">
                                    <input type="text" data-info="concepto" class="form-control"  />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-1" class="control-label col-sm-12">Tipo de pago: </label>
                                <div class="col-sm-12">
                                    <select class="selectboxit" data-info="tipo_pago">
                                        <option value="efectivo">Efectivo</option>
                                        <option value="tarjeta de crédito">Tarjeta de crédito</option>
                                        <option data-enable value="cheque">Cheque</option>
                                        <option data-enable value="transferencia">Transferencia</option>
                                    </select>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-1" class="control-label col-sm-12">Número de transferencia o cheque: </label>
                                <div class="col-sm-12">
                                    <input type="text" data-info="numero_transferencia" disabled class="form-control exclude"  />
                                </div>
                            </div>
                        </div>
                        
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-1" class="control-label col-sm-12">Saldo anterior: </label>
                                <div class="col-sm-12">
                                    <input type="text" data-info="saldo_anterior" class="form-control format-currency" disabled  value="<?php echo htmlentities( $row['saldo_actual'] ); ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-1" class="control-label col-sm-12">Abono: </label>
                                <div class="col-sm-12">
                                    <input type="text" data-info="abono" class="form-control format-currency" value="" />
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

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-1" class="control-label col-sm-12">Amortización: </label>
                                <div class="col-sm-12">
                                    <input type="text" data-info="amortizacion" class="form-control" disabled value="TBP" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-1" class="control-label col-sm-12">Saldo actual: </label>
                                <div class="col-sm-12">
                                    <input type="text" data-info="saldo_actual" disabled class="form-control format-currency"  value="<?php echo htmlentities( $row['saldo_actual'] ); ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <br>
                            <div class="form-group">
                                <div class="col-sm-12 txt-right">
                                    <input type="hidden" id="contract_id" value="<?php echo $row['id']; ?>">
                                    <button class="btn btn-info" id="print-button">
                                        Imprimir
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
        var $print_container = $('.print_container');

        $('.panel-primary [data-info]:not(.exclude,span)').each(function(){
            var data_info = $(this).attr('data-info');

            if(data_info.indexOf('amount') != -1 ){
                $print_container.find('.print_amount > span').html('');
                $print_container.find('.print_amount > span').append('<span class="format-currency">'+  $('[data-info=amount]').val() + '</span> ');
                $print_container.find('.print_amount > span').append('<span> '+  $('[data-info=amount_word]').val() + '</span>');
                return true;
            }

            var value = $.trim( $(this).val() );

            if(/cheque|transferencia/.test(value)){
                $print_container.find('.print_tipo_pago span').text( value + ' - ' + $('[data-info=numero_transferencia]').val() );
                return true;
            }


            $print_container.find('.print_' + data_info +  ' span').html(value);
        });

        $('.print_container .format-currency').formatCurrency({
            symbol: '₡ '
        });

        window.print();
    }

    $(function(){

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
                    type: 'apartado'
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