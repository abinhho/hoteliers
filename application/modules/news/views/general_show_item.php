<?php 
$link = $this->lib_menu->make_link(array($catid => "") , array($ID => $tieu_de) );
$hinh_anh = $this->lib_media->show_crop("news" ,$images, 80, 80);
?>
<li class="after" itemscope itemtype="<?php echo $link;?>">

    <?php if($images){ ?>
	<a href="<?php echo $link; ?>"><img border="0" class="main"  alt="<?php echo $tieu_de; ?>" src="<?php echo $hinh_anh ; ?>"></a>
	<?php } ?>
	<div class="right">
        <a title="<?php echo $tieu_de; ?>" class="hover_color block" href="<?php echo $link; ?>">
		<?php echo $tieu_de; ?></a>
		<div class="info_news after">
			<span class="date"><?php  echo $this->lib_date->ago($date_upd); ?></span>
			<font>|</font> <span class="font11"><?php echo $viewed_times; ?> lượt xem</span>
		</div>
		<div class="nd"><?php echo $description; ?>
			<a class="view_more italic main_color" href="<?php echo $link; ?>">Xem chi tiết</a>
		</div>
	</div>
</li>