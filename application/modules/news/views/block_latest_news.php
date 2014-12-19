<div class="mod_news block_white block_small_img_news">
<?php echo $this->lib_blocks->info_block('block_latest_news'); ?>
<div class="contents_bg padding">
<ul>
<?php foreach($items as $row){ 
	$link = $this->lib_menu->make_link(array($row['catid'] => "") , array($row['ID'] => $row['tieu_de']) );
	$hinh_anh = $this->lib_media->show_crop("news" ,$row['images'], 50, 50);
 ?>
<li class="after">
<a href="<?php echo $link; ?>">
	<img border="0" class="main"  alt="<?php echo $row['tieu_de']; ?>" src="<?php echo $hinh_anh ; ?>">
</a>
<a href="<?php echo $link; ?>"><?php echo $row['tieu_de']; ?></a>
<span class='gray'><?php echo $this->lib_date->ago($row['date_upd'])?></span></li>
<?php } ?>
</ul>
</div>
</div>
