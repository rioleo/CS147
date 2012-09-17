
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"> 
<head> 
	<title>Planner</title>
	<link rel="shortcut icon" href="/favicon.ico" />
	<link rel="apple-touch-icon" href="/iphonefav.png" />
	<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
	<meta name="viewport" content = "width = 1000, initial-scale = 1, user-scalable = no" />   
	<script src="jquery.1.4.1.min.js" type="text/javascript"></script> 
</head>
<body>

<label>Search<input type="text" class="search" /></label>

<button id="btnClear" class="super green button">Clear</button>

<div id="results"></div>
<div style="clear:both;"></div>


<script type="text/javascript">
 $(function() {
 	
 	function reBind() {
	  	$(".movie").click(function() {
		  	$.post("save.php", {img:$(this).find("img").attr("src")}, function(data) {
				//$("#flicked").html(data);
			});
		  });
	  }
   // Magic here to do everything later
	$.get("movies.php", {}, function(data) {
		$("#results").html(data);
		reBind();
	});
	
	$(".search").keyup(function() {
	  	$.get("movies.php", {conditions:$(this).val()}, function(data) {
			$("#results").html(data);
			//reBind();
			reBind();
		});
  });
  
  
});
</script>
</body>
</html>