<?php
$this->db->order_by('purchase_id', 'desc');
$purchases = $this->db->get('purchase')->result_array();
if(empty($purchases)){ ?>
    <div class="alert alert-info">
        <?php echo lang_key('no_purchases'); ?>
    </div>
<?php } else { ?>

    <table class="table table-bordered responsive datatable" id="table_export">
        <thead>
            <tr>
                <th>#</th>
                <th><?php echo lang_key('purchase_code'); ?></th>
                <th><?php echo lang_key('supplier'); ?></th>
                <th><?php echo lang_key('creation_date'); ?></th>
                <th><?php echo lang_key('amount'); ?></th>
                <th><?php echo lang_key('options'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 1;
            foreach ($purchases as $row): ?>
                <tr>
                    <td><?php echo $count++ ?></td>
                    <td><?php echo $row['purchase_code']; ?></td>
                    <td>
                        <?php $supplier = $this->db->get_where('contact', array('contact_id' => $row['supplier_id']))->row();
                        echo $supplier->first_name . ' ' . $supplier->last_name; ?>
                    </td>
                    <td><?php echo date('d/m/Y', $row['creation_date']); ?></td>
                    <td><?php echo show_price($row['amount']); ?></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                <?php echo lang_key('actions') ?> <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                <li>
                                    <a href="<?php echo site_url('inventory/purchase_edit/' . $row['purchase_id']); ?>">
                                        <i class="entypo-pencil"></i>
                                        <?php echo lang_key('edit');?>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('inventory/purchase_invoice/' . $row['purchase_id']); ?>">
                                        <i class="entypo-eye"></i>
                                        <?php echo lang_key('view_purchase_invoice');?>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#" onclick="confirm_modal('<?php echo site_url('inventory/purchase/delete/' . $row['purchase_id']); ?>');">
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