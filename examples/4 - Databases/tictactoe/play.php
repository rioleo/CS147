<!DOCTYPE html>
<html>
	<head>
		<title>Tic Tac Toe for CS147</title>
		<link rel="apple-touch-icon" href="appicon.png" />
		<link rel="apple-touch-startup-image" href="startup.png">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta name="viewport" content="width=device-width, user-scalable=no" />
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="./github-buttons/gh-buttons.css"> 

	</head>

<body>

<div class="banner"></div>

<p>Your opponent should be using <a href="http://stanford.edu/~rakasaka/cgi-bin/cs147/tictactoe/play.php?game=<?=$_GET["game"]?>&player=<?=$_GET["against"]?>&against=<?=$_GET["player"]?>&ch=<?php if ($_GET["ch"] == 'o') { 
echo "x"; } else { echo "o"; } ?>">this URL</a></p>
<div class="tictac">
	<div class="row" id="row1">
		<div class="box col1" id="11"></div>
		<div class="box col2" id="12"></div>
		<div class="box col3" id="13"></div>
	</div>
	<div class="row" id="row2">
		<div class="box col1" id="21"></div>
		<div class="box col2" id="22"></div>
		<div class="box col3" id="23"></div>
	</div>
	<div class="row" id="row3">
		<div class="box col1" id="31"></div>
		<div class="box col2" id="32"></div>
		<div class="box col3" id="33"></div>
	</div>
</div>

<div class="s">
	
	<a class="button danger icon trash" id="clear">Clear this game</a>
	<a class="button icon loop" id="random">Random game</a>

</div>

<script type="text/javascript">
	// What happens when you click on a box?
	$(".box").click(function() {
		$(this).html("<?=$_GET["ch"]?>");
		$.post("savemove.php", {game:<?=$_GET["game"]?>, player:<?=$_GET["player"]?>,against:<?=$_GET["against"]?>, move: $(this).attr("id"), ch: '<?=$_GET["ch"]?>'}, function(data) {
				
		});
	});
	
	// This runs getData every second. Somewhat subideal, but functional.
	function timedCount()
	{
		$.get("getData.php", {player:<?=$_GET["player"]?>,against:<?=$_GET["against"]?>}, function(data) {
			eval(data);
		});
		t=setTimeout("timedCount()",1000);
	}
	
	// Clear all of the existing game
	$("#clear").click(function() {
		$.post("clear.php", {player:<?=$_GET["player"]?>,against:<?=$_GET["against"]?>}, function(data) {
			alert("Cleared!");
		});
	});
	
	// Choose a random game to play
	$("#random").click(function() {
		window.location="http://stanford.edu/~rakasaka/cgi-bin/cs147/tictactoe/play.php?game=<?=mt_rand(1, 100);?>&player=<?=mt_rand(101, 200);?>&against=<?=mt_rand(1, 100);?>&ch=o";
	});
	
	// Kick off the timer
	t=setTimeout("timedCount()",1000);
</script>
</body>
</html>