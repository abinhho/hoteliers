<div class="block_products_in_slider_image" >
<h6 class="title">Sản phẩm nổi bật</h6>
<ul id="block_products_in_slider_image">
<?php 
$k = 0;
foreach ($items as $i => $row) {
    
    $k ++;
    if(($i == 0 || $i%2 == 0) )
    {
        echo "<div class='each'>";
    }
     
    $link = $this->lib_menu->make_link(array($row['catid'] => "") , array($row['ID'] => $row['tieu_de'] ) );
    $hinh_anh = $this->lib_media->show_crop("products" ,$row['images'], 70, 70);
?>
<li class="after">
    <?php if($row['images']){ ?>
    <p class='image'><a class = "img_small" href="<?php echo $link; ?>"><img border="0" class="thumb"  alt="<?php echo $row['tieu_de']; ?>" 
    src="<?php echo $hinh_anh ; ?>"></a>
    <?php if($row['discount'] > 0){ ?>
    <span class='per_off'>-<?php echo $row['discount']?>%</span>
    <?php } ?>
    </p>
    <?php } ?>
    <div class="other_info">
        <p class="tieu_de">
            <a title="<?php echo $row['tieu_de']; ?>" class="hover_color block" href="<?php echo $link; ?>">
            <?php echo $row['tieu_de']; ?></a>
        </p>
        <span class="block price"><?php echo $this->lib_convert->price($row['price'], 'VND'); ?></span>
        <span class="block old_price"><?php echo $this->lib_convert->price($row['old_price'], 'VND'); ?></span>     
    </div>
</li> 
    
<?php

    if($k == 2 || $i == (count($items) -1) )
    {
        echo "</div>"; 
        $k = 0;
    }
 
} ?>
</ul>

<div class="nav_next_prev">
<span class="prev"></span>
<span class="next"></span>
</div>

</div>



<script type="text/javascript">
$(window).load(function() {
    $('#block_products_in_slider_image').cycle({ 
        fx:      'turnDown', 
        timeout:  4000, 
        next: '.block_products_in_slider_image .next',
        prev: '.block_products_in_slider_image .prev',
        //easing:  'easeInOutBack' 
    });
});
</script>