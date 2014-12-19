<script type="text/javascript" src="<?php echo base_url('assets/js/jquery_nivo.js'); ?>"></script>
<link href="<?php echo base_url('assets/css/nivo.css')?>" rel="stylesheet"/>
<div class="slide_image_full">
<div class="slide_image">
<div class="slider-wrapper theme-default">
<div id="slider" class="nivoSlider">

<?php 
   foreach($items as $row)
   {
   ?>
    <a href="<?php echo $row['hyperlink']; ?>">
    <img src="<?php echo base_url('images/slide_image/'.$row['images'])?>" alt="" title="<?php echo $row['tieu_de']; ?>" />
    </a>   
   <?php 
   }
?>
                
</div>
</div>
</div>
</div>

<script type="text/javascript">
$(window).load(function() {$('#slider').nivoSlider();});
</script>