<?php

session_start(); 
echo "Your session username is: <strong>". $_SESSION["username"]."</strong>";

?>
<form action="login.php" method="post">
	<input type="text" name="username">
	<input type="password" name="password">
	<input type="submit" value="login">
</form>

<script src="https://gist.github.com/3937498.js?file=index.php"></script>