<?php
include_once 'class.php';
$con = new dbconn();
$link = $con -> conn_open();
// Add pages we only need for our shopping cart system, for example addtocart will include the addtocart.php file.
$pages = array('signup', 'select', 'product', 'frmsub', 'placeorder');
// Page is set to home (home.php) by default, so when the visitor visits that will be the page they see.
$page = isset($_GET['page']) && in_array($_GET['page'], $pages) ? $_GET['page'] : 'login';

// Get the amount of items in the shopping cart, this will be displayed in the header.
//$num_items_in_cart = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<script src="check.js"></script>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Assignment Management System</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<link rel="stylesheet" href="css/docs.theme.min.css">
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

</head>

<body>
	<!-----------------------------{ Main Wrapper }----------------------------->
	<div class="main-wrapper"> 
		<!----------------{ Header }---------------->
		<div class="header">
			<div class="top-part">
				<div class="top-inner-part">
					<div class="call-no"></div>
					<div class="login-area"> Hello, Guest Welcome you can<a href="index.php">Home</a> or  <a href="index.php?page=frmreg"> create an account </a>
						<a href="index.php?page=frmabout">About us</a> or <a href="index.php?page=frmcontact">Contact us</a>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="logo-area">
				<div class="logo"> <a href="#"><img src="images/logo.png" height="60px" width="150"/>  </a> </div>
				<h1>Assignment Management System </h1>
				<div class="clearfix"></div>
				<div class="navigation">
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="shadow"><img src="images/shadow.png" /></div>

		</div>

		<!----------------{ End Header }----------------> 

		<!----------------{ Middle }----------------> 

		<?php include_once($page . '.php'); ?>

		<!----------------{ End Middle }----------------> 

		<!----------------{ Footer }---------------->
		<div class="footer">
			<div class="footer-inner">

				<div class="clearfix"></div>
				<p> © Copyright 2019 Assignment Management System, Inc. All rights reserved. </p>
			</div>
		</div>
		<!----------------{ End Footer }----------------> 
	</div>


</body>
</html>
