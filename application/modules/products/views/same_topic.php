<div class="mod_products show_items same_topic">
<div class="after"><h5 class="cata  nice_title"><span><?php echo __("Các sản phẩm khác")?></span></h5></div>
<ul>
<?php foreach($items_same_topic as $row){ 
    $this->load->view('general_show_item', $row);
} ?>
</ul>
</div>
