<?php if(count($items) >0) { ?>
<div class='ad_images_body'>
<?php $this->lib_media->media_folder = base_url("images/ad_images");
foreach ($items as $row){
	
	echo "<a href = '{$row['hyperlink']}' title = '{$row['tieu_de']}'>";
	echo $this->lib_media->show($row['images'], $row['width'], $row['height'] , "alt='{$row['tieu_de']}'");
	echo "</a>";
}
?>
</div>
<?php } ?>