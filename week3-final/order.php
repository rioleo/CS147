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
		

	</head>

	<body>
	
		<div class="banner"></div>
		<?php
		include("menu.php");
		?>
		
		<div class="orderarea">
			<form action="submit.php" method="post">
			<label>Name: <input class="forminput" type="text" name="name" /></label>
			
			<label>Email: <input class="forminput" type="text" name="email" /></label>
			
			<select class="chzn-select" name="book">
			<?php
			include("config.php");
			$query = "SELECT * FROM books";
			$result = mysql_query($query);
			while ($row = mysql_fetch_assoc($result)) {
				// How many books have been ordered?
				$query2 = "SELECT count(*) as count FROM orders where book = '".$row["asin"]."'";
				$result2 = mysql_query($query2);
				$row2 = mysql_fetch_assoc($result2);
				if ($row["inventory"] - $row2["count"] > 0) {
					echo "<option value='".$row["asin"]."'>".$row["title"]."</option>";
				}
			}
			?>
			
			</select>
			
			<input type="submit" class="medium red awesome" value="Order &raquo;" />
			
			
			</form>
		</div>
			
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
  <script src="chosen/chosen.jquery.js" type="text/javascript"></script>
  <script type="text/javascript">
  $(".chzn-select").chosen();
  </script> 
  <script type="text/javascript">
		$("a").click(function (event) {
		    event.preventDefault();
		    window.location = $(this).attr("href");
		});
		</script>
 
	</body>
</html>