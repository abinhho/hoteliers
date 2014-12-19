<?php 
$hinh_anh = $this->lib_media->show_crop("questions" ,$images, 160, 120);
?>
<li class="after" itemscope itemtype="<?php echo $link;?>">
<div class="left">
    <div class="col">
        <span class="number"><?php echo $n_votes?></span>
        <span class="text">votes</span>
    </div>
    
    <div class="col ans <?php echo $ans_class ?>">
        <span class="number"><?php echo $n_answers?></span>
        <span class="text">trả lời</span>
    </div>
    
    <div class="col">
        <span class="number"><?php echo $viewed_times?></span>
        <span class="text">xem</span>
    </div>
    
</div>

<div class="right">
<a class="title f_font1" href="<?php echo $link ?>"><?php echo $tieu_de ?></a>
<div class="user_info">
    <span class="gray"><?php echo $this->lib_date->ago($date_edit)?></span>
    <a href="<?php echo base_url('user/'.$user_id)?>" class="pd_0_10"><?php echo $user_full_name ?></a>
    <span title="Danh tiếng" class="danhtieng"><?php echo number_format($user_score)?></span>
</div>
<div class="tags"><?php echo $this->lib_seo->create_tag($tags_id)?></div>
</div>	
</li>