<a href="javascript:;" onclick="showAjaxModal('<?php echo site_url('admin/modal/popup/contact/contact_add'); ?>')" 
    class="btn btn-primary pull-right">
        <i class="entypo-plus-circled"></i>
        <?php echo lang_key('add_new_contact'); ?>
</a> 
<br><br><br>

<?php
$this->db->order_by('contact_id', 'desc');
$contacts = $this->db->get_where('contact')->result_array();
if(empty($contacts)){ ?>
    <div class="alert alert-info">
        <?php
        if($contact_type == 'customer')
            echo lang_key('no_customers');
        if($contact_type == 'supplier')
            echo lang_key('no_suppliers');
        ?>
    </div>
<?php } else { ?>

    <table class="table table-bordered responsive datatable" id="table_export">
        <thead>
            <tr>
                <th>#</th>
                <th><?php echo lang_key('name'); ?></th>
                <th><?php echo lang_key('company_name'); ?></th>
                <th><?php echo lang_key('email'); ?></th>
                <th><?php echo lang_key('phone'); ?></th>
                <th><?php echo lang_key('type'); ?></th>
                <th><?php echo lang_key('options'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 1;
            foreach ($contacts as $row): ?>
                <tr>
                    <td><?php echo $count++ ?></td>
                    <td><?php echo $row['first_name'] . ' ' . $row['last_name'] ; ?></td>
                    <td><?php echo $row['company_name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo lang_key($row['type']); ?></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                <?php echo lang_key('actions') ?> <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                <li>
                                    <a href="javascript:;" onclick="showAjaxModal('<?php echo site_url('admin/modal/popup/contact/contact_edit/' . $row['contact_id']); ?>');">
                                        <i class="entypo-pencil"></i>
                                        <?php echo lang_key('edit');?>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('contact/contact_details/' . $row['contact_id']); ?>">
                                        <i class="entypo-eye"></i>
                                        <?php echo lang_key('view_details');?>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#" onclick="confirm_modal('<?php echo site_url('contact/contacts/delete/' . $row['contact_id'] . '/' . $row['type']); ?>');">
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