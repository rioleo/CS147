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
		<p>I think this page is missing a footer.</p>
	</div><!-- /content -->


</body>
</html>