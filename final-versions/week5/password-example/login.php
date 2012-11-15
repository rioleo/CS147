<?php
session_start();

echo "<p>The user sent a username of: ".$_POST["username"]."</p>";
echo "<p>The user sent a password of: ".$_POST["password"]."</p>";
echo "<p>The <a href='http://www.md5hasher.net/'>md5 hash</a> of the password is: ".md5($_POST["password"])."</p>";
echo "<p><a href='index.php'>Go back</a></p>";
$_SESSION["username"] = $_POST["username"];
?>

<script src="https://gist.github.com/3937494.js?file=login.php"></script>