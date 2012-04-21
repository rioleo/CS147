<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Some Site</title>
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
</head> 
<body> 

<?php
include 'EpiCurl.php';
include 'EpiOAuth.php';
include 'EpiTwitter.php';
include 'twittersecret.php';

$_SESSION["twitter"] = "true";
$twitterObj = new EpiTwitter($consumer_key, $consumer_secret);

$twitterObj->setToken($_GET['oauth_token']);
$token = $twitterObj->getAccessToken();
$_SESSION["oauthtoken"] = $token->oauth_token;
$_SESSION["oauthtokensecret"] = $token->oauth_token_secret;

$twitterObj->setToken($token->oauth_token, $token->oauth_token_secret);
$twitterInfo= $twitterObj->get_accountVerify_credentials();
$twitterInfo->response;
//echo "Your twitter username is {$twitterInfo->screen_name} and your profile picture is <img src=\"{$twitterInfo->profile_image_url}\">";
//$status=$twitterObj->post_statusesUpdate(array('status'=>'OneTwoThree'));
//$status->response;


?>

You can now access your friends' shared links using your browser or the plugin.

</body>
</html>
