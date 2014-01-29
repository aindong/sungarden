<?php @session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Sun Garden Hotel Tarlac City</title>
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	<link type="text/css" rel="Stylesheet" href="js/bjqs.css" />
	<link type="text/css" rel="Stylesheet" href="js/demo.css" />
	<link href="js/jquery-ui-1.10.3.custom/css/ui-lightness/jquery-ui-1.10.3.custom.css" rel="stylesheet">
	<link href="js/lightbox/css/lightbox.css" rel="stylesheet" />
	<!-- Include the jQuery library (local or CDN) -->
	<script src="js/jquery.js"></script>
</head>
<body>

<?php
	if(isset($_SESSION['valid']))
	{
?>

<!--  topbar  -->
<div id="topbar">
	<a href="admin.php" class="btn"><span class="icon-dashboard"></span>Go to Dashboard</a>
</div>

<?php } ?>

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


	<div id="main-wrapper">
		<a href="<?php echo URL; ?>"><div id="header"></div></a> <!-- Header for sungarder -->

		<!-- menu -->
		<div id="menu">
			<ul>
				<li><a href="?action=index" <?php $active = $action == "index" || $action == "" ? 'class="active"' : ""; echo $active; ?> >Home</a></li>
				<li><a href="?action=about" <?php $active = $action == "about" ? 'class="active"' : ""; echo $active; ?> >About</a></li>
				<li><a href="?action=rooms" <?php $active = $action == "rooms" ? 'class="active"' : ""; echo $active; ?> >Our Rooms</a></li>
				<li><a href="?action=rates" <?php $active = $action == "rates" ? 'class="active"' : ""; echo $active; ?> >Rates</a></li>
				<li><a href="?action=gallery" <?php $active = $action == "gallery" ? 'class="active"' : ""; echo $active; ?> >Gallery</a></li>
				<li><a href="?action=sitemap" <?php $active = $action == "sitemap" ? 'class="active"' : ""; echo $active; ?> >Site Map</a></li>
				<li><a href="?action=contacts" <?php $active = $action == "contacts" ? 'class="active"' : ""; echo $active; ?> >Contact Us</a></li>
			</ul>
		</div>

		<div id="slider">
			<ul class="bjqs">
		        <?php
		        	foreach (glob("images/*.jpg") as $image) {
		        		echo "<li><img src=".$image."></li>";
		        	}
		        ?>
		    </ul>
		</div>

		<div id="inner-wrapper">
