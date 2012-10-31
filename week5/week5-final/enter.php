<?php
session_start();
?>
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
		<a href="#" data-icon="check" id="logout" class="ui-btn-right">Logout</a>

	</div><!-- /header -->

	<div data-role="content">	
		
		<?php
		$salt = "kr";
		// This saved_password would be saved in the database. I haven't included
		// a link to my database, but the lab 5 video recap has a walkthrough.
		$saved_password = crypt('mypassword', $salt); 
		$username = $_POST["username"];
		$entered_password = $_POST["password"];

		// We check the user-entered password against the one
		// saved and retrieved above. If it matches, the user is logged in.
		if (crypt($entered_password, $salt) == $saved_password && strcmp($username, "test") == 0) {
		   echo "You are now logged in!";
		   ?>
		   <script type="text/javascript">
			localStorage.setItem('username', '<?=$_POST["username"]?>');
			</script>
		<?php }

		?>
	</div><!-- /content -->

	<div data-role="footer" data-id="samebar" class="nav-glyphish-example" data-position="fixed" data-tap-toggle="false">
		<div data-role="navbar" class="nav-glyphish-example" data-grid="c">
		<ul>
			<li><a href="index.php" id="home" data-icon="custom">Home</a></li>
			<li><a href="login.php" id="key" data-icon="custom" class="ui-btn-active">Login</a></li>
			<li><a href="filter.php" id="map" data-icon="custom">Filter</a></li>
			<li><a href="settings.php" id="gear" data-icon="custom">Settings</a></li>
		</ul>
		</div>
	</div>
	<script type="text/javascript">
		$("#logout").click(function() {
		localStorage.removeItem('username');
		$("#form").show();
		$("#logout").hide();
	});
	</script>
</div><!-- /page -->

</body>
</html>