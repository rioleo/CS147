<?php
include("config.php");

$result = mysql_query("insert into flicked (img) values ('".$_POST["img"]."');");

?>