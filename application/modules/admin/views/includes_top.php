<link rel="stylesheet" href="<?php echo base_url();?>assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-icons/entypo/css/entypo.css">
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/neon-core.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/neon-theme.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/neon-forms.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/custom.css">

<!-- RTL SETTINGS -->
<?php if ($text_align == 'right-to-left') : ?>
    <link rel="stylesheet" href="assets/css/neon-rtl.css">
<?php endif; ?>

<?php
$login_type = $this->session->userdata('login_type');

if($login_type == 'store') {
    if($this->db->get_where('store_owner_settings', array('owner_id' => $this->session->userdata('user_id')))->num_rows() > 0)
        $skin_colour = $this->db->get_where('store_owner_settings', array('owner_id' => $this->session->userdata('user_id')))->row()->skin_colour;
    else
        $skin_colour = '';
} if($login_type == 'employee') {
    $store_id       = $this->db->get_where('user', array('user_id' => $this->session->userdata('user_id')))->row()->store_id;
    $owner_id       = $this->db->get_where('stores', array('id' => $store_id))->row()->owner_id;
    if($this->db->get_where('store_owner_settings', array('owner_id' => $owner_id))->num_rows() > 0)
        $skin_colour = $this->db->get_where('store_owner_settings', array('owner_id' => $owner_id))->row()->skin_colour;
    else
        $skin_colour = '';
}

if (($login_type == 'store' || $login_type == 'employee') && $skin_colour != '') : ?>
    <link rel="stylesheet" href="assets/css/skins/<?php echo $skin_colour;?>.css">
<?php endif; ?>

<link rel="stylesheet" href="<?php echo base_url();?>assets/js/datatables/responsive/css/datatables.responsive.css">

<link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-icons/font-awesome/css/font-awesome.min.css">

<script src="<?php echo base_url();?>assets/js/jquery-2.1.1.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery-migrate-1.2.1.min.js"></script>

<!--[if lt IE 9]><script src="<?php echo base_url();?>assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<!--Amcharts-->
<script src="<?php echo base_url(); ?>assets/js/amcharts/amcharts.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/amcharts/pie.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/amcharts/serial.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/amcharts/gauge.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/amcharts/funnel.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/amcharts/radar.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/amcharts/exporting/amexport.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/amcharts/exporting/rgbcolor.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/amcharts/exporting/canvg.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/amcharts/exporting/jspdf.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/amcharts/exporting/filesaver.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/amcharts/exporting/jspdf.plugin.addimage.js" type="text/javascript"></script>