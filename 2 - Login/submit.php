<?php
session_start();
include("config.php");

$username = mysql_real_escape_string($_POST['username']);
$password = md5(mysql_real_escape_string($_POST['password']));

if (!isset($username) || !isset($password)) {

    header("Location: sorry.html");
    
}

elseif (empty($username) || empty($password)) {
	
    header("Location: sorry.html");
    
} else {
	
    $result   = mysql_query("select * from users where username='$username' AND password='$password'");
    $rowCheck = mysql_num_rows($result);
    if ($rowCheck > 0) {
        while ($row = mysql_fetch_array($result)) {

            $_SESSION['id'] = $row['username'];
  
        }
        
        header("Location: okay.html");
        
    } else {
        header("Location: sorry.html");
    }
}

?> 