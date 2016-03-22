<br>

<?php
$this->db->order_by('account_id', 'desc');
$accounts = $this->db->get('account')->result_array();
if(empty($accounts)){ ?>
    <div class="alert alert-info">
        <?php echo lang_key('no_accounts'); ?>
    </div>
<?php } else { ?>

    <table class="table table-bordered responsive datatable" id="table_export">
        <thead>
            <tr>
                <th>#</th>
                <th><?php echo lang_key('account_title'); ?></th>
                <th><?php echo lang_key('account_number'); ?></th>
                <th><?php echo lang_key('starting_balance'); ?></th>
                <th><?php echo lang_key('current_balance'); ?></th>
                <th><?php echo lang_key('account_type'); ?></th>
                <th><?php echo lang_key('options'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 1;
            foreach ($accounts as $row): ?>
                <tr>
                    <td><?php echo $count++ ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['account_number']; ?></td>
                    <td><?php echo show_price($row['balance']); ?></td>
                    <td><?php echo show_price($row['balance'] + get_financial_account_balance($row['account_id'])); ?></td>
                    <td><?php echo lang_key($row['type']); ?></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                <?php echo lang_key('actions') ?> <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                <li>
                                    <a href="javascript:;" onclick="showAjaxModal('<?php echo site_url('admin/modal/popup/account/account_edit/' . $row['account_id']); ?>');">
                                        <i class="entypo-pencil"></i>
                                        <?php echo lang_key('edit');?>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('account/view_ledger/' . $row['account_id']); ?>" >
                                        <i class="entypo-doc-text"></i>
                                        <?php echo lang_key('view_ledger');?>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#" onclick="confirm_modal('<?php echo site_url('account/accounts/delete/' . $row['account_id']); ?>');">
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