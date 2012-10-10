<h2>Most basic</h2>

<?php

echo "Hello World";

?>

<h2>Variations on a Theme</h2>

<?php

$hello = "Hello";
$world = "World";
echo $hello." ".$world;

?>

<h2>Mistaken Variation on a Theme</h2>

<?php

$hello = "Hello";
$world = "World";

echo $hello+$world;

?>

<h2>Another Variation on a Theme</h2>

<?php

$message = "Hello World";
echo $message;

?>

<h2>More Variations on a Theme</h2>

<?php
function HelloWorld() {
	return "Hello World";	
}

echo HelloWorld();

?>

<h2>More More Variations on a Theme</h2>

<?php
function HelloWorld2() {
	echo "Hello World";	
}

HelloWorld2();

?>

<h2>Some nice PHP functions</h2>

<?php

function HelloWorld3($string) {
	echo strtolower($string);
}

HelloWorld3("Hello World");


?>


<h2>More convoluted variants</h2>

<?php

function HelloWorld4() {
	// Split a string and create an array
	// Then piece it back together
	$string  = "Hello World";
	
	// This is now an array
	$pieces = explode(" ", $string);
	echo $pieces[0]." ".$pieces[1];
}

HelloWorld4();


?>

<h2>The opposite of the one above</h2>

<?php

function HelloWorld6() {
	$array = array('Hello', 'World');
	$add_space = implode(" ", $array);
	echo $add_space;
}

HelloWorld6();


?>

