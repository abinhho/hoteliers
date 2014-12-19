<div class='ad_images_left_col'>
<?php  
foreach ($items as $row){
	
	echo "<a href = '{$row['hyperlink']}' title = '{$row['tieu_de']}'>";
	echo $this->lib_media->show($row['images'], $row['width'], $row['height'] , "alt='{$row['tieu_de']}'");
	echo "</a>";
}
?>
</div>