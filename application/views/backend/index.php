<?php 
$system_name    = $this->db->get_where('settings', array('type' => 'system_name'))->row()->description;
$system_address = $this->db->get_where('settings', array('type' => 'address'))->row()->description;
$footer         = $this->db->get_where('settings', array('type' => 'footer'))->row()->description;
$text_align     = $this->db->get_where('settings', array('type' => 'text_align'))->row()->description;
$system_email   = $this->db->get_where('settings', array('type' => 'system_email'))->row()->description;
$loginType      = $this->session->userdata('login_type');
?>
<?php include 'css.php'; ?>

    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
    

	<?php include 'header.php'; ?>
	<?php include $loginType.'/navigation.php';?>
	<?php include 'page_info.php';?>
	<?php include $loginType.'/'.$page_name.'.php';?>
		
       			
	<?php // include 'dashboard.php'; ?>
            </div>
            <!-- /.container-fluid -->
         <?php include 'footer.php'; ?>
    </div>
 <?php include 'modal.php'; ?>
 <?php include 'js.php'; ?>