<script src="jquery.1.4.1.min.js" type="text/javascript"></script> 

<style type="text/css">
.box {
	width:80px;
	height:80px;
	background:#eee;
	font-family:Helvetica Neue, Helvetica, sans-serif;
	border:1px solid #aaa;
	font-weight:300;
	float:left;
	font-size:50px;
	padding:5px;
	text-align:center;
}
.tictac {
	float:left;
	clear:both;
}
.row {
	float:left;
	clear:both;
}
.s {
	padding:10px;
	clear:both;
	float:left;
}
</style>
<body>
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

<div class="s"><input type="button" id="clear" value="Clear this game" /><input type="button" id="random" value="Give me a random game" /></div>

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