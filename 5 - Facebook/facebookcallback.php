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

    $app_id = "226220960740488";
    $app_secret = "70e83ac8b97e0cb3d62857a833fcc8b";
    
    $code = $_GET["code"];
	$error = $_GET["error_reason"];
	if ($error == "user_denied") {
		?>
			<p>I'm sorry you weren't interested in using Facebook.</p>
			
				
	
		<?php
		
	} else {

    $token_url = "https://graph.facebook.com/oauth/access_token?type=web_server&client_id="
        . $app_id . "&redirect_uri=http://www.site.com/facebookcallback.php&client_secret="
        . $app_secret . "&code=" . $code;

    $access_token = file_get_contents($token_url);

	$_SESSION['accesstoken'] = $access_token;
	$_SESSION['code'] = $code;
 	$_SESSION["facebook"] = "true";
		?>
		
	You can now access your friends' shared links using your browser or the plugin.
		<?php
		
	    } ?>
