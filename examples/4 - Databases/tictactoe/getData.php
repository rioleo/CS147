<?php
include("config.php");
echo "$('.box').html('');";
$result = mysql_query("select * from tictactoe where ((player = '".$_GET["player"]."' and against = '".$_GET["against"]."') or (player = '".$_GET["against"]."' and against = '".$_GET["player"]."'))");

while ($row = mysql_fetch_assoc($result)) {

	echo "$('#".$row["move"]."').html('".$row["ch"]."');";
}


?>