<?php echo validation_errors('<div class="error_messenger">',"</div>"); ?>
<?php if(!empty($error_messenger)) echo "<div class='error_messenger'>".$error_messenger."</div>"; 

$style_input_250 = "style='width:250px'";
$style_input_500 = "style='width:500px'";
$style_input_20 = "style='width:40px'";

$this->lib_form->input_tr_inline = true;
?>
<table width="100%">
<?php echo $this->lib_form->form_input_tr('full_name',set_value('full_name',@$full_name) , $style_input_500 , "Họ tên") ; ?>
<?php echo $this->lib_form->form_textarea_tr('noi_dung',set_value('noi_dung',@$noi_dung) , $style_input_500 , "Nội dung") ; ?>
<?php echo $this->lib_form->form_input_tr('trong_luong',set_value('trong_luong',@$trong_luong) , $style_input_20 , "Trọng lượng") ; ?>
<tr><td>Kích hoạt</td>
<td><?php echo form_checkbox('active', 1 , @$active); ?></td>
</tr>
</table>