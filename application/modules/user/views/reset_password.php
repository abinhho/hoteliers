<div class="larger_content mg_top_20">
<?php echo validation_errors('<div class="error_messenger">',"</div>"); ?>
<?php if(!empty($error_messenger)) echo $error_messenger; ?>


<div class="user_form">

<?php 	echo form_open($this->lib_url->getUrl()); ?>

<h2><?php echo __("Reset password")?></h2>
<div class="contents">

<div class="like_tr after"><label><?php echo __("Password")?><i class='red'>*</i> : </label>
<div class="td"><?php echo form_password('password','', "class='input_text'"); ?></div>
</div>

<div class="like_tr after"><label><?php echo __("Confirm password")?><i class='red'>*</i> : </label>
<div class="td"><?php echo form_password('re_password','' , "class='input_text'"); ?></div>
</div>

<div class="like_tr nobg after"><label></label>
<div class="td"><?php echo form_submit('submit_reset_password', __("Login"),"class='button'"); ?></div>
</div>
</div>
 <?php 	echo form_close(); ?>
 </div>
