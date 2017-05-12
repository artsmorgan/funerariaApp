<?php
$edit_data = $this->db->get_where('contact', array('contact_id' => $param3))->result_array();
foreach($edit_data as $row) : ?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    <?php echo lang_key('edit_contact'); ?> 
                </div>
            </div>
            
            <div class="panel-body">

                <?php echo form_open(site_url('contact/contacts/update/'. $param3), array('class' => 'form-horizontal form-groups-bordered form-fun validate', 'enctype' => 'multipart/form-data')); ?>

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('first_name'); ?></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="first_name" value="<?php echo $row['first_name']; ?>" />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('last_name'); ?></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="last_name"  value="<?php echo $row['last_name']; ?>" />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('identification_card'); ?></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control col-sm-12" name="id_card" value="<?php echo $row['id_card']; ?>" />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('email'); ?></label>
                            <div class="col-sm-12">
                                <input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>" />
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
                                    <?php $provincias = array(
                                            'Alajuela',
                                            'Cartago',
                                            'Guanacaste',
                                            'Heredia',
                                            'Limón',
                                            'Puntarenas',
                                            'San José'
                                        ); ?>
                                    <?php foreach($provincias as $provincia): ?>
                                        <?php echo "<option value=\"$provincia\" " . ($provincia == $row['province'] ? 'selected' : ''  ) . ">$provincia</option>"; ?>
                                    <?php endforeach; ?>
								</select>
                            </div>
                            <div class="col-sm-4" id="lvl-container-2">
                                    <select class="selectboxit selectaux" id="cantones" name="canton">
                                        <option value="">Cantón</option>
                                        <?php echo '<option value="' . $row['canton'] . '" selected >' . $row['canton'] . '</option>'; ?>
                                    </select>
                            </div>
                            <div class="col-sm-4" id="lvl-container-3">
                                <select class="selectboxit" id="distritos" name="district">
                                    <option value="">Distrito</option>
                                    <?php echo '<option value="' . $row['district'] . '" selected >' . $row['district'] . '</option>'; ?>
                                </select>
                            </div>
                            
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('phone'); ?></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="phone" value="<?php echo $row['phone']; ?>" />
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="phone2" value="<?php echo $row['phone2']; ?>" />
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="phone3" value="<?php echo $row['phone3']; ?>" />
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
                                <textarea name="address" class="form-control" rows="5"><?php echo $row['address']; ?></textarea>
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
                                        <select name="agent" class="selectboxit" >
                                            <option value="2">uno</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- form-group -->
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('route'); ?></label>
                                    <div class="col-sm-12">
                                        <input type="number" name="route" class="form-control" value="<?php echo $row['route']; ?>" >
                                    </div>
                                </div>
                                <!-- form-group -->
                            </div>
                        </div>
                        <!-- inner row -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('amount'); ?></label>
                                    <div class="col-sm-12">
                                        <input type="number" name="amount" class="form-control" value="<?php echo $row['amount']; ?>">
                                    </div>
                                </div>
                                <!-- form-group -->
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('balance_'); ?></label>
                                    <div class="col-sm-12">
                                        <input type="number" name="balance" class="form-control" value="<?php echo $row['balance']; ?>">
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
                                <input type="text" class="form-control" name="localization1" value="<?php echo $row['localization1']; ?>" />
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="localization2" value="<?php echo $row['localization2']; ?>" />
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="localization3" value="<?php echo $row['localization3']; ?>"  />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('fee'); ?></label>
                            <div class="col-sm-12">
                                <input type="number" class="form-control" name="fee"  value="<?php echo $row['fee']; ?>" />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('month_payment'); ?></label>
                            <div class="col-sm-12">
                                <select  class="selectboxit" name="month_payment" >
                                    <?php 
                                        $months = array(
                                            'Enero',
                                            'Febrero',
                                            'Marzo',
                                            'Abril',
                                            'Mayo',
                                            'Junio',
                                            'Julio',
                                            'Agosto',
                                            'Septiembre',
                                            'Octubre',
                                            'Noviembre',
                                            'Diciembre'
                                        );
                                    ?>
                                    <?php foreach($months as $month): ?>
                                        <?php echo "<option value=\"$month\" " . ($month == $row['month_payment'] ? 'selected' : ''  ) . ">$month</option>"; ?>
                                    <?php endforeach; ?>
                                </select>
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
                                <input type="text" name="incorporation_date" class="form-control datepicker" value="<?php echo $row['incorporation_date']; ?>" >
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
                                <input type="hidden" class="form-control col-sm-12" name="category"  value="<?php echo $row['category']; ?>" />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('advance_payment'); ?></label>
                            <div class="col-sm-12">
                                <input type="number" class="form-control" name="advance_payment" value="<?php echo $row['advance_payment']; ?>" />
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
                                    <?php echo lang_key('update'); ?>
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

        var starsCount = $('.rating span').length,
            current = $('.rating .active').index();

            rating = current == -1 ? 0 : starsCount - current;

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


        function bindEvents(){
            var $provincias = $('#provincias')
                $cantones = $('#cantones'),
                $distritos = $('#distritos'),
                provinciaSelected = $provincias.val(),
                catonSelected = $cantones.val(),
                distritoSelected = $distritos.val();

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


            $provincias.selectBoxIt().data("selectBox-selectBoxIt").selectOption(provinciaSelected);
            $cantones.selectBoxIt().data("selectBox-selectBoxIt").selectOption(catonSelected);
            $distritos.selectBoxIt().data("selectBox-selectBoxIt").selectOption(distritoSelected);

            
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

<?php endforeach; ?>