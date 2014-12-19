<div class="mod_news block_white same_topic">
<div class="after"><h6 class="title">Các bài liên quan khác</h6></div>
<div class="contents_bg">
<ul>
<?php foreach($items_same_topic as $row){ 
	$link = $this->lib_menu->make_link(array($catid => "") , array($row['ID'] => $row['tieu_de']) );
 ?>
<li><a href="<?php echo $link; ?>"><?php echo $row['tieu_de']; ?></a> - 
<span class='gray'><?php echo $this->lib_date->ago($row['date_upd'])?></span></li>
<?php } ?>
</ul>
</div>
</div>
