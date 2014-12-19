<div class="block_slide_jcycle_images after">

<?php 
//echo Modules::run('menu/block_menu_doc') ?>

<div class="content_slider">
<div class="left_slide" id="block_slide_jcycle_images">
<?php 
   foreach($items as $row)
   {
   ?>
    <div class="each">
        <a href="<?php echo $row['hyperlink']; ?>">
        <img src="<?php echo base_url('images/slide_image/'.$row['images'])?>" alt="" title="<?php echo $row['tieu_de']; ?>" />
        </a>   
    </div>
   <?php 
   }
?>
</div>
<a class="nav_prev_prev nav_prev"></a>
<a class="nav_prev_prev nav_next"></a>
</div>

<?php //echo Modules::run('products/block_products_in_slider_image'); ?>

<!--div class="chinh_sach_san_pham after">
    <div class="each">
        <i class="sprites like"></i>
        <span><?php //echo _SLOGAN ?></span>
    </div>
    <div class="each">
        <i class="sprites refund"></i>
        <span>Trả hàng miễn phí trong vòng 7 ngày</span>
    </div>
    <div class="each last">
        <i class="sprites oto"></i>
        <span>Giao hàng tận nơi trên toàn quốc</span>
    </div>
    <?php //echo $this->load->view('emails/form_email_promote'); ?>
</div-->
</div>

<script type="text/javascript">
$(window).load(function() {
    $('#block_slide_jcycle_images').cycle({ 
        fx:      'scrollRight', 
        timeout:  2500, 
        next: '.nav_next',
        prev: '.nav_prev',
        //easing:  'easeInOutBack' 
    });
});
</script>