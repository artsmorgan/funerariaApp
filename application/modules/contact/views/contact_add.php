<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    <?php echo lang_key('add_contact'); ?> 
                </div>
            </div>
            
            <div class="panel-body">

                <?php echo form_open(site_url('contact/contacts/create'), array('class' => 'form-horizontal form-groups-bordered form-fun validate', 'enctype' => 'multipart/form-data')); ?>

                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('first_name'); ?></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="first_name"  />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">Primer apellido</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="last_name"  />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12">Segundo apellido</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="last_name2"  />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('identification_card'); ?></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control col-sm-12" name="id_card"  />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('email'); ?></label>
                            <div class="col-sm-12">
                                <input type="email" class="form-control" name="email"  />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                </div>
                <!-- first row -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('address'); ?></label>
                            <div class="col-sm-4">
                                <select class="selectboxit" id="provincias" name="province">
                                    <option value="">Provincia</option>				
                                    <option value="Alajuela">Alajuela</option>
                                    <option value="Cartago">Cartago</option>
                                    <option value="Guanacaste">Guanacaste</option>
                                    <option value="Heredia">Heredia</option>
                                    <option value="Limón">Limón</option>
                                    <option value="Puntarenas">Puntarenas</option>
                                    <option value="San José">San José</option>
								</select>
                            </div>
                            <div class="col-sm-4" id="lvl-container-2">
                                    <select class="selectboxit selectaux" id="cantones" name="canton">
                                        <option value="">Cantón</option>
                                    </select>
                            </div>
                            <div class="col-sm-4" id="lvl-container-3">
                                <select class="selectboxit" id="distritos" name="district">
                                    <option value="">Distrito</option>
                                </select>
                            </div>
                            
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('phone'); ?></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="phone"  />
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="phone2"  />
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="phone3"  />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                </div>
                <!-- second row -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('other_signs'); ?></label>
                            <div class="col-sm-12">
                                <textarea name="address" class="form-control" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('agent'); ?></label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="seller"   />
                                        <input type="hidden" id="seller_id" name="seller_id"  />
                                    </div>
                                </div>
                                <!-- form-group -->
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('route'); ?></label>
                                    <div class="col-sm-12">
                                        
                                        <select class="selectboxit" name="route">
                                            <option value="">Seleccione ruta</option>
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
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="25">25</option>
                                            <option value="26">26</option>
                                            <option value="27">27</option>
                                            <option value="28">28</option>
                                            <option value="29">29</option>
                                            <option value="30">30</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- form-group -->
                            </div>
                        </div>
                        <!-- inner row -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-12 control-label">Monto del contrato</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control format-currency" value="">
                                        <input type="hidden" name="amount" value="">
                                    </div>
                                </div>
                                <!-- form-group -->
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('balance_'); ?></label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control format-currency" value="">
                                        <input type="hidden" name="balance" value="">
                                    </div>
                                </div>
                                <!-- form-group -->
                            </div>
                        </div>
                        <!-- inner row -->
                    </div>
                    <!-- col -->
                </div>
                <!-- third row -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('localization'); ?></label>
                            <div class="col-sm-4">
                                <input type="text" data-type="number" maxlength="2" class="form-control" name="localization1"  />
                            </div>
                            <div class="col-sm-4">
                                <input type="text" data-type="number" maxlength="3" class="form-control" name="localization2"  />
                            </div>
                            <div class="col-sm-4">
                                <input type="text" data-type="number" maxlength="2" class="form-control" name="localization3"  />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('fee'); ?></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control format-currency"  value="" />
                                <input type="hidden" name="fee" value="">
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('month_payment'); ?></label>
                            <div class="col-sm-6">
                                <select  class="selectboxit" name="month_payment" >
                                    <option value="Enero">Enero</option>
                                    <option value="Febrero">Febrero</option>
                                    <option value="Marzo">Marzo</option>
                                    <option value="Abril">Abril</option>
                                    <option value="Mayo">Mayo</option>
                                    <option value="Junio">Junio</option>
                                    <option value="Julio">Julio</option>
                                    <option value="Agosto">Agosto</option>
                                    <option value="Septiembre">Septiembre</option>
                                    <option value="Octubre">Octubre</option>
                                    <option value="Noviembre">Noviembre</option>
                                    <option value="Diciembre">Diciembre</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" name="year_payment" value=""  />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                </div>
                <!-- fourth row -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('incorporation_date'); ?></label>
                            <div class="col-sm-12">
                                <input type="text" name="incorporation_date" class="form-control datepicker" >
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('category'); ?></label>
                            <div class="col-sm-12">
                                <div class="rating">
                                    <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                                </div>
                                <input type="hidden" class="form-control col-sm-12" name="category"  />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('advance_payment'); ?></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control format-currency"  value="" />
                                <input type="hidden" name="advance_payment" value="">
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                </div>
                <!-- fith row -->
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
                <!-- sixth row -->
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

<script>
    (function() {
        if( typeof provinciasObj === 'undefined'){
            $.get('<?php echo base_url('assets/js/provincias.js'); ?>', bindEvents);
        }
        else{
           bindEvents();
        }

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

        var starsCount = $('.rating span').length,
            current = $('.rating .active').index(),
            rating = current == -1 ? 0 : starsCount - current;

        $('[data-type=number]').on('keydown', function(e){
            
            var str = String.fromCharCode(e.which);

            return /\d/.test(str);
        });

        $('.rating').on('mouseenter', function(){
            $('.rating .active').removeClass('active');
        });

        $('.rating').on('mouseleave', function(){
            if($('.rating .active').length){
                return;
            }

            $('.rating span').eq(current).addClass('active');
        });

        $('.rating span').on('click', function(){
            current = $(this).index();

            //$(this).addClass('active');

            rating = starsCount - current;
            $('[name=category]').val(rating);
        });

        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd'
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

        function bindEvents(){
            var $provincias = $('#provincias')
                $cantones = $('#cantones'),
                $distritos = $('#distritos');


            $provincias.on('change', function(){
                var provincia = $(this).val();

                removeOptions($cantones);
                removeOptions($distritos);

                if (!provincia) return;

                addOptions($cantones, provinciasObj[provincia]);
            });

            $cantones.on('change', function(){
                var canton = $(this).val(),
                    provincia = $provincias.val();

                removeOptions($distritos);

                if (!canton) return;

                addOptions($distritos, provinciasObj[provincia][canton]);
            });
        }

        function addOptions($select, options){
            var optionArr = [];
            $.each(options, function(k, e){
                if( typeof e === 'object' ){
                    optionArr.push(k);
                }
                else{
                    optionArr.push(e);
                }
            });

            $select.selectBoxIt().data("selectBox-selectBoxIt").add(optionArr); 
        }

        function removeOptions($select){
            var numElems = $select.find('option').length;
            indexElems = [];
            for(var i = 1; i < numElems; i++){
                indexElems.push(i);
            }

            $select.selectBoxIt().data("selectBox-selectBoxIt").remove(indexElems);            
        }
    }());
    
</script>