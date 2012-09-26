<?php
include("config.php");

$result = mysql_query("select * from flicked");
	while($row = mysql_fetch_array($result)) { ?>
		<a href="javascript:void(0);" class="pretty">
		<img src="<?php echo str_replace("large", "ghd", $row["img"]); ?>" style="width: 110px;">
		</a>
<?php } ?>