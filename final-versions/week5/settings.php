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
		<h1>Forms</h1>
		<a href="index.html" data-icon="check" class="ui-btn-right">Save</a>

	</div><!-- /header -->

	<div data-role="content">	
	
	
	<form action="submit.php" method="post">
		<div data-role="fieldcontain">
	     <label for="foo">Your name:</label>
	     <input type="text" name="name" id="foo" value=""  />
		</div>
	
		<div data-role="fieldcontain">
		<fieldset data-role="controlgroup">
	    	<legend>Gender:</legend>
	         	<input type="radio" name="gender" id="radio-female" value="f" />
	         	<label for="radio-female">Female</label>
	
	         	<input type="radio" name="gender" id="radio-male" value="m" />
	         	<label for="radio-male">Male</label>
	    </fieldset>
	    </div>
	
		<div data-role="fieldcontain">
		<label for="flip-s">Have you registered to vote?</label>
		<select name="flip-s" id="flip-s" data-role="slider">
			<option value="off">Yes</option>
			<option value="on">No</option>
		</select>
	    </div>
	
		<div data-role="fieldcontain">
			<label for="select-choice-x" class="select">Registered</label>
			<select name="select-shipper" id="select-choice-x" >
				<option></option>
				<option value="standard">Republican</option>
				<option value="rush">Democrat</option>
				<option value="express">Libertarian</option>
				<option value="overnight">Green Party</option>
			</select>
		</div>
		<div class="ui-block-b"><button type="submit" data-theme="a">Submit</button></div>

	</form>
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