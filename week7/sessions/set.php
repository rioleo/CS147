<?php
session_start();
?>
<!DOCTYPE html> 
<html>

<head>
	<title>Sessions Example</title> 
	<meta charset="utf-8">
	<meta name="apple-mobile-web-app-capable" content="yes">
 	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	
	<link rel="stylesheet" href="css/style.css" />
	<link rel="apple-touch-icon" href="appicon.png" />
	<link rel="apple-touch-startup-image" href="startup.png">

	<script src="js/jquery-1.8.2.min.js"></script>
	<script src="js/jquery.mobile-1.2.0.js"></script>

	<link rel="stylesheet" href="css/jquery.mobile-1.2.0.css" />

</head>

<body>
<div data-role="page" id="filter2">

	<div data-role="header">
		<h1>Map!</h1>
	</div>
	
	<div data-role="content">	
	
		<?php 
		if (isset($_POST["username"])) {
			$_SESSION["username"] = $_POST["username"];
		}
		echo "<p>We set the session username set to: ".$_SESSION["username"]."</p>";
		?>	
			
		<script type="text/javascript">
				$("#filter2").unbind('pageinit');
				$("#filter2").bind( 'pageinit',function(event){ 
					localStorage.setItem('username', '<?=$_SESSION["username"];?>');
					alert("We set local storage username to: " + localStorage.getItem('username'));
					$("#filter2").find("#home").attr("href", "index.php?username="+localStorage.getItem('username'));
			});
		</script>
			
		
	</div>
	
	
	<div data-role="footer" data-id="samebar" class="nav-glyphish-example" data-position="fixed" data-tap-toggle="false">
		<div data-role="navbar" class="nav-glyphish-example" data-grid="b">
			<ul>
				<li><a href="index.php" id="home" data-icon="custom">Home</a></li>
				<li><a href="#" id="key" data-icon="custom">Blank</a></li>
				<li><a href="set.php" id="map" data-icon="custom" class="ui-btn-active">Set</a></li>
				
			</ul>
		</div>
	</div>
</div>
</body>
</html>