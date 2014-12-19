<?php 

$img_w = (isset($img_w)) ? $img_w : 315;
$img_h = (isset($img_h)) ? $img_h :315;

$link = $this->lib_menu->make_link(array($catid => "") , array($ID => $alias) );
$hinh_anh = $this->lib_media->show_crop("products" ,$images, $img_w, $img_h);
?>
<li class="after" itemscope itemtype="<?php echo $link;?>">
	
	<p class='image'><a class="img_small" href="<?php echo $link; ?>">
	<img border="0" class="main lazy"  alt="<?php echo $tieu_de; ?>"	data-original="<?php echo $hinh_anh ; ?>"></a></p>
    
    <p class="hidden_info">Giao hàng tận nơi miễn phí</p>
	
	<div class="other_info">        
		<a class="title" title="<?php echo $tieu_de; ?>" class="hover_color block" href="<?php echo $link; ?>"><?php echo $tieu_de; ?></a>
        <p>
        <span class="price"><?php echo $this->lib_convert->price($price, '')?> <i>đ</i></span>
        <?php if($old_price){ ?>
        <span class="old_price mg_left_10"><?php echo $this->lib_convert->price($old_price, '')?> <i>đ</i></span>
        <?php } ?>
        <span class="bought">Đã mua: <strong><?php echo $bought ?></strong></span>
        </p>
    </div>
	
    <?php
    if($discount > 0)
    { ?>
    <span class="discount_per">-<?php echo $discount?>%</span>
    <?php } ?>
    
</li> 