
<?php

/*
Last modified May 26, 2012

Register a new consumer at:
https://foursquare.com/oauth/register
*/

$client_id = '';
$client_secret = '';

$latitude = $_GET["latitude"];
$longitude = $_GET["longitude"];

if (!isset($latitude)) {
	$latitude = "40.7";
}
if (!isset($longitude)) {
	$longitude = "-74";
}
?>

<h1>Foursquare API</h1>
<form action="" method="get">
Latitude: <input type="text" name="latitude" id="latitude" value="<?php echo $latitude; ?>" /><br />
Longitude: <input type="text" name="longitude" id="longitude" value="<?php echo $longitude; ?>" />
<input type="submit" value="Submit">
</form>
<hr />
<?php
$url = "https://api.foursquare.com/v2/venues/search?ll=".$latitude.",".$longitude."&client_id=$client_id&client_secret=$client_secret&v=20120526";

echo $url;
$json = json_decode(file_get_contents($url));

?>
<hr />
<?php
foreach ($json->response->venues as $venue) {
	echo $venue->name."<br />";	
}
?>