<a href="javascript:;" onclick="showAjaxModal('<?php echo site_url('admin/modal/popup/income_expense/expense_add'); ?>')" 
    class="btn btn-primary pull-right">
        <i class="entypo-plus-circled"></i>
        <?php echo lang_key('add_new_expense'); ?>
</a> 
<br><br><br>

<?php
$this->db->order_by('expense_id', 'desc');
$expenses = $this->db->get('expense')->result_array();
if(empty($expenses)){ ?>
    <div class="alert alert-info">
        <?php echo lang_key('no_expenses'); ?>
    </div>
<?php } else { ?>

    <table class="table table-bordered responsive datatable" id="table_export">
        <thead>
            <tr>
                <th>#</th>
                <th><?php echo lang_key('title'); ?></th>
                <th><?php echo lang_key('description'); ?></th>
                <th><?php echo lang_key('income_/_expense_category'); ?></th>
                <th><?php echo lang_key('amount'); ?></th>
                <th><?php echo lang_key('account'); ?></th>
                <th><?php echo lang_key('date'); ?></th>
                <th><?php echo lang_key('options'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 1;
            foreach ($expenses as $row): ?>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo substr($row['description'], 0, 30) . '...'; ?></td>
                    <td><?php echo get_db_field_by_id('income_expense_category', 'name', $row['income_expense_category_id']); ?></td>
                    <td><?php echo show_price($row['amount']); ?></td>
                    <td><?php echo get_db_field_by_id('account', 'title', $row['account_id']); ?></td>
                    <td><?php echo date('d/m/Y', $row['date']); ?></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                <?php echo lang_key('actions') ?> <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                <li>
                                    <a href="javascript:;" onclick="showAjaxModal('<?php echo site_url('admin/modal/popup/income_expense/expense_edit/' . $row['expense_id']); ?>');">
                                        <i class="entypo-pencil"></i>
                                        <?php echo lang_key('edit');?>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#" onclick="confirm_modal('<?php echo site_url('income_expense/expense/delete/' . $row['expense_id']); ?>');">
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

<!-----  DATA TABLE EXPORT CONFIGURATIONS ---->                      
<script type="text/javascript">

    jQuery(document).ready(function($)
    {
        var datatable = $("#table_export").dataTable({
            "sPaginationType"   : "bootstrap"
        });

        $(".dataTables_wrapper select").select2({
            minimumResultsForSearch: -1
        });
    });
		
</script>