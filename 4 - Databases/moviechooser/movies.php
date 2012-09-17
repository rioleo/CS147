<?php
include("config.php");

$result = mysql_query("select * from movies where title like '%".$_GET["conditions"]."%'");
	while($row = mysql_fetch_array($result)) { ?>
		<a class='movie pretty' href="javascript:void(0);" title="<?php echo $row["title"];?>" class="pretty">
			<img src="<?php echo $row["img"]; ?>" style="height:150px; width: 110px;">
		</a>
<?php } ?>
		