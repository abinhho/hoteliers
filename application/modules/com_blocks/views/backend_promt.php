<?php echo validation_errors('<div class="error_messenger">',"</div>"); ?>
<?php if(!empty($error_messenger)) echo "<div class='error_messenger'>".$error_messenger."</div>"; 

$style_input_250 = "style='width:250px'";
$style_input_50 = "style='width:50px'";
$style_textarea = "style='width:-moz-available;height:40px;'";

$this->lib_form->input_tr_inline = true;
?>
<table width="100%">
<?php echo $this->lib_form->form_input_tr('block_name',set_value('block_name' , $block_name ) , $style_input_250." disabled" , "Tên block" ) ; ?>
<?php echo $this->lib_form->form_input_tr('tieu_de',set_value('tieu_de' , $tieu_de ) , $style_input_250 , "Tên hiển thị" ) ; ?>
<?php echo $this->lib_form->form_textarea_tr('description',set_value('description' , $description ) , $style_textarea , "Mô tả" ) ; ?>
<?php echo $this->lib_form->form_input_tr('trong_luong',set_value('trong_luong' , $trong_luong ) , $style_input_50 , "Trọng lượng" ) ; ?>

<tr><td>Position</td>
<td><?php echo form_dropdown('position',$this->config->item('page_position'), $position); ?></td>
</tr>

<tr><td>Hiển thị mọi nơi</td>
<td><?php echo form_checkbox('any_display', 1 , @$any_display ,
"onclick = \"($(this).attr('checked') == 'checked')? $('.select_where_display').hide():$('.select_where_display').show() \""); ?></td>
</tr>

<?php $hidden = (@$any_display == 1) ? "hidden" : '' ?>

<tbody class="<?php echo $hidden?> select_where_display" >

<tr><td></td>
<td><?php echo form_checkbox('home_display', 1 , @$home_display ); ?>
<label class="label_checkbox">Hiển thị trong trang chủ</label>
</td>
</tr>
<tr><td></td>
		<td>
		<input type="checkbox" onclick="select_all_check_box($(this),'select_all_checkbok')">
		<span style="margin-left:5px;"> Chọn tất cả (Chọn thêm nơi hiển thị)</span>
		<br/><br/>
		<div class="tree_imenu s1 select_all_checkbok">
				<table class='tbl_tree_menu'>
				<?php echo $this->lib_modules->form_checkbox_select_modules($item_display); ?>
				</table>
			</div>
		</td>
</tr>
</tbody>

</table>