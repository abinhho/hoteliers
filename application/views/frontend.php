<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
   	<title><?php echo $title; ?> - <?php echo NAME_PAGE?></title>
   	<meta name="description" content="<?php echo $description?>" />
	<meta name="keywords" content="<?php echo $keywords; ?>" />
	<link type="image/x-icon" href="<?php echo base_url('favicon.ico')?>" rel="shortcut icon" />
	<?php echo $_styles; ?>
	
	<script type="text/javascript"><?php echo GA_CODE; ?></script>
	
   	<?php echo $_scripts; ?>
</head>
<body <?php echo BODY_STYLE;?>>
    <div class="all_body">
	<?php echo $header; 
	$in_home_c = ($this->uri->segment(1) == "") ?  "in_home" : "";
	?>
	<div class="all_main_body <?php echo $in_home_c?>">
		<div class="main_body after <?php echo $this->config->item('body_layout') ;?>">
		
	   	<?php echo $mainfile; ?>
	   	</div>
   	</div>
   	<?php echo $footer; ?>
   	</div>
<?php
echo $left_right_page;

$notice = $this->lib_url->get_notice();
if(!empty($notice)): ?>
<script type="text/javascript">
alert("<?php echo $notice; ?>");
</script>
<?php endif; ?>
<?php //$this->load->view("social_plugins/tool_right_page")?>

<a class="feedback_right_page" href = "<?php echo base_url('feedback') ?>/"></a>

<div class="scroll_top"></div>
<iframe name = "temp_frame" src="" class="hidden"></iframe>
<div id="show_datepicker"></div>
<div class="dim_body" id="dim_body"></div>
<div class="feed_cart">
    <p class="top"><b>Thông báo</b></p>
    <p class="desc">Sản phẩm đã được thêm vào giỏ hàng. Bạn muốn tiếp tục mua hay xem giỏ hàng? </p>
    <p class="bottom">
        <a href="javascript:void(0)" onclick="CART.close_feed_cart()">Tiếp tục mua</a>
        <a href="<?php echo base_url('cart/view')?>">Xem giỏ hàng</a>
    </p>
</div>
</body>
</html>