<div class="larger_content after">
<?php echo validation_errors('<div class="error_messenger">',"</div>"); ?>
<?php if(!empty($error_messenger)) echo $error_messenger; ?>

<?php 
$html_message = $this->lib_url->get_notice('html_message');
if(!empty($html_message)) echo '<div class="error_messenger">'.$html_message.'</div>'; ?>

<div class="col_1"><?php $this->load->view("register_form");?></div>
<div class="col_2"><?php $this->load->view("login_form");?></div>
</div>
<h5 class="font14 color55">Bạn đồng ký đăng ký tài khoản có nghĩa bạn đã đồng ý với các <a href="#">điều khoản quy định</a> của chúng tôi</h5>