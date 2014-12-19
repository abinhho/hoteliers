<div class="user_form">
<?php $style_input_larger = "style='width:300px'"; ?>

<?php 	echo form_open($this->lib_url->getUrl() , 'class="accept_enter"'); ?>

<h2 class="title_view_questions f_font1">Đăng ký tài khoản mới?</h2>
<span class="gray font12 block pd_top_10">Đăng ký tài khoản trong vòng 30s để sử dụng các chức năng nâng cao từ chúng tôi !</span>
<div class="contents">

<div class="like_tr after"><label>Tên của bạn<i class='red'>*</i> : </label>
<div class="td"><?php echo form_input('full_name',  set_value('full_name') , "class='input_text capitalize' maxlength='20' "); ?>
<p class="hint">EX: Francesc</p>
</div>
</div>

<div class="like_tr after"><label>Email<i class='red'>*</i> : </label>
<div class="td"><?php echo form_input('email',  set_value('email') , "class='input_text lowercase'". $style_input_larger); ?>
</div>
</div>

<div class="like_tr after"><label>Mật khẩu mới<i class='red'>*</i> : </label>
<div class="td"><?php echo form_password('password','', "class='input_text'"); ?></div>
</div>

<div class="like_tr after"><label>Lặp lại mật khẩu<i class='red'>*</i> : </label>
<div class="td"><?php echo form_password('re_password','' , "class='input_text'"); ?></div>
</div>


<div class="like_tr nobg  after"><label></label>
<div class="td"><?php echo form_submit('submit_register',"Đăng ký hoàn tất","class='button'"); ?></div>
</div>

</div>

 <?php 	echo form_close(); ?>
 </div>
