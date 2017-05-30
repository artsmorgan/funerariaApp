<a href="javascript:;" onclick="showAjaxModal('<?php echo site_url('admin/modal/popup/admin/admin_add'); ?>')" 
    class="btn btn-primary pull-right">
        <i class="entypo-plus-circled"></i>
        <?php echo lang_key('add_new_admin'); ?>
</a> 
<br><br><br>

<?php
$this->db->order_by('user_id', 'desc');
$admins = $this->db->get('user')->result_array();

if(empty($admins)) { ?>
    <div class="alert alert-info"><?php echo lang_key('no_admins'); ?></div>
<?php } else { ?>

    <table class="table table-bordered responsive datatable" id="table_export">
        <thead>
            <tr>
                <th>#</th>
                <th><?php echo lang_key('name'); ?> Completo</th>
                <th>Usuario</th>
                <th>Rol</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 1;
            foreach ($admins as $row): ?>
                <?php $userId = $row['user_id']; ?>
                <tr>
                    <td><?php echo $count++ ?></td>
                    <td><?php echo $row['first_name'] . ' ' . $row['last_name'] ; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['role']; ?></td>
                    <td>
                        <a href="#" class="btn btn-primary" 
                            onclick="showAjaxModal('<?php echo site_url('admin/modal/popup/admin/admin_edit?user='.$userId.' '); ?>')" >Editar</a>
                        <a href="#" class="btn btn-danger delete" data-uid="<?php echo $userId ?>">Eliminar</a>
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


        $('.delete').on('click', function(e){
            var c = confirm("Esta seguro que desea eliminar este usuario?");
            if(c){
                var uid = $(this).data('uid');
                // console.log('uid',uid);
                // site_url('admin/admins/update_admin/'.$uid
                <?php $url = site_url('admin/admins/delete/');  ?>
                $.post( "<?php echo $url ?>/",{"user_id":uid}, function( data ) {
                  if(data=="OK"){
                   location.reload();
                  }
                });
            }
            
        })
    });
		
</script>