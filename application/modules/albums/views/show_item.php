<div class="mod_albums block_white show_albums_item after">
<h1 class="title"><i class='color_ccc font12'>Chuyên mục:</i> <?php echo $title; ?></h1>

<div class="contents_bg after">
<ul>
<?php foreach ($items as $row) { 
    $this->load->view("general_show_item", $row); 
} ?>
</ul>
</div>
</div>