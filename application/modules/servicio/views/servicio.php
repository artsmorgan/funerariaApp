<a href="javascript:;" onclick="showAjaxModal('<?php echo site_url('admin/modal/popup/servicio/servicio_annadir/' . $service_type ); ?>')" 
    class="btn btn-primary pull-right">
        <i class="entypo-plus-circled"></i>
        <?php echo lang_key('add_service'); ?>
</a> 
<br><br><br>
<?php 
$this->db->order_by('user_id', 'desc');
$userlist = $this->db->get_where('user')->result_array();

$this->db->order_by('contact_id', 'desc');
$clientlist = $this->db->get_where('contact')->result_array();

?>

<?php
$sql = "SELECT s.service_id, CONCAT(s.client_first_name, ' ', s.client_last_name1, ' ', s.client_last_name2) AS name, s.client_id_card, s.contract_id FROM bk_service AS s WHERE s.type = ?";
$services = $this->db->query( $sql, array( $service_type ) )->result_array();

if(empty($services)){ ?>
    <div class="alert alert-info">
        <?php
        echo 'No se encontraron servicios ' . $service_type;
        ?>
    </div>
<?php } else { ?>

    <table class="table table-bordered responsive datatable" id="table_export">
        <thead>
            <tr>
                <th>#Id</th>
                <th>Contrato</th>
                <th>Nombre</th>
                <th>Cédula</th>
                
                <th>Historial de Pagos</th>
                <th><?php echo lang_key('options'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 1;
            foreach ($services as $row): ?>
                <tr>
                    <td><?php echo $count++ ?></td>
                    <td><?php echo $row['contract_id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['client_id_card']; ?></td>
                    <td> <a href="/servicios/pagos" class="btn btn-primary">Ver Pagos</a> </td>                    
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                <?php echo lang_key('actions') ?> <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                <li>
                                    <a href="javascript:;" onclick="showAjaxModal('<?php echo site_url('admin/modal/popup/servicio/servicio_actualizar/' . $row['service_id'] . '/' . $service_type); ?>');">
                                        <i class="entypo-pencil"></i>
                                        <?php echo lang_key('edit');?>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('servicio/service_details/' . $row['service_id']); ?>">
                                        <i class="entypo-eye"></i>
                                        <?php echo lang_key('view_details');?>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#" onclick="confirm_modal('<?php echo site_url('servicio/servicios/delete/' . $row['service_id'] . '/' . $service_type); ?>');">
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



<div class="modal fade" id="selectAddMore" role="dialog">
    <div class="modal-dialog modal-sm">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Nueva opción</h4>
            </div>
            <div class="modal-body">
                <input type="text" class="form-control">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-close data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-default" data-add-more-to-select data-dismiss="modal">Añadir</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="clienteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Seleccionar cliente</h4>
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
                <?php for($i = 0; $i < count($clientlist);$i++ ){?>                      
                <tr>
                <td><?php  echo $clientlist[$i]['first_name'].' '. $clientlist[$i]['last_name'];  ?></td>
                <td>
                    <a href="#" class="add-client btn btn-primary" 
                                    data-id="<?php  echo $clientlist[$i]['contact_id']; ?>" 
                                    data-client_first_name="<?php  echo $clientlist[$i]['first_name']; ?>"
                                    data-client_last_name1="<?php  echo $clientlist[$i]['last_name']; ?>"
                                    data-client_last_name2="<?php  echo $clientlist[$i]['last_name2']; ?>"
                                    data-email="<?php  echo $clientlist[$i]['email'];  ?>"
                                    data-id_card="<?php  echo $clientlist[$i]['id_card'];  ?>"
                                    data-phone="<?php  echo $clientlist[$i]['phone'];  ?>"
                                    data-phone2="<?php  echo $clientlist[$i]['phone2'];  ?>"
                                    data-phone3="<?php  echo $clientlist[$i]['phone3'];  ?>">
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

<!--  DATA TABLE EXPORT CONFIGURATIONS -->                      
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