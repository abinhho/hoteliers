<div class="mod_albums block_white view_albums left" itemscope >
	<div class="general">
	<h1 class="title_view_news" itemprop="title"><?php echo $tieu_de; ?></h1>
	<?php
	if(!empty($description)) echo "<p class='description_view_news'>{$description}</p>";
	?>
	</div>
	<div class="nd"></div>
    
<ul class="small_images after" id="nav_images">    
<?php 
                                
        $list_images = preg_split('/,/', $images); //print_r ($list_images) ;
        if(count($list_images))
        foreach($list_images as $img)
        {
        $thumb = $this->lib_media->show_crop("albums" ,$img, 100, 100); //echo $thumb;
        ?>
        <li><a href="#"><img src="<?php echo $thumb?>" data-large="<?php echo base_url('images/albums/'.$img)?>"/></a></li>
        <?php
        }
?>                       

</ul>
<div id="slideshow" class="pics">
      <?php          
        if(count($list_images))
        foreach($list_images as $img)
        {
        ?>
        <img src="<?php echo base_url('images/albums/'.$img)?>"/>
        <?php
        }
?> 
</div>
</div>

<?php $this->load->view('social_plugins/facebook_like_and_share_button'); ?>
<?php $this->load->view('social_plugins/facebook_comment'); ?>
<?php $this->load->view('social_plugins/buttons_share')?>


<script type="text/javascript">
$(function() {
    $('#slideshow').cycle({
        fx:     'turnDown',
        speed:  'fast',
        timeout: 0,
        pager:  '#nav_images',
        pagerAnchorBuilder: function(idx, slide) {
            // return sel string for existing anchor
            return '#nav_images li:eq(' + (idx) + ') a';
        }
    });
});

</script>