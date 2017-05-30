<?php
if (!isset($sql) || !isset($sql_params)){
    echo 'Query not provided';
    exit();
}

$rows = $this->db->query( $sql, $sql_params )->result_array();
?>
<?php if( empty($rows) ): ?>
<h2>No se encontraron recibos</h2>

<?php else: ?>

<?php 
foreach($rows as $row) : ?>
<div class="row page_print">
    <div class="col-xs-12">
        <div class="form-horizontal form-groups-bordered form-fun validate">

                <div class="row">
                    <div class="col-xs-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-xs-12"><?php echo lang_key('first_name'); ?></label>
                            <div class="col-xs-12">
                                <input type="text" class="form-control"  value="<?php echo $row['first_name']; ?>" />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-xs-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-xs-12"><?php echo lang_key('last_name'); ?></label>
                            <div class="col-xs-12">
                                <input type="text" class="form-control"   value="<?php echo $row['last_name']; ?>" />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-xs-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-xs-12"><?php echo lang_key('identification_card'); ?></label>
                            <div class="col-xs-12">
                                <input type="text" class="form-control col-xs-12"  value="<?php echo $row['id_card']; ?>" />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-xs-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-xs-12"><?php echo lang_key('email'); ?></label>
                            <div class="col-xs-12">
                                <input type="email" class="form-control"  value="<?php echo $row['email']; ?>" />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                </div>
                <!-- first row -->
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="field-1" class="col-xs-12 control-label"><?php echo lang_key('address'); ?></label>
                            <div class="col-xs-4">
                                <input type="text" class="form-control"  value="<?php echo $row['province']; ?>" />
                            </div>
                            <div class="col-xs-4" id="lvl-container-2">
                                <input type="text" class="form-control"  value="<?php echo $row['canton']; ?>" />
                            </div>
                            <div class="col-xs-4" id="lvl-container-3">
                                <input type="text" class="form-control"  value="<?php echo $row['district']; ?>" />
                            </div>
                            
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="field-1" class="col-xs-12 control-label"><?php echo lang_key('phone'); ?></label>
                            <div class="col-xs-4">
                                <input type="text" class="form-control"  value="<?php echo $row['phone']; ?>" />
                            </div>
                            <div class="col-xs-4">
                                <input type="text" class="form-control"  value="<?php echo $row['phone2']; ?>" />
                            </div>
                            <div class="col-xs-4">
                                <input type="text" class="form-control"  value="<?php echo $row['phone3']; ?>" />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                </div>
                <!-- second row -->
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="field-1" class="col-xs-12 control-label"><?php echo lang_key('other_signs'); ?></label>
                            <div class="col-xs-12">
                                <textarea  class="form-control" rows="5"><?php echo $row['address']; ?></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-xs-6">
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="field-1" class="col-xs-12 control-label"><?php echo lang_key('agent'); ?></label>
                                    <div class="col-xs-12">
                                        <input type="text"  class="form-control" value="<?php echo $row['agent_name']; ?>" >
                                    </div>
                                </div>
                                <!-- form-group -->
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="field-1" class="col-xs-12 control-label"><?php echo lang_key('route'); ?></label>
                                    <div class="col-xs-12">
                                        <input type="number"  class="form-control" value="<?php echo $row['route']; ?>" >
                                    </div>
                                </div>
                                <!-- form-group -->
                            </div>
                        </div>
                        <!-- inner row -->
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="field-1" class="col-xs-12 control-label"><?php echo lang_key('amount'); ?></label>
                                    <div class="col-xs-12">
                                        <input type="number"  class="form-control" value="<?php echo $row['service_amount']; ?>">
                                    </div>
                                </div>
                                <!-- form-group -->
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="field-1" class="col-xs-12 control-label"><?php echo lang_key('balance_'); ?></label>
                                    <div class="col-xs-12">
                                        <input type="number"  class="form-control" value="<?php echo $row['service_balance']; ?>">
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
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="field-1" class="col-xs-12 control-label"><?php echo lang_key('localization'); ?></label>
                            <div class="col-xs-4">
                                <input type="text" class="form-control"  value="<?php echo $row['localization1']; ?>" />
                            </div>
                            <div class="col-xs-4">
                                <input type="text" class="form-control"  value="<?php echo $row['localization2']; ?>" />
                            </div>
                            <div class="col-xs-4">
                                <input type="text" class="form-control"  value="<?php echo $row['localization3']; ?>"  />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-xs-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-xs-12"><?php echo lang_key('fee'); ?></label>
                            <div class="col-xs-12">
                                <input type="number" class="form-control"   value="<?php echo $row['fee']; ?>" />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-xs-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-xs-12"><?php echo lang_key('month_payment'); ?></label>
                            <div class="col-xs-12">
                                <input type="text" class="form-control"   value="<?php echo $row['month_payment']; ?>" />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                </div>
                <!-- fourth row -->
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="field-1" class="col-xs-12 control-label"><?php echo lang_key('incorporation_date'); ?></label>
                            <div class="col-xs-12">
                                <input type="text"  class="form-control datepicker" value="<?php echo $row['incorporation_date']; ?>" >
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-xs-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-xs-12"><?php echo lang_key('category'); ?></label>
                            <div class="col-xs-12">
                                <div class="rating">
                                    <?php 
                                        $starts = 5;
                                        $rating = $starts - $row['category'];
                                    ?>

                                    <?php for( $i = 0; $i < $starts; $i++ ): ?>
                                        <?php echo '<span ' . ( $i ==  $rating ? 'class="active"' : '' ) . ' >☆</span>' ?>
                                    <?php endfor; ?>
                                </div>
                                <input type="hidden" class="form-control col-xs-12"   value="<?php echo $row['category']; ?>" />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-xs-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label col-xs-12"><?php echo lang_key('advance_payment'); ?></label>
                            <div class="col-xs-12">
                                <input type="number" class="form-control"  value="<?php echo $row['advance_payment']; ?>" />
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                </div>
                <!-- fith row -->
                </div>
            
        
    </div>
</div>

<?php endforeach; ?>

<?php endif;?>