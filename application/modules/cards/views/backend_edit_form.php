<?php echo validation_errors('<div class="error_messenger">',"</div>"); ?>
<?php if(!empty($error_messenger)) echo "<div class='error_messenger'>".$error_messenger."</div>"; 

$style_input_250 = "style='width:250px'";
$style_input_500 = "style='width:500px'";

$this->lib_form->input_tr_inline = true;

?>

<?php echo form_open_multipart($this->lib_url->getUrl()); ?>
<?php echo form_hidden("old_the_code",@$the_code); ?>
<table class="feed no_stt mg_top_10" width="100%">
<caption>Thêm, chỉnh sửa thẻ</caption>

<tbody>
<?php echo $this->lib_form->form_input_tr('the_code',set_value('the_code',@$the_code) , $style_input_250 , "Mã số thẻ") ; ?>

<tr><td>Kích hoạt</td>
<td><?php echo form_checkbox('status', 1 , @$status); ?></td>
</tr>

<tr><td>Thời gian hết hạn</td>
<td><?php echo $this->lib_date->form_date_picker('expiry_date' , @$expiry_date, TRUE) ?></td></tr>

<?php echo $this->lib_form->form_input_tr('full_name',set_value('full_name',@$full_name) , $style_input_250 , "Họ tên") ; ?>
<?php echo $this->lib_form->form_input_tr('email',set_value('email',@$email) , $style_input_250 , "Email") ; ?>

<?php echo $this->lib_form->form_input_tr('cmnd',set_value('cmnd',@$cmnd) , $style_input_250 , "Chứng minh ND") ; ?>

<?php echo $this->lib_form->form_input_tr('address',set_value('address',@$address) , $style_input_500 , "Địa chỉ") ; ?>
<?php echo $this->lib_form->form_input_tr('phone',set_value('phone',@$phone) , $style_input_250 , "Điện thoại") ; ?>



</tbody>

<tr><td></td><td><?php echo form_submit('submit', 'Thực hiện',"class='button_admin'"); ?></td></tr>  
</table>

<?php echo form_close(); ?>