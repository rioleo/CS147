<style type="text/css">
.blue {
	color:blue;
	font-weight:bold;
}
body {
	font-family:Helvetica;
}
</style>

<body>
<?php

echo "<p>Your message is, parsed using GET, is: <span class='blue'>".$_GET["message"]."</span></p>";
echo "<p>Your message is, parsed using POST, is: ".$_POST["message"]."</p>";

?>
</body>