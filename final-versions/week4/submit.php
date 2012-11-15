
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
			$name = $_POST["name1"];
			$book = $_POST["book"];
			$email = $_POST["email"];
			$t = time();
			
			// Insert into orders
			// but oops query is not defined... yet
			
			$query = "insert into orders (name, email, book) values ('$name', '$email', '$book')";
			
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
		