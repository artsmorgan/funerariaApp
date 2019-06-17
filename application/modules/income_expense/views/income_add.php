<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    <?php echo lang_key('add_income'); ?>
                </div>
            </div>
            
            <div class="panel-body">

                <?php echo form_open(site_url('income_expense/income/create'), array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data')); ?>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo lang_key('title'); ?></label>

                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="title" required />
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo lang_key('description'); ?></label>

                    <div class="col-sm-7">
                        <textarea class="form-control" name="description" rows="3"></textarea>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo lang_key('income_/_expense_category'); ?></label>

                    <div class="col-sm-7">
                        <select name="income_expense_category_id" class="selectboxit" required>
                            <?php
                            $categories = $this->db->get('income_expense_category')->result_array();
                            foreach($categories as $row) { ?>
                                <option value="<?php echo $row['income_expense_category_id'] ?>">
                                    <?php echo $row['name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo lang_key('amount'); ?></label>

                    <div class="col-sm-7">
                        <input type="number" class="form-control" name="amount" required />
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo lang_key('account'); ?></label>

                    <div class="col-sm-7">
                        <select name="account_id" class="selectboxit" required>
                            <?php
                            $accounts = $this->db->get('account')->result_array();
                            foreach($accounts as $row) { ?>
                                <option value="<?php echo $row['account_id'] ?>">
                                    <?php echo $row['title']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo lang_key('date'); ?></label>

                    <div class="col-sm-7">
                        <input type="text" name="date" class="form-control datepicker" placeholder="date here"
                            data-format="D, dd MM yyyy" />
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-5">
                        <button type="submit" class="btn btn-info">
                            <?php echo lang_key('submit'); ?>
                        </button>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>