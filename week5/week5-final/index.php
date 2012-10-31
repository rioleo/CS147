<?php
session_start();
?>
<!DOCTYPE html> 
<html>

<head>
	<title>VoteCaster</title> 
	<meta charset="utf-8">
	<meta name="apple-mobile-web-app-capable" content="yes">
 	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 


	<link rel="stylesheet" href="jquery.mobile-1.2.0.css" />
    <link rel="stylesheet" href="themes/democrat.css" />

	<link rel="stylesheet" href="style.css" />
	<link rel="apple-touch-icon" href="appicon.png" />
	<link rel="apple-touch-startup-image" href="startup.png">
	
	<script src="jquery-1.8.2.min.js"></script>
	<script src="jquery.mobile-1.2.0.js"></script>

</head> 

	
<body> 

<!-- Start of first page: #one -->
<div data-role="page" id="one">

	<div data-role="header">
		<h1>Multi-Page</h1>
	</div><!-- /header -->

	<div data-role="content">	
		<h2>Welcome <span id="username"></span></h2>
		<span id="tzcd"></span>
		<p>The neat thing about this example is that you can swipe right and left to navigate between pages, and you can also see in the code that the entire three page sequence within here is bundled into one page.</p>	

		<h3>Show internal pages:</h3>
		<p><a href="#two" data-role="button">Show page "two"</a></p>	
		<p><a href="#popup" data-role="button" data-rel="dialog" data-transition="pop">Show page "popup" (as a dialog)</a></p>
	</div><!-- /content -->
	
	<div data-role="footer" data-id="samebar" class="nav-glyphish-example" data-position="fixed" data-tap-toggle="false">
		<div data-role="navbar" class="nav-glyphish-example" data-grid="c">
			<ul>
				<li><a href="index.php" id="home" data-icon="custom" class="ui-btn-active">Home</a></li>
				<li><a href="login.php" id="key" data-icon="custom">Login</a></li>
				<li><a href="filter.php" id="map" data-icon="custom">Filter</a></li>
				<li><a href="settings.php" id="gear" data-icon="custom">Settings</a></li>
			</ul>
		</div>
	</div>

<script type="text/javascript">
// ****  Time Zone Count Down Javascript  **** //
/*
Visit http://rainbow.arch.scriptmania.com/scripts/
 for this script and many more
*/

////////// CONFIGURE THE COUNTDOWN SCRIPT HERE //////////////////

var month = '11';     //  '*' for next month, '0' for this month or 1 through 12 for the month 
var day = '6';       //  Offset for day of month day or + day  
var hour = 0;        //  0 through 23 for the hours of the day
var tz = -8;         //  Offset for your timezone in hours from UTC
var lab = 'tzcd';    //  The id of the page entry where the timezone countdown is to show



////////// DO NOT EDIT PAST THIS LINE //////////////////

function setTZCountDown(month,day,hour,tz) 
{
var toDate = new Date();
if (month == '*')toDate.setMonth(toDate.getMonth() + 1);
else if (month > 0) 
{ 
if (month <= toDate.getMonth())toDate.setYear(toDate.getYear() + 1);
toDate.setMonth(month-1);
}
if (day.substr(0,1) == '+') 
{var day1 = parseInt(day.substr(1));
toDate.setDate(toDate.getDate()+day1);
} 
else{toDate.setDate(day);
}
toDate.setHours(hour);
toDate.setMinutes(0-(tz*60));
toDate.setSeconds(0);
var fromDate = new Date();
fromDate.setMinutes(fromDate.getMinutes() + fromDate.getTimezoneOffset());
var diffDate = new Date(0);
diffDate.setMilliseconds(toDate - fromDate);
return Math.floor(diffDate.valueOf()/1000);
}
function displayTZCountDown(countdown,tzcd) 
{
if (countdown < 0) document.getElementById(tzcd).innerHTML = "Sorry, you are too late."; 
else {var secs = countdown % 60; 
if (secs < 10) secs = '0'+secs;
var countdown1 = (countdown - secs) / 60;
var mins = countdown1 % 60; 
if (mins < 10) mins = '0'+mins;
countdown1 = (countdown1 - mins) / 60;
var hours = countdown1 % 24;
var days = (countdown1 - hours) / 24;
document.getElementById(tzcd).innerHTML = days + " day" + (days == 1 ? '' : 's') + ' + ' +hours+ 'h : ' +mins+ 'm : '+secs+'s remaining until Election Day!';
setTimeout('displayTZCountDown('+(countdown-1)+',\''+tzcd+'\');',999);
}
}
$('#one').live( 'pageshow',function(event){
	displayTZCountDown(setTZCountDown(month,day,hour,tz),lab);
});
</script>

</div>
	
</div><!-- /page one -->


<!-- Start of second page: #two -->
<div data-role="page" id="two" data-add-back-btn="true">

	<div data-role="header">
		<h1>Two</h1>
	</div><!-- /header -->

	<div data-role="content">	
		<h2>Two</h2>
		<p>I have an id of "two" on my page container. I'm the second page container in this multi-page template.</p>	
		<p>Notice that the theme is different for this page because we've added a few <code>data-theme</code> swatch assigments here to show off how flexible it is. You can add any content or widget to these pages, but we're keeping these simple.</p>	
		<p><a href="#one" data-direction="reverse" data-role="button" data-theme="b">Back to page "one"</a></p>	
		
	</div><!-- /content -->
	
	<div data-role="footer" data-id="samebar" class="nav-glyphish-example" data-position="fixed" data-tap-toggle="false">
		<div data-role="navbar" class="nav-glyphish-example" data-grid="c">
		
		<ul>
			<li><a href="index.php" id="home" data-icon="custom">Home</a></li>
			<li><a href="login.php" id="key" data-icon="custom" class="ui-btn-active">Login</a></li>
			<li><a href="filter.php" id="map" data-icon="custom">Filter</a></li>
			<li><a href="settings.php" id="gear" data-icon="custom">Settings</a></li>
		</ul>
		</div>
	</div>
</div>
</div><!-- /page two -->


<!-- Start of third page: #popup -->
<div data-role="page" id="popup">

	<div data-role="header" data-theme="e">
		<h1>Dialog</h1>
	</div><!-- /header -->

	<div data-role="content" data-theme="d">	
		<h2>Popup</h2>
		<p>I have an id of "popup" on my page container and only look like a dialog because the link to me had a <code>data-rel="dialog"</code> attribute which gives me this inset look and a <code>data-transition="pop"</code> attribute to change the transition to pop. Without this, I'd be styled as a normal page.</p>		
		<p><a href="#one" data-rel="back" data-role="button" data-inline="true" data-icon="back">Back to page "one"</a></p>	
	</div><!-- /content -->
	
	<div data-role="footer" data-id="samebar" class="nav-glyphish-example" data-position="fixed" data-tap-toggle="false">
		<div data-role="navbar" class="nav-glyphish-example" data-grid="c">
		<ul>
			<li><a href="index.php" id="home" data-icon="custom">Home</a></li>
			<li><a href="login.php" id="key" data-icon="custom">Login</a></li>
			<li><a href="filter.php" id="map" data-icon="custom" class="ui-btn-active">Filter</a></li>
			<li><a href="settings.php" id="gear" data-icon="custom">Settings</a></li>
		</ul>
		</div>
	</div>
</div>
</div><!-- /page popup -->

<script type="text/javascript">
// This handles all the swiping between each page. You really
// needn't understand it all.
$(document).on('pageshow', 'div:jqmData(role="page")', function(){

     var page = $(this), nextpage, prevpage;
     // check if the page being shown already has a binding
      if ( page.jqmData('bound') != true ){
            // if not, set blocker
            page.jqmData('bound', true)
            // bind
                .on('swipeleft.paginate', function() {
                    console.log("binding to swipe-left on "+page.attr('id'));
                    nextpage = page.next('div[data-role="page"]');
                    if (nextpage.length > 0) {
                       $.mobile.changePage(nextpage,{transition: "slide"}, false, true);
                        }
                    })
                .on('swiperight.paginate', function(){
                    console.log("binding to swipe-right "+page.attr('id'));
                    prevpage = page.prev('div[data-role="page"]');
                    if (prevpage.length > 0) {
                        $.mobile.changePage(prevpage, {transition: "slide",
	reverse: true}, true, true);
                        };
                     });
            }
        });

</script>

</body>
</html>