<a href="javascript:;" onclick="showAjaxModal('<?php echo site_url('admin/modal/popup/servicio/servicio_annadir'); ?>')" 
    class="btn btn-primary pull-right">
        <i class="entypo-plus-circled"></i>
        <?php echo lang_key('add_service'); ?>
</a> 
<br><br><br>

<!--  DATA TABLE EXPORT CONFIGURATIONS -->                      
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