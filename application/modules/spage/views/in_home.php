<div class="mod_spage in_home after">
<div class="info_block"><h6 align="center"><?php echo SHORT_DESCRIPTION ;?></h6></div><br/>
<div class="contents_bg padding">
<ul>
<?php foreach($items as $row){ 
	$link = $this->lib_menu->make_link(array("spage" => "") , array($row['ID'] => $row['tieu_de']) );
	$hinh_anh = $this->lib_media->show_crop("spage" ,$row['images'], 200, 120); 
 ?>
<li class="after">
<a href="<?php echo $link; ?>">
	<img border="0" class="main"  alt="<?php echo $row['tieu_de']; ?>" src="<?php echo $hinh_anh ; ?>">
</a>
<a href="<?php echo $link; ?>"><?php echo $row['tieu_de']; ?></a>
<p><?php echo $row['description']; ?></p>
</li>
<?php } ?>
</ul>
</div>
</div>
