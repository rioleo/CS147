<?php
include("config.php");

$result = mysql_query("delete from tictactoe where player = '".$_POST["player"]."' and against = '".$_POST["against"]."'");
$result = mysql_query("delete from tictactoe where player = '".$_POST["against"]."' and against = '".$_POST["player"]."'");

?>