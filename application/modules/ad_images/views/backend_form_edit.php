<?php echo validation_errors('<div class="error_messenger">',"</div>"); ?>
<?php if(!empty($error_messenger)) echo "<div class='error_messenger'>".$error_messenger."</div>"; 

$style_input_50 = "style='width:50px'";
$style_input_500 = "style='width:500px'";

$this->lib_form->input_tr_inline = false;
$postion_ads = array(
"left_col" => "left_col"
,"right_col" => "right_col"

,"left_page" => "left_page"
,"right_page" => "right_page"

,"header" => "header"
,"footer" => "footer"
,"body_1" => "body_1"
,"body_2" => "body_2"
,"body_3" => "body_3"
,"left_page" => "left_page"
,"right_page" => "right_page"
,"scroll_image" => "scroll_image"
);
?>

<?php echo form_open_multipart($this->lib_url->getUrl()); ?>
<?php echo form_hidden("old_email",@$email); ?>
<table class="feed no_stt mg_top_10" width="100%">
<caption>Thêm, chỉnh sửa quảng cáo</caption>

<tbody>
<tr><td><?php echo $this->lib_media->show(@$images,'200px'); ?></td></tr>
<tr>
	<td>
	  	<?php echo form_upload("userfile") ?>
	  	<?php echo form_hidden("old_images",@$images); ?>
	  	<label class="admin_form_hint">Ảnh mới sẽ được ghi đè lên ảnh cũ.</label>
  	</td> 
</tr>
<?php echo $this->lib_form->form_dropdown_tr('position' , $postion_ads , @$position, "" , "Vị trí") ; ?>

<tr>
	<td><label class="label_1">Width/height</label></td> 
</tr>
<tr>
	<td>
	<?php echo form_input("width", @$width, $style_input_50)?> x
	<?php echo form_input("height", @$height, $style_input_50)?> px
	</td> 
</tr>

<?php echo $this->lib_form->form_input_tr('tieu_de' , set_value('tieu_de',@$tieu_de), $style_input_500 , "Tiêu đề") ; ?>
<?php echo $this->lib_form->form_input_tr('hyperlink',set_value('hyperlink',@$hyperlink) , $style_input_500 , "Link click") ; ?>

</tbody>

<tr><td><?php echo form_submit('submit', 'Thực hiện',"class='button_admin'"); ?></td></tr>  
</table>

<?php echo form_close(); ?>