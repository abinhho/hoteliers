<?php echo validation_errors('<div class="error_messenger">',"</div>"); ?>
<?php if(!empty($error_messenger)) echo "<div class='error_messenger'>".$error_messenger."</div>"; 

$style_input_250 = "style='width:250px'";
$style_input_500 = "style='width:500px'";

$lever_list = array(
"0" => "User"
,"1" => "Moderate"
,"2" => "Administrator"
);

$this->lib_form->input_tr_inline = true;
?>

<?php echo form_open_multipart($this->lib_url->getUrl()); ?>
<?php echo form_hidden("old_email",@$email); ?>
<table class="feed no_stt mg_top_10" width="100%">
<caption>Thêm, chỉnh sửa người dùng</caption>

<tbody>
<tr><td width="100px">Ảnh đại diện</td>
<td><?php echo $this->lib_media->show(@$images,'100px'); ?></td>
</tr>
<tr>	
	<td></td>	
	<td>
  	<?php echo form_upload("userfile") ?>
  	<?php echo form_hidden("old_images",@$images); ?>
  	<label class="label_checkbox">Ảnh mới sẽ được ghi đè lên ảnh cũ.</label>
  	</td> 
 </tr> 

<?php echo $this->lib_form->form_input_tr('full_name',set_value('full_name',@$full_name) , $style_input_250 , "Họ tên") ; ?>
<?php echo $this->lib_form->form_input_tr('email',set_value('email',@$email) , $style_input_250 , "Email") ; ?>
<?php echo form_hidden('old_password', base64_encode(@$password) ) ?>
<?php echo $this->lib_form->form_password_tr('password',set_value('', base64_encode(@$password) ) , $style_input_250 , "Password") ; ?>
<?php echo $this->lib_form->form_password_tr('re_password',set_value('', base64_encode(@$password) ) , $style_input_250 , "Re password") ; ?>

<?php echo $this->lib_form->form_input_tr('website',set_value('website',@$website) , $style_input_500 , "Website") ; ?>
<?php echo $this->lib_form->form_input_tr('address',set_value('address',@$address) , $style_input_500 , "Địa chỉ") ; ?>
<?php echo $this->lib_form->form_input_tr('phone',set_value('phone',@$phone) , $style_input_250 , "Điện thoại") ; ?>

<tr><td>Cấp bậc</td>
<td><?php	echo $this->lib_form->multi_radio('level' , @$level , $lever_list); ?></td>
</tr>

<tr><td width="100px">Sinh nhật</td>
<td><?php	echo $this->lib_form->birthday(@$birthday); ?></td>
</tr>

<tr><td width="100px">Phân quyền</td>
<td>
	<table class='tbl_tree_menu'>
				<?php echo $this->lib_modules->form_checkbox_select_modules(@$permission); ?>
	</table>
</td>
</tr>


</tbody>

<tr><td></td><td><?php echo form_submit('submit', 'Thực hiện',"class='button_admin'"); ?></td></tr>  
</table>

<?php echo form_close(); ?>