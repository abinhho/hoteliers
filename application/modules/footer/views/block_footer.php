<div class="mod_footer">
<div class="contents_980 mg_top_10 relative after">
<a href="#top" class="backtop">Back to top</a>
<?php 
    $spage = $this->load->module('spage');
?>
<div class="left">
    <?php $colm = $spage->get_by_catagories('footer_columns'); 
    foreach($colm as $row)
    {
        echo "<div class='each_col'><h5>".$row['tieu_de']."</h5>".$row['noi_dung']."</div>";
    }
    ?>
</div>
<div class="right">
    <?php $contact = $spage->get_by_catagories('footer_contact'); echo @$contact[0]['noi_dung']; ?>
    <?php $this->load->view('social_plugins/social_pages')?>
</div>
</div>

    <div class="nd clear"><?php echo $noi_dung; ?>
    </div>
</div>
<?php $anchor = $spage->get_by_catagories('footer_anchor');
if(count($anchor)){ ?>
<div class="contents_980 after_footer clear last after">
    <?php echo @$anchor[0]['noi_dung'];  ?>
</div>
<?php } ?>