<div class="block_white block_products_1_column">
<h6 class="title"><?php echo $cata_text;?></h6>
<ul>
<?php foreach ($items as $row) { 
     
    $link = $this->lib_menu->make_link(array($row['catid'] => "") , array($row['ID'] => $row['tieu_de'] ) );
    $hinh_anh = $this->lib_media->show_crop("dia_diem" ,$row['images'], 118, 100);
?>
<li class="after">
    <?php if($row['images']){ ?>
    <p class='image'><a class = "img_small" href="<?php echo $link; ?>"><img border="0" class="main"  alt="<?php echo $row['tieu_de']; ?>" 
    src="<?php echo $hinh_anh ; ?>"></a>
    <span class='per_off'>-<?php echo $row['per_off']?>%</span>
    </p>
    <?php } ?>
    <div class="other_info">
        <p class="tieu_de">
            <a title="<?php echo $row['tieu_de']; ?>" class="hover_color block" href="<?php echo $link; ?>">
            <?php echo $row['tieu_de']; ?></a>
        </p>
        <p><span class='location'><?php echo $row['address']?></span></p>
        
    </div>
    
</li> 
    
<?php 
} ?>
</ul>
</div>