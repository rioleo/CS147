<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"> 
<head>
<title>CS147 Lecture</title>
<link rel="shortcut icon" href="/favicon.ico" />
<link rel="apple-touch-icon" href="/iphonefav.png" />    
<script src="jquery.1.4.1.min.js" type="text/javascript"></script> 
<link rel="stylesheet" type="text/css" href="style.css" media="screen" />

<body>

<div id="flicked"></div>
<div style="clear:both;"></div>

<script type="text/javascript">
function timedCount()
{
	$.get("flicked.php", {}, function(data) {
		$("#flicked").html(data);
	});
	t=setTimeout("timedCount()",1000);
}

t=setTimeout("timedCount()",1000);
</script>

</body>
</html>