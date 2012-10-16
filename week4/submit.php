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
	</head>

	<body>
	
		<div class="banner"></div>
		<?php
		include("menu.php");
		?>
		
		<div class="orderarea">
		<?php
		
			include("config.php");
			function sendmail($email, $name, $title)
			{
			    
			    $to      = $email;
			    $subject = 'Maya Order Confirmation';
			    $message = 'Hello '.$name.',<br /><br />This email is to confirm your order for the following book from Maya:<br /><br /><strong>'.$title.'</strong><br /><br />Please wait for the next update email which will contain shipping information.';
			    $headers = 'From: Maya Book Service <info@mayabooks.com>' . "\r\n" .
			    'MIME-Version: 1.0' . "\r\n" .
			    'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
			    'Reply-To: Maya Book Service <mayabooks@mayabooks.com>' . "\r\n" .
			    'X-Mailer: PHP/' . phpversion();
			    
			    mail($to, $subject, $message, $headers);
			    
			}
			
			// Take in parameters
			$name = $_POST["name"];
			$book = $_POST["book"];
			$email = $_POST["email"];
			$t = time();
			
			// Insert into orders
			// but oops query is not defined... yet
			
			$query = "";
			
			$result = mysql_query($query);
			
			if ($result) {
				// What do the following lines do? Answer -> #1
				$query2 = "SELECT * from books where asin = '".$book."'";
				$result2 = mysql_query($query2);
				$row2 = mysql_fetch_assoc($result2);
				sendmail($email, $name, $row2["title"]);
				echo "<p>Thank you for ordering a book. Please check your email for further instructions.</p>";
					
			}
			
			
			?>
		</div>
		<script type="text/javascript">
		$("a").click(function (event) {
		    event.preventDefault();
		    window.location = $(this).attr("href");
		});
		</script>
	</body>
</html>