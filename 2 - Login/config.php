<?php
$host = "p41mysql141.secureserver.net";
$user = "inwedayforum";
$pass = "Alohario1005";
$mysql_database = "inwedayforum";

$link = mysql_connect($host, $user, $pass);
if (!$link) {
    die('Not connected : ' . mysql_error());
}

// Connect to the database
$db_selected = mysql_select_db($mysql_database, $link);
if (!$db_selected) {
    die ('Can\'t use to connect to database : ' . mysql_error());
}
?>