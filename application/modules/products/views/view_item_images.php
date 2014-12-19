<?php
$this->lib_media->media_folder = base_url("images/products");
echo $this->lib_media->show($images, 400, '', "alt = '{$tieu_de}' title = '{$tieu_de}'"); ?>
<div class="list_images_crop">
<?php $lists = preg_split("/,/", $images); 
foreach ($lists as $img) { 
    $full = base_url('images/products/'.$img);
	echo "<a href ='{$full}' rel='lightbox[products]' ><img alt = '{$tieu_de}' src = '{$this->lib_media->show_crop("products" , $img, 50, 50)}'></a>";

} ?> 
</div>