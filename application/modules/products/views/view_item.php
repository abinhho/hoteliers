<div class="mod_products view ">

<div class="line1 after">
	<div class="col_1"><?php $this->load->view('view_item_images'); ?></div>
    <div class="col_2">
        
        <h1 class="title_view title" itemprop="title"><?php echo $tieu_de; ?></h1>
        
        <?php $this->load->view('social_plugins/facebook_like_and_share_button') ?>
        <!--p class="caption nice_title"><span>Đặc điểm chung</span></p-->
      
        <div class="bg content_child"><?php echo $description; ?></div>
        
        <p class="bought">Đã mua: <strong><?php echo $bought ?></strong></p>
          
        <p class="price">Giá bán: <b><?php echo number_format($price)?></b> đ</p>
        <?php if($old_price >0){ ?>
        <p class="old_price"><label class="invisible">Giá bán:</label> <span><?php echo number_format($old_price)?> đ</span></p>
        <?php } ?>
        <br />  
        <?php $this->load->view('cart/view_product_button_add2card')?>
             
        <?php $this->load->view('comments/rating_topic')?>
        <br />
        <?php $this->load->view('social_plugins/buttons_share')?>
        
    </div>
</div>


<div class="line2 after">
    <div class="left">
    <h5 class="cata nice_title"><span>Đặc điểm nổi bật</span></h5>
    <div class="bg content_child"><?php echo $features; ?></div>
    
    <h5 class="cata nice_title"><span>Mô tả chi tiết</span></h5>
    <div class="nd"><?php echo $noi_dung;?></div>
    
    
    <?php $this->load->view('social_plugins/facebook_like_and_share_button'); ?>
    
    <?php if($active_comment) $this->load->view('social_plugins/facebook_comment'); ?> 
    <?php if($active_comment) $this->load->view('social_plugins/disqus_comment'); ?>
    
    <?php echo $this->lib_seo->create_tag(@$keywords); ?>
    
    </div>
    
    <div class="right">
    <?php $this->load->view("same_topic"); ?>
    </div>
</div>


</div>