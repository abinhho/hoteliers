<?php $in_home_c = ($this->uri->segment(1) == "") ?  "in_home" : ""; ?>

<div class="block_menu_doc <?php echo $in_home_c  ?>">
<?php echo $this->lib_blocks->info_block('block_menu_doc'); ?>
<ul><?php echo substr(substr($html_menu, 4), 0, -5) ?></ul>
</div>