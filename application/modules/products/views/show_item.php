<div class="mod_products block_whites show_items after">
<h1 class="title"><?php echo $title; ?><span class="desc"><?php echo @$description ?></span></h1>
<div class="after">

<?php $this->load->view("ext_filter/filter_topic"); ?>
<ul>
<?php foreach ($items as $row) { 
    $this->load->view("general_show_item", $row);
} ?>
</ul>
</div>
<?php echo $split_page; ?>

</div>