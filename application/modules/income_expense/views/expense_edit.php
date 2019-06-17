<?php
$edit_data = $this->db->get_where('expense', array('expense_id' => $param3))->result_array();
foreach($edit_data as $row) { ?>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title" >
                        <i class="entypo-plus-circled"></i>
                        <?php echo lang_key('edit_expense'); ?>
                    </div>
                </div>

                <div class="panel-body">

                    <?php echo form_open(site_url('income_expense/expense/update/' . $param3), array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data')); ?>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo lang_key('title'); ?></label>

                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="title" required value="<?php echo $row['title']; ?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo lang_key('description'); ?></label>

                        <div class="col-sm-7">
                            <textarea class="form-control" name="description"
                                rows="3"><?php echo $row['description']; ?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo lang_key('income_/_expense_category'); ?></label>

                        <div class="col-sm-7">
                            <select name="income_expense_category_id" class="selectboxit" required>
                                <?php
                                $categories = $this->db->get('income_expense_category')->result_array();
                                foreach($categories as $row2) { ?>
                                    <option value="<?php echo $row2['income_expense_category_id'] ?>"
                                        <?php if($row2['income_expense_category_id'] == $row['income_expense_category_id']) echo 'selected'; ?>>
                                            <?php echo $row2['name']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo lang_key('amount'); ?></label>

                        <div class="col-sm-7">
                            <input type="number" class="form-control" name="amount" required value="<?php echo $row['amount']; ?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo lang_key('account'); ?></label>

                        <div class="col-sm-7">
                            <select name="account_id" class="selectboxit" required>
                                <?php
                                $accounts = $this->db->get('account')->result_array();
                                foreach($accounts as $row2) { ?>
                                    <option value="<?php echo $row2['account_id'] ?>"
                                        <?php if($row2['account_id'] == $row['account_id']) echo 'selected'; ?>>
                                            <?php echo $row2['title']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo lang_key('date'); ?></label>

                        <div class="col-sm-7">
                            <input type="text" name="date" class="form-control datepicker" placeholder="date here"
                                data-format="D, dd MM yyyy" value="<?php echo date("D, d M Y", $row['date']); ?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info" id="submit-button">
                                <?php echo lang_key('update'); ?>
                            </button>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>