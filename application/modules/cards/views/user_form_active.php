<div class="larger_content mod_orders">
<?php echo validation_errors('<div class="error_messenger">',"</div>"); ?>
<?php if(!empty($error_messenger)) echo $error_messenger; ?>
<?php $style_input_larger = "style='width:300px'"; ?>

<div class="user_form nomg">


<?php   echo form_open($this->lib_url->getUrl()); ?>

<div class="cata">
    <span class="left">Mời bạn nhập mã số thẻ để kiểm tra.</span>
</div>

<div class="contents after">

<div class="like_tr after"><label>Mã số thẻ<i class='red'>*</i> : </label>
<div class="td"><?php echo form_input('card[the_code]',  set_value('card[the_code]') , "class='input_text'"); ?>
<p class="hint mg_left_10">VD: 1284011223456789</p>
</div>
</div>

<div class="like_tr after"><label>Thời gian hết hạn: </label>
<div class="td"><?php echo $this->lib_date->form_date_picker('expiry_date' , @$expiry_date, TRUE) ?>
</div>
</div>


<div class="like_tr after"><label>Họ tên: </label>
<div class="td"><?php echo form_input('card[full_name]',  set_value('card[full_name]', @$full_name) , "class='input_text'"); ?>
<p class="hint">VD: Hồ Thanh Bình</p>
</div>
</div>

<div class="like_tr after"><label>Email: </label>
<?php echo form_hidden("old_email",@$email); ?>
<div class="td"><?php echo form_input('card[email]',  set_value('card[email]', @$email) , "class='input_text'". $style_input_larger); ?>
<p class="hint">VD: thanhbinhbk88@gmail.com</p>
</div>
</div>

<div class="like_tr after"><label>Địa chỉ: </label>
<div class="td"><?php echo myform_input('card[address]', @$address , "class='input_text'". $style_input_larger); ?></div>
</div>

<div class="like_tr after"><label>Điện thoại: </label>
<div class="td"><?php echo myform_input('card[phone]',  @$phone , "class='input_text'"); ?></div>
</div>

<div class="like_tr nobg after"><label></label>
<div class="td"><?php echo form_submit('submit_active_card', 'Kích hoạt ngay',"class='button mg_left_10'"); ?></div>
</div>

</div>

 <?php  echo form_close();
 ?>
 
 
 </div>


</div>