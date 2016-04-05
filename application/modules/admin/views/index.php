<?php
if(isset($module_type))
{
    $module_type = $module_type;
}
else
{
   $module_type = 'admin'; 
}
$system_title       = $this->db->get_where('settings', array('type' => 'system_title'))->row()->description;
$text_align         = $this->db->get_where('settings', array('type' => 'text_align'))->row()->description;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Neon Admin Panel" />
    <meta name="author" content="" />

    <title><?php echo $system_title; ?> | <?php echo $page_title; ?></title>


    <?php include 'includes_top.php';?>

</head>

<body class="page-body  page-fade" data-url="http://neon.dev">

<div class="page-container chat-visible <?php if($text_align == 'right-to-left') echo 'right-sidebar';?>"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->

    <?php echo $this->load->view('admin/navigation'); ?>
    
    <div class="main-content">
        <div class="header-color"></div>

        <?php include 'header.php';?>

        <h3 style="color:#818da1; font-weight:200;">
            <i class="entypo-right-circled"></i> 
            <?php echo $page_title; ?>
        </h3>
        
        <?php //$this->load->view('../test'); ?>

        <?php echo $this->load->view($module_type . '/' . $page_name); ?>
        <?php //if(isset($content))echo $content;?>
        
        <!-- Footer -->
        <?php include 'footer.php';?>
    </div>



</div>



<?php include 'modals.php';?>
<?php include 'includes_bottom.php';?>


</body>
</html>