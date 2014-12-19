<?php
echo form_open('user/login/'); ?>

<h2 class="title_view_questions font18 f_font1">Đăng nhập tài khoản</h2>
<p class="des_after_title f_font1 font13 gray">Hãy đăng nhập để gửi câu hỏi, trả lời hoặc bình luận tất cả các chủ đề.</p>
<div class="contents">

<div class="like_tr after"><label>Email: </label>
<div class="td"><?php echo form_input('email',  set_value('email') , "class='input_text'"); ?></div>
</div>

<div class="like_tr after"><label>Mật khẩu: </label>
<div class="td"><?php echo form_password('password',"", "class='input_text'"); ?></div>
</div>

<div class="like_tr nobg after"><label></label>
<div class="td"><?php echo anchor('user/forgot',"Quên mật khẩu?", "class='underline'")?></div>
</div>

<div class="like_tr nobg after"><label></label>
<div class="td"><?php echo form_submit('submit_login', __("Login"),"class='button'"); ?></div>
</div>
</div>
 <?php 	echo form_close(); ?>
 <br/>
 <h5 class="font16 bold bor_top pd_top_10 f_font1 tright">Hoặc bạn có thể đăng nhập nhanh bằng tài khoản</h5>
 <div class="login_social tright">
 <a href="<?php echo $this->session->userdata('login_facebook_url') ?>" class="facebook" title="Đăng nhập bằng tài khoản Facebook"></a>
 <a href="<?php echo $this->session->userdata('login_google_url') ?>" class="google" title="Đăng nhập bằng tài khoản Google"></a>
 </div>
 </div>
