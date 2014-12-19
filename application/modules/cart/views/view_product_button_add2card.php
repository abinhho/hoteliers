<?php
$lists = preg_split("/,/", $images);
$img = $this->lib_media->show_crop("products" , $lists[0], 50, 50);
?>
<div class="mod_cart view_product_button_add2card after">
	<input class="qty" type="text" value = "1" />
	<a class="button" href="javascript:void(0)" onclick="return CART.add2cart({id:<?php echo $ID?>, name:'<?php echo $tieu_de?>',qty:$('input.qty').val(), price:<?php echo $price?>,images: '<?php echo $img; ?>' ,base_url:'<?php echo base_url() ?>',url:'<?php echo $this->lib_url->getUrl()?>'})" >Mua hàng</a>
</div>