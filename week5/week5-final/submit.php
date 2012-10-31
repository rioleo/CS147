<!DOCTYPE html> 
<html>

<head>
	<title>VoteCaster | Submit</title> 
	<meta charset="utf-8">
	<meta name="apple-mobile-web-app-capable" content="yes">
 	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 

	<link rel="stylesheet" href="jquery.mobile-1.2.0.css" />
	<link rel="stylesheet" href="style.css" />
	<link rel="apple-touch-icon" href="appicon.png" />
	<link rel="apple-touch-startup-image" href="startup.png">
	
	<script src="jquery-1.8.2.min.js"></script>
	<script src="jquery.mobile-1.2.0.js"></script>

</head> 
<body> 

<div data-role="page">

	<div data-role="header">
		<h1>My Title</h1>

	</div><!-- /header -->

	<div data-role="content">	
		<p>Hello world</p>	
		<?php
		echo "<p>flip_s: ".$_POST["flip_s"]."</p>";
		echo "<p>gender: ".$_POST["gender"]."</p>";
		echo "<p>slider: ".$_POST["slider"]."</p>";
		echo "<p>name: ".$_POST["name"]."</p>";
		echo "<p>select-shipper: ".$_POST["select-shipper"]."</p>";
		?>
	</div><!-- /content -->
<div data-role="footer" data-id="samebar" class="nav-glyphish-example" data-position="fixed" data-tap-toggle="false">
		<div data-role="navbar" class="nav-glyphish-example" data-grid="c">
		<ul>
			<li><a href="index.php" id="home" data-icon="custom">Home</a></li>
			<li><a href="login.php" id="key" data-icon="custom">Login</a></li>
			<li><a href="filter.php" id="map" data-icon="custom" class="ui-btn-active">Filter</a></li>
			<li><a href="settings.php" id="gear" data-icon="custom">Settings</a></li>
		</ul>
		</div>
	</div>
</div><!-- /page -->

</body>
</html>