<div class="mod_news block_white view_news" itemscope>
<div class="general">
	<h1 class="title_view_news" itemprop="title"><?php echo $tieu_de; ?></h1>
	<div class="info_news after">
	
	<?php echo anchor('user/'.$user_id, $full_name);  ?>
	 <font>|</font>
	<span><?php  echo $this->lib_date->ago($date_upd); ?></span>
	<font>|</font> <span><?php echo $viewed_times ?> lượt xem</span>
	<?php //$this->load->view("social_plugins/facebook_like_button"); ?>
    <?php $this->load->view('social_plugins/facebook_like_and_share_button'); ?>
	</div>
</div>
<span class="nd"><?php echo $noi_dung;?></span>
</div>
<?php if($active_comment) $this->load->view('social_plugins/facebook_comment'); ?>
<?php if($active_comment) $this->load->view('social_plugins/disqus_comment'); ?>
<?php //$this->load->view('social_plugins/buttons_share')?>
<?php $this->load->view("same_topic") ?>