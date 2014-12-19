<div class="larger_content">
<h1>Đặt lịch hẹn và tư vấn.</h1>
<p class="no_mg">Cảm ơn quý khách đã quan tâm chúng tôi trong thời gian qua, mời quý khách để lại lời nhắn hoặc lịch hẹn tại đây, chúng tôi sẽ liên hệ lại trong thời gian gấn nhất.</p>
</div>

<?php echo validation_errors('<div class="error_messenger">',"</div>"); ?>
<?php if(!empty($error_messenger)) echo "<div class='error_messenger'>".$error_messenger."</div>"; ?>

<div class="user_form">
<?php 
$style_input_larger = "style='width:300px'"; 
$style_input_largest = "style='width:500px'";
$style_textarea = "style='width:500px'"
?>

<?php   
echo form_open($this->lib_url->getUrl()); ?>
<div class="contents">

<div class="like_tr after"><label>Họ tên: </label>
<div class="td"><?php echo form_input('full_name',  set_value('full_name', @$full_name) , "class='input_text'"); ?>
<p class="hint">VD: Hồ Thanh Bình</p>
</div>
</div>

<div class="like_tr after"><label>Email: </label>
<?php echo form_hidden("old_email",@$email); ?>
<div class="td"><?php echo form_input('email',  set_value('email', @$email) , "class='input_text'". $style_input_larger); ?>
<p class="hint">VD: thanhbinhbk88@gmail.com</p>
</div>
</div>

<div class="like_tr after"><label>Địa chỉ: </label>
<div class="td"><?php echo myform_input('address', set_value('adress' , @$address) , "class='input_text'". $style_input_larger); ?></div>
</div>

<div class="like_tr after"><label>Điện thoại: </label>
<div class="td"><?php echo myform_input('phone', set_value('phone' , @$phone)   , "class='input_text'"); ?></div>
</div>

<div class="like_tr after"><label>Website: </label>
<div class="td"><?php echo myform_input('website',  set_value('website' , @$website) , "class='input_text'". $style_input_larger); ?>
<p class="hint">VD: http://happycard.vn</p>
</div>
</div>

<div class="like_tr after"><label>Tiêu đề: </label>
<div class="td"><?php echo myform_input('tieu_de',  set_value('tieu_de') , "class='input_text'". $style_input_largest); ?>
</div>
</div>

<div class="like_tr after"><label>Nội dung: </label>
<div class="td"><?php echo form_textarea('noi_dung',  set_value('noi_dung') , "class='input_text'".$style_textarea); ?></div>
</div>

<div class="like_tr nobg  after"><label></label>
<div class="td"><?php echo form_submit('submit', 'Gửi đi',"class='button'"); ?></div>
</div>

</div>

 <?php  echo form_close(); ?>
 </div>
