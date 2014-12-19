<?php echo validation_errors('<div class="error_messenger">',"</div>"); ?>
<?php if(!empty($error_messenger)) echo "<div class='error_messenger'>".$error_messenger."</div>"; 

$style_input_250 = "style='width:250px'";
$style_input_500 = "style='width:500px'";

$this->lib_form->input_tr_inline = false;
echo init_ckeditor();
?>

<?php echo form_open_multipart($this->lib_url->getUrl()); ?>
<?php echo form_hidden("old_email",@$email); ?>
<table class="feed no_stt mg_top_10" width="100%">
<caption>Thêm, chỉnh sửa slide ảnh</caption>

<tbody>
<tr><td><?php echo $this->lib_media->show(@$images,'200px'); ?></td></tr>
<tr>
	<td>
	  	<?php echo form_upload("userfile") ?>
	  	<?php echo form_hidden("old_images",@$images); ?>
	  	<label class="admin_form_hint">Ảnh mới sẽ được ghi đè lên ảnh cũ.</label>
  	</td> 
 </tr> 
 <?php echo $this->lib_form->form_tr_lang('input' , 'tieu_de', $style_input_500 , "Tiêu đề") ; ?>
 <?php echo $this->lib_form->form_input_tr('hyperlink',set_value('hyperlink',@$hyperlink) , $style_input_500 , "Link click") ; ?>
 <?php echo $this->lib_form->form_tr_lang('ckeditor' , 'noi_dung', $style_input_500 , "Nội dung") ; ?>

</tbody>

<tr><td><?php echo form_submit('submit', 'Thực hiện',"class='button_admin'"); ?></td></tr>  
</table>

<?php echo form_close(); ?>