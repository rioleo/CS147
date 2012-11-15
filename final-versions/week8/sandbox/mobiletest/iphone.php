<html>
<head>

<title>iPhone Web Simulator</title>
<style>
body {
	overflow:hidden;
	
	margin:0 auto;
	background:#424242;
  font-family: Calibri, 'Gill Sans', 'Gill Sans MT', 'Lucida Grande', Lucida, Verdana, sans-serif;
}
h1 {
  color: #990000;
  font-size: 150%;
}
td {
 vertical-align: top;
  background-color: #dddddd;
  padding: 5px;
}
#iphone {
	margin-top:-80px;
	position:fixed;
	background:url("phone.jpg");
	width:507px;
	height:855px;	
}
#iphone1 {
	margin-top:-80px;
	
	background:url("phone.jpg");
	width:507px;
	height:855px;	
	position:fixed;
}
#iphone2 {
	margin-top:-80px;
	position:fixed;
	background:url("phone.jpg");
	width:507px;
	height:855px;
	margin-left:450px;
}

.if {
	margin-left:85px;
	-moz-box-shadow: inset -5px -5px 5px 5px #888;
-webkit-box-shadow: inset -5px -5px 5px 5px#888;
box-shadow: inset -5px -5px 5px 5px #888;
	margin-top:167px;
}
.black2 {
	width:18px;
	height:481px;
	background:#000;
	position:absolute;
	margin-left:856px;
	margin-top:86px;
	background:url("black.jpg");
}
.black {
	width:18px;
	height:481px;
	background:#000;
	position:absolute;
	margin-left:405px;
	margin-top:86px;
	background:url("black.jpg");
}
</style>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
</head>


<body>

<?php if(!isset($_GET["count"])) {
	?>
<div id="iphone">
<iframe class="if" id="if" src="http://<?php echo $_GET["url"]; ?>" width="335" height="480" frameborder="0"></iframe></div>
<div class="black"></div>
<?php } else { ?>
<div id="iphone1">
<iframe class="if" id="if" src="http://<?php echo $_GET["url1"]; ?>" width="335" height="480" frameborder="0"></iframe></div>
<div class="black"></div>
</div>
<div id="iphone2">
<iframe class="if" id="if" src="http://<?php echo $_GET["url2"]; ?>" width="335" height="480" frameborder="0"></iframe></div>
<div class="black2"></div>
</div>
<script type="text/javascript">

</script>
<?php } ?>
</body>
</html>