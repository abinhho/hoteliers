<div class='block_ad_images_footer contents_980'>
<?php  
foreach ($items as $row){
	
	echo "<a href = '{$row['hyperlink']}' title = '{$row['tieu_de']}'>";
	echo $this->lib_media->show($row['images'], $row['width'], $row['height'] , "alt='{$row['tieu_de']}'");
	echo "</a>";
}
?>
</div>