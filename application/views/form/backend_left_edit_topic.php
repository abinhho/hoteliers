<?php 
$style_textarea = "style='width:-moz-available;height:40px;'";
$style_input_larger = "style='width:-moz-available'";
?>
<table class="feed no_stt" width="100%">
<tr>
	<td>
		<label class="label_1">Danh mục: </label>
	</td>
</tr>
<tr>
	<td>
		<div class="tree_imenu overflow_add">
		<table class='tbl_tree_menu'>
		<?php echo $this->lib_menu->menu_check_box_mod( $module_alias ,@$catid , $start_level = 0); ?>
		</table>
		</div>
	</td>
	
</tr>
<?php echo $this->lib_form->form_tr_lang('input' , 'tieu_de', $style_input_larger , "Tiêu đề") ; ?>
<?php echo $this->lib_form->form_tr_lang('textarea' , 'description', $style_textarea , "Mô tả ngắn (description)") ; ?>
	
	
</table>
