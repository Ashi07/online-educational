<?php 
include("includes/config/config.php"); 

/*if(empty($_SESSION[SITE]['USERTYPE']) || empty($_SESSION[SITE]['USERID']))
{
	header("location: login".$_SESSION[SITE]['EXT']);
}*/

?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<?php include("includes/meta/meta-head.php"); ?>
</head>
<!-- END HEAD -->

<body class="page-header-fixed page-sidebar-closed-hide-logo page-md">

<!-- BEGIN CONTAINER -->
<div class="wrapper">
	
<!-- BEGIN HEADER -->
<?php include("includes/header/header.php"); ?>
<!-- END HEADER -->
	

<div class="container-fluid">
<div class="page-content page-content-popup">

<!-- BEGIN BREADCRUMBS -->
<?php //include("includes/breadcrumbs/breadcrumbs.php"); ?>
<!-- END BREADCRUMBS -->
	
	
<!-- Left Navigation -->
<?php //include("includes/navigation/left-navigation.php"); ?>
<!-- Left Navigation -->
	
	
<!-- BEGIN CONTAINER -->
<?php include("includes/files/default.php"); ?>
<!-- END CONTAINER -->
	
</div>

<!-- BEGIN FOOTER -->
<?php include("includes/footer/footer.php"); ?>
<!-- END FOOTER -->

</div>	
</div>
	

	
	
<!-- BEGIN QUICK SIDEBAR -->
<?php /* include("includes/files/sidebar.php"); */ ?>
<!-- END QUICK SIDEBAR -->
	
	
<!-- BEGIN QUICK NAV -->
<?php /* include("includes/files/sidebar.php"); */ ?>
<!-- END QUICK NAV -->
	
	
<!--[if lt IE 9]>
<script src="assets/global/plugins/respond.min.js"></script>
<script src="assets/global/plugins/excanvas.min.js"></script> 
<script src="assets/global/plugins/ie8.fix.min.js"></script> 
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<script src="assets/global/plugins/moment.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>


<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="assets/global/scripts/datatable.js" type="text/javascript"></script>
<script src="assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="assets/global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<script src="assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/pages/scripts/table-datatables-managed.min.js" type="text/javascript"></script>
<script src="assets/pages/scripts/form-repeater.min.js" type="text/javascript"></script>

        
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="assets/layouts/layout5/scripts/layout.min.js" type="text/javascript"></script>
<script src="assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
<script src="assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->


<script src="assets/pages/scripts/ui-modals.min.js" type="text/javascript"></script>

<script>
	$(document).ready(function()
	{
		$('#clickmewow').click(function()
		{
			$('#radio1003').attr('checked', 'checked');
		});
	})
</script>


	
	
 </body>
</html>