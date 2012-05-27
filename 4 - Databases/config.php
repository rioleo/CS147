<?php
$dbHost = "";
$dbUser = "";
$dbPass = "";
$dbDatabase = "";
$db = mysql_connect("$dbHost", "$dbUser", "$dbPass") or die ("Error connecting to database.");
$db_found = mysql_select_db("$dbDatabase", $db) or die ("Couldn't select the database.");
?>