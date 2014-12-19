<div class="larger_content">
<?php echo validation_errors('<div class="error_messenger">',"</div>"); ?>
<?php if(!empty($error_messenger)) echo $error_messenger; ?>



<div class="user_form">

<?php 	echo form_open($this->lib_url->getUrl()); ?>

<h2 class="title_view_questions f_font1">Bạn bị quên hoặc bị mất mật khẩu?</h2>
<div class="contents">

<div class="like_tr after"><label>Email: </label>
<div class="td"><?php echo form_input('email',  set_value('email') , "class='input_text'"); ?></div>
</div>

<div class="like_tr nobg after"><label></label>
<div class="td"><?php echo form_submit('submit_forgot', "Lấy lại mật khẩu","class='button'"); ?></div>
</div>
</div>
 <?php 	echo form_close(); ?>
 <h5 class="font15 color55">Một email xác nhận cấp lại mật khẩu sẽ được gửi đến email của bạn, vui lòng kiểm tra trong HỘP THƯ ĐẾN hoặc SPAM.</h5>
 </div>
