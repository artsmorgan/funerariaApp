<a href="javascript:;" onclick="showAjaxModal('<?php echo site_url('admin/modal/popup/inventory/product_add/' . $product_type); ?>')" 
    class="btn btn-primary pull-right">
        <i class="entypo-plus-circled"></i>
        <?php echo lang_key('add_new_' . $product_type); ?>
</a> 
<br><br><br>

<?php
$this->db->order_by('product_id', 'desc');
$products = $this->db->get_where('product', array('type' => $product_type))->result_array();
if(empty($products)){ ?>
    <div class="alert alert-info">
        <?php
        if($product_type == 'product')
            echo lang_key('no_products');
        if($product_type == 'service')
            echo lang_key('no_services');
        ?>
    </div>
<?php } else { ?>

    <table class="table table-bordered responsive datatable" id="table_export">
        <thead>
            <tr>
                <th>#</th>
                <th><?php echo lang_key('code'); ?></th>
                <th><?php echo lang_key('name'); ?></th>
                <th>Cantidad</th>
                <th><?php echo lang_key('category'); ?></th>
                <th><?php echo lang_key('price'); ?></th>
                <th><?php echo lang_key('options'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 1;
            foreach ($products as $row): ?>
                <tr>
                    <td><?php echo $count++ ?></td>
                    <td><?php echo $row['product_code']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['quantity']; ?></td>
                    <td><?php echo get_db_field_by_id('product_category', 'name', $row['product_category_id']); ?></td>
                    <td><?php echo show_price($row['price']); ?></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                <?php echo lang_key('actions') ?> <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                <li>
                                    <a href="javascript:;" onclick="showAjaxModal('<?php echo site_url('admin/modal/popup/inventory/product_edit/' . $row['product_id']); ?>');">
                                        <i class="entypo-pencil"></i>
                                        <?php echo lang_key('edit');?>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#" onclick="confirm_modal('<?php echo site_url('inventory/products/delete/' . $row['product_id'] . '/' . $row['type']); ?>');">
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