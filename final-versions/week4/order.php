<!DOCTYPE html>
<html>
	<head>
		<title>Maya Online Books</title>
		<link rel="apple-touch-icon" href="appicon.png" />
		<link rel="apple-touch-startup-image" href="startup.png">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta name="viewport" content="width=device-width, user-scalable=no" />
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="chosen/chosen.css" />
		<script src="chosen/chosen.jquery.js" type="text/javascript"></script>

	</head>

	<body>


		<div class="banner"></div>
			<?php
				include("menu.php");
			?>
			
		<div id="result"></div>
		
		<div class="orderarea">
		<!-- This is where we'll put our form -->
		<form action="submit.php" id="someform" method="post">
		    <label>Name: <input class="forminput" type="text" name="name1" /></label>
		    <label>Email: <input class="forminput" type="text" name="email" autocapitalize="off" /></label>
		
		
		<select name="book">
		<?php
		include("config.php");
		$query = "SELECT * FROM books";
		$result = mysql_query($query);
		while ($row = mysql_fetch_assoc($result)) {
		
		    echo "<option value='".$row["asin"]."'>".$row["title"]."</option>";
		
		}
		?>
		</select>
		
		<input type="submit" class="medium red awesome" value="Order &raquo;" />
		
		</form>
		
		</div>
			

  <script type="text/javascript">
  $(".chzn-select").chosen();
  </script> 
  <script type="text/javascript">
		$("a").click(function (event) {
		    event.preventDefault();
		    window.location = $(this).attr("href");
		});
		$("#someform").submit(function() {
			event.preventDefault();
			$.post("submit.php", $("#someform").serialize(), function(data) {
				$("#result").html(data);
			});
		});
  </script>
 
	</body>
</html>