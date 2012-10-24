<?php
// A malicious user would be hard-pressed to compromise
// a user's password with crypt because crypt is a one-way
// function, and the malicious user would also need to guess
// the salt, which can be set on an individual-user basis.
$salt = "kr";

// This saved_password would be saved in the database.
$saved_password = crypt('mypassword', $salt); 
echo "<p>The saved password is: ".$saved_password."</p>";

$username = $_POST["username"];
$entered_password = $_POST["password"];

echo "<p>The user sent a username of: ".$username ."</p>";
echo "<p>The user sent a password of: ".$entered_password."</p>";

// We check the user-entered password against the one
// saved and retrieved above. If it matches, the user is logged in.
if (crypt($entered_password, $salt) == $saved_password) {
   echo "Password verified!";
}

echo "<p><a href='index.php'>Go back</a></p>";

?>

<script src="https://gist.github.com/3937494.js?file=login.php"></script>