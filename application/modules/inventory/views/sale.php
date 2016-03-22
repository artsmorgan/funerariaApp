<?php
$this->db->order_by('sale_id', 'desc');
$sales = $this->db->get('sale')->result_array();
if(empty($sales)){ ?>
    <div class="alert alert-info">
        <?php echo lang_key('no_sales'); ?>
    </div>
<?php } else { ?>

    <table class="table table-bordered responsive datatable" id="table_export">
        <thead>
            <tr>
                <th>#</th>
                <th><?php echo lang_key('sale_code'); ?></th>
                <th><?php echo lang_key('customer'); ?></th>
                <th><?php echo lang_key('creation_date'); ?></th>
                <th><?php echo lang_key('amount'); ?></th>
                <th><?php echo lang_key('options'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 1;
            foreach ($sales as $row): ?>
                <tr>
                    <td><?php echo $count++ ?></td>
                    <td><?php echo $row['sale_code']; ?></td>
                    <td>
                        <?php $customer = $this->db->get_where('contact', array('contact_id' => $row['customer_id']))->row();
                        echo $customer->first_name . ' ' . $customer->last_name; ?>
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
                                    <a href="<?php echo site_url('inventory/sale_edit/' . $row['sale_id']); ?>">
                                        <i class="entypo-pencil"></i>
                                        <?php echo lang_key('edit');?>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('inventory/sale_invoice/' . $row['sale_id']); ?>">
                                        <i class="entypo-eye"></i>
                                        <?php echo lang_key('view_sale_invoice');?>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#" onclick="confirm_modal('<?php echo site_url('inventory/sale/delete/' . $row['sale_id']); ?>');">
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