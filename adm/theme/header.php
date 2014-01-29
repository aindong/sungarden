<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel | Sun Garden Hotel</title>
	<link rel="stylesheet" type="text/css" href="adm/theme/styles/style.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<link href="js/jquery-ui-1.10.3.custom/css/ui-lightness/jquery-ui-1.10.3.custom.css" rel="stylesheet">
	<link href="js/lightbox/css/lightbox.css" rel="stylesheet" />
</head>
<body>

<!--  topbar  -->
<div id="topbar">
	<a href="index.php" class="btn"><span class="icon-home"></span>Visit Website</a>

	<div id="accountPanel">
		<p>Welcome <a href="#"><span class="username"><?php echo $_SESSION['role'] ?></span></a>
		<a href="?action=logout" class="btn"><span class="icon-signout logout">Logout</span></a>
		</p>
	</div>
</div>

	<?php
		if(!empty($_SESSION['notif']))
		{
	?>
			<div class="<?php echo $_SESSION['notif_type']; ?> message">
				<h3><?php echo $_SESSION['notif']?></h3>
			</div>
	<?php
			unset($_SESSION['notif']);
			unset($_SESSION['notif_type']);
		}
	?>


<!--  Navigation menu  -->
<div id="accordian">
	<ul>
		<?php if($_SESSION['role'] == "Admin") {?>
		<li>
			<h3><span class="icon-dashboard"></span>Dashboard</h3>
			<ul>
				<li><a href="?action=audit&action2=Receptionist">User Logs</a></li>
				<li><a href="?action=audit&action2=Admin">Admin Logs</a></li>
				<li><a href="?action=audit&action2=Hotel">Hotel Logs</a></li>
				<li><a href="?action=message">Messages</a></li>
			</ul>
		</li>

		<li>
			<h3><span class="icon-tasks"></span>Management</h3>
			<ul>
				<li><a href="?action=roominventory">Room Inventory</a></li>
				<li><a href="?action=users">Users</a></li>
				<li><a href="?action=gallery">Gallery</a></li>
			</ul>
		</li>
		<?php } ?>

		<li>
			<h3><span class="icon-calendar"></span>Reservations</h3>
			<ul>
				<li><a href="?action=viewr">View Reservations</a></li>
				<li><a href="?action=viewc">View Checked-Ins</a></li>
				<li><a href="index.php?action=reserve">Add Reservations</a></li>
				<li><a href="?action=walkin">Add Walk-In</a></li>
			</ul>
		</li>

		<?php if($_SESSION['role'] == "Admin") {?>
		<li>
			<h3><span class="icon-paperclip"></span>Reports</h3>
			<ul>
				<li><a href="?action=report">Sales</a></li>
			</ul>
		</li>
		<?php } ?>
	</ul>
</div>


<div id="wrapper">