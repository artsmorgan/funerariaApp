<link rel="stylesheet" href="<?php echo base_url();?>assets/js/jvectormap/jquery-jvectormap-1.2.2.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/js/rickshaw/rickshaw.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/js/datatables/responsive/css/datatables.responsive.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/js/select2/select2-bootstrap.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/js/select2/select2.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/js/wysihtml5/bootstrap-wysihtml5.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/js/selectboxit/jquery.selectBoxIt.css">

<link rel="stylesheet" href="<?php echo base_url();?>assets/js/daterangepicker/daterangepicker-bs3.css">

<!-- Bottom Scripts -->
<script src="<?php echo base_url();?>assets/js/gsap/main-gsap.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.js"></script>
<script src="<?php echo base_url();?>assets/js/joinable.js"></script>
<script src="<?php echo base_url();?>assets/js/resizeable.js"></script>
<script src="<?php echo base_url();?>assets/js/neon-api.js"></script>
<script src="<?php echo base_url();?>assets/js/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jvectormap/jquery-jvectormap-europe-merc-en.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url();?>assets/js/rickshaw/vendor/d3.v3.js"></script>
<script src="<?php echo base_url();?>assets/js/rickshaw/rickshaw.min.js"></script>
<script src="<?php echo base_url();?>assets/js/raphael-min.js"></script>
<script src="<?php echo base_url();?>assets/js/morris.min.js"></script>
<script src="<?php echo base_url();?>assets/js/toastr.js"></script>
<script src="<?php echo base_url();?>assets/js/neon-chat.js"></script>
<script src="<?php echo base_url();?>assets/js/neon-custom.js"></script>
<script src="<?php echo base_url();?>assets/js/neon-demo.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url();?>assets/js/fileinput.js"></script>

<!-- Datatable Scripts -->

<script src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/js/datatables/TableTools.min.js"></script>
<script src="<?php echo base_url();?>assets/js/dataTables.bootstrap.js"></script>
<script src="<?php echo base_url();?>assets/js/datatables/jquery.dataTables.columnFilter.js"></script>
<script src="<?php echo base_url();?>assets/js/datatables/lodash.min.js"></script>
<script src="<?php echo base_url();?>assets/js/datatables/responsive/js/datatables.responsive.js"></script>
<script src="<?php echo base_url();?>assets/js/select2/select2.min.js"></script>

<script src="<?php echo base_url();?>assets/js/wysihtml5/wysihtml5-0.4.0pre.min.js"></script>
<script src="<?php echo base_url();?>assets/js/wysihtml5/bootstrap-wysihtml5.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.multi-select.js"></script>
<script src="<?php echo base_url();?>assets/js/fileinput.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url();?>assets/js/selectboxit/jquery.selectBoxIt.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap-tagsinput.min.js"></script>


<script src="<?php echo base_url();?>assets/js/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/js/daterangepicker/moment.min.js"></script>
<script src="<?php echo base_url();?>assets/js/daterangepicker/daterangepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/js/fullcalendar/fullcalendar.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/neon-calendar.js"></script>


<script src="<?php echo base_url();?>assets/js/bootstrap-switch.min.js"></script>

<script src="<?php echo base_url();?>assets/js/neon-notes.js"></script>

<script type="text/javascript">
    $(".email_template_editors").wysihtml5();
</script>


<!-- SHOW TOASTR NOTIFIVATION -->
<?php if ($this->session->flashdata('flash_message') != ""): ?>

    <script type="text/javascript">
        toastr.success('<?php echo $this->session->flashdata("flash_message"); ?>');
    </script>

<?php endif; ?>


<!-----  DATA TABLE EXPORT CONFIGURATIONS ----->                      
<script type="text/javascript">

    jQuery(document).ready(function ($)
    {
        var datatable = $("#table_export").dataTable();

        $(".dataTables_wrapper select").select2({
            minimumResultsForSearch: -1
        });
    });

</script>