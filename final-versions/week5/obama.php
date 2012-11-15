<!DOCTYPE html> 
<html>

<head>
	<title>VoteCaster | Filter</title> 
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

<div data-role="page" id="filter">

	<div data-role="header">
		<h1>About Obama</h1>
		<a href="index.html" data-icon="check" class="ui-btn-right">Save</a>

	</div><!-- /header -->

	<div data-role="content">	
		<div class="ui-grid-a">
		<div class="ui-block-a"><img width="120" src="images/obama.jpeg" /></div>
		<div class="ui-block-b">
	<p><strong>OCCUPATION</strong>: Lawyer, U.S. President, U.S. Representative</p>
	<p><strong>BIRTH DATE</strong>: August 04, 1961 (Age: 51)</p>
	<p><strong>EDUCATION</strong>: Punahou Academy, Occidental College, Columbia University, Harvard Law School</p>
	<p><strong>PLACE OF BIRTH</strong>: Honolulu, Hawaii</p>
	
</div>	   
	</div>
	
	</div><!-- /content -->

	<div data-role="footer" data-id="samebar" class="nav-glyphish-example" data-position="fixed" data-tap-toggle="false">
		<div data-role="navbar" class="nav-glyphish-example" data-grid="c">
		<ul>
			<li><a href="index.php" id="home" data-icon="custom">Home</a></li>
			<li><a href="login.php" id="key" data-icon="custom">Login</a></li>
			<li><a href="filter.php" id="map" data-icon="custom">Filter</a></li>
			<li><a href="settings.php" id="gear" data-icon="custom" class="ui-btn-active">Settings</a></li>
		</ul>
		</div>
	</div>
	
	<script type="text/javascript">
		$('#filter').live( 'pageinit',function(event){
			$(".taphold").on('taphold', function(event){
				alert("You tapped and held");
			});
			
			$(".tap").on('tap', function(event){
				alert("You tapped!");
			});
			
			$(".swiperight").on('swiperight', function(event){
				event.stopImmediatePropagation();
				alert("You swiped right!");
			});
			
			$(".swipeleft").on('swipeleft', function(event){
				event.stopImmediatePropagation() 
				alert("You swiped left!");
			});
		});
</script>	
</div><!-- /page -->


</body>
</html>