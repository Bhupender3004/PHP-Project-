<?php
session_start();
include_once 'class.php';
$con = new dbconn();
$link = $con -> conn_open();
// Add pages we only need for our assignment system, for example signup will include the signup.php file.
$pages = array('about', 'users\student\user', 'users\student\updates', 'users\student\select', 'users\student\upload_assignment', 'users\student\view_assignment', 'users\teacher\select', 'users\teacher\user', 'users\teacher\upload_assignment', 'users\teacher\view_assignment', 'users\teacher\mark_assignment', 'users\teacher\mark_assignment_selection', 'users\teacher\preview_assignment', 'faculty');

// Page is set to home (login.php) by default, so when the visitor visits that will be the page they see. But if the user has logged in then the user is redirected to the select(select.php) page depending upon the type of the user  

$page = isset($_GET['page']) && in_array($_GET['page'], $pages) ? $_GET['page'] : (isset($_SESSION["user"]) ? $_SESSION["home_page"] :'login');

//$num_items_in_cart = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
 //Fetch the current UserName
$user = isset($_SESSION['user']) ? $_SESSION['user'] : 'Guest';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<script src="js/check.js"></script>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Assignment Management System</title>
	<!--link rel="stylesheet" href="css/index_style.css" type="text/css" /-->
	<link rel="stylesheet" href="css/style.css">
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
					<div class="login-area"> 
						<!--ul>
							<li><a>Logged in as <?php //echo "$user"; ?></a></li>
							<li><a href="index.php">Home</a></li>
							<li><a href="index.php?page=signup">Create an account</a></li>
							<li><a href="index.php?page=frmabout">About us</a></li>
							<li><a href="index.php?page=frmcontact">Contact us</a></li>
							<li><a href="logout.php">Sign Out</a></li>
						</ul-->
						
							<?php if(isset($_SESSION['user'])){ ?>Logged in as <a href="index.php?page=<?=($_SESSION["type"]=='T')? 'users\teacher\user' : 'users\student\user'; ?>"><?=$user?></a> <?php }?>	

							<a href="index.php"><?php if(!isset($_SESSION['user'])){ ?>Log in<?php } else {?>Home <?php } ?></a>

							<?php if(isset($_SESSION['user'])){ if($_SESSION["type"]=='S'){ 
							?><a href="index.php?page=users\student\updates">Updates</a><?php } }
							 ?>

							<?php //if(!isset($_SESSION['user'])){?>
								<!--a href="index.php?page=signup">Create an account</a-->
							<?php //}?>
							<a href="index.php?page=about">About us</a>
							<a href="index.php?page=faculty">Faculty</a>
							<a href="logout.php">Sign Out</a>
						
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
				<p> © Copyright 2022 Assignment Management System, Inc. All rights reserved. </p>
			</div>
		</div>
		<!----------------{ End Footer }----------------> 
	</div>


</body>
</html>
