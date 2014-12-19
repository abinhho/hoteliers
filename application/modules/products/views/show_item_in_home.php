<?php $cl_4_col = (@$four_col) ? 'four_col' : ''; ?>



<div class="mod_products show_items <?php echo $cl_4_col ?> after">
<?php if(@$four_col) echo "<h2 class='cata'>Các sản phẩm mới nhất</h2>"; ?>
<!--div class="div_title"><h2 class="title"><span><?php echo $title; ?></span></h2>
<?php //if(isset($link_more) )
//echo "<a href ='".$link_more."' rel = 'nofollow'>".$title_link_more."</a>";
?>


</div-->
<ul>
<?php foreach ($items as $row) { 
    $this->load->view("general_show_item", $row);
} ?>
</ul>
</div>