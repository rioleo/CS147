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
$message = $_POST["message"];
$product = implode(",",$_POST["multiple"]);

echo "<p>Message is: ".$message."</p>";
echo "<p>Product: ".$product."</p>";

include("config.php");
$query2 = "insert into data values ('$message', '$product')";
$result2 = mysql_query($query2);

?>
</body>