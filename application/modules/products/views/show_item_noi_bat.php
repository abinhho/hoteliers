<div class="mod_products show_items after">
<h1 class="title"><?php echo $title; ?></h1>
<div class="contents_bg after">
<ul>
<?php foreach ($items as $row) { 
	$row['img_w'] = 160;
	$row['img_w'] = 140;
    $this->load->view("general_show_item", $row);
} ?>
</ul>
</div>
</div>