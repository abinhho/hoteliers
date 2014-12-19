<br />
<div class="mod_alnums block_white block_small_img">
<?php echo $this->lib_blocks->info_block('block_newest_albums'); ?>
<div class="contents_bg padding">
<ul>
<?php foreach($items as $row){ 
	$link = $this->lib_menu->make_link(array($row['catid'] => "") , array($row['ID'] => $row['tieu_de']) );
	$hinh_anh = $this->lib_media->show_crop("albums" ,$row['images'], 50, 50);
 ?>
<li class="after">
<a href="<?php echo $link; ?>">
	<img border="0" class="main"  alt="<?php echo $row['tieu_de']; ?>" src="<?php echo $hinh_anh ; ?>">
</a></li>
<?php } ?>
</ul>
</div>
</div>
