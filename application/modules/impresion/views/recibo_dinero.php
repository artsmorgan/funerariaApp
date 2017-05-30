<?php 

$sql = "SELECT CONCAT(c.first_name, ' ', c.last_name, ' ', c.last_name2) AS name,
s.amount FROM bk_service AS s INNER JOIN bk_contact AS c ON c.contact_id = s.contact_id WHERE s.service_id = ?";

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
                                <label for="field-1" class="control-label col-sm-12">Monto del contrato: </label>
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
                                    <input type="text" data-info="saldo_anterior" class="form-control" disabled value="TBP" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-1" class="control-label col-sm-12">Abono: </label>
                                <div class="col-sm-12">
                                    <input type="text" data-info="abono" class="form-control"  />
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
                                    <input type="text" data-info="saldo_actual" disabled class="form-control"  value="TBP" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <br>
                            <div class="form-group">
                                <div class="col-sm-12 txt-right">
                                    <button class="btn btn-info" id="print-button">
                                        Imprimir
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<script>
    $(function(){
        var $print_container = $('.print_container');

        $('.panel-primary .format-currency').formatCurrency({
            symbol: '₡ '
        });

        $('[data-info=tipo_pago]').on('change', function(){
            $('[data-info=numero_transferencia]').prop('disabled', !$(this).find('option:selected').is('[data-enable]') );
        });

        $('#print-button').on('click', function(e){
            e.preventDefault();

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
        });
    });
</script>