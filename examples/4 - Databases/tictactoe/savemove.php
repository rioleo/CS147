<?php
include("config.php");

$result = mysql_query("insert into tictactoe values ('".$_POST["game"]."','".$_POST["player"]."','".$_POST["against"]."','".$_POST["move"]."','".$_POST["ch"]."');");
$result = mysql_query("insert into tictactoe values ('".$_POST["game"]."','".$_POST["against"]."','".$_POST["player"]."','".$_POST["move"]."','".$_POST["ch"]."');");
?>