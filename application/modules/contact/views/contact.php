<a href="javascript:;" onclick="showAjaxModal('<?php echo site_url('admin/modal/popup/contact/contact_add'); ?>')" 
    class="btn btn-primary pull-right">
        <i class="entypo-plus-circled"></i>
        Añadir nuevo Cliente
</a> 
<br><br><br>

<?php
$this->db->order_by('user_id', 'desc');
$userlist = $this->db->get_where('user')->result_array();

$sql = "select c.contact_id, c.type, CONCAT( c.first_name, ' ', c.last_name, ' ', c.last_name2 ) AS name, c.id_card, c.phone, c.phone2, c.phone3, IF( s.contract_id <> '', s.contract_id, '-' ) AS contract_id from bk_service AS s RIGHT JOIN bk_contact AS c  ON c.contact_id = s.contact_id";
$contacts = $this->db->query( $sql )->result_array();

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
                <th>Cedula</th>
                <th>Contrato</th>
                <th><?php echo lang_key('phone'); ?></th>
                <th><?php echo lang_key('options'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 1;
            foreach ($contacts as $row): ?>
                <tr>
                    <td><?php echo $count++ ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['id_card']; ?></td>
                    <td><?php echo $row['contract_id']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
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
                                <!-- <li>
                                    <a href="<?php echo site_url('contact/contact_details/' . $row['contact_id']); ?>">
                                        <i class="entypo-eye"></i>
                                        <?php echo lang_key('view_details');?>
                                    </a>
                                </li> -->
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

<div class="modal fade" id="vendedoresModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Seleccionar vendedor</h4>
        </div>
        <div class="modal-body">
        <table id="user-table" class="table table-striped">
            <thead>
            <tr>
                <th>Nombre</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
                <?php for($i = 0; $i < count($userlist);$i++ ){?>                      
                <tr>
                <td><?php  echo $userlist[$i]['first_name'].' '. $userlist[$i]['last_name'];  ?></td>
                <td>
                    <a href="#" class="add-vendedor btn btn-primary" 
                                    data-id="<?php  echo $userlist[$i]['user_id']; ?>" 
                                    data-username="<?php  echo $userlist[$i]['first_name'].' '. $userlist[$i]['last_name'];  ?>">
                    <i class="fa fa-user-plus" aria-hidden="true"></i> Agregar
                    </a>
                </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        </div>             
    </div>
    </div>
</div>

<!-----  DATA TABLE EXPORT CONFIGURATIONS ---->                      
<script type="text/javascript">
    function showModal(id){
        var zIndex = 1400;
        $(id).modal().css('z-index', zIndex);
        $('.modal-backdrop:last').css('z-index', zIndex - 1);
    }


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