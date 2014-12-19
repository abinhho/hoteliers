<?php
$style_input_small = "style='width:250px'";
$style_input_larger = "style='width:500px'";

$this->lib_form->input_tr_inline = true;
?>

<table width="100%">
<tbody>
<?php echo $this->lib_form->form_input_tr('tieu_de',@$tieu_de , $style_input_small , "Tên module") ; ?>
<?php echo $this->lib_form->form_input_tr('alias',@$alias , $style_input_small , "Alias") ; ?>
<tr><td>Kích hoạt</td>
<td><?php echo form_checkbox('active', 1 , @$active); ?></td>
</tr>
<tr><td>Chọn vị trí block</td>
<td><?php echo form_checkbox('accept_select_block', 1 , @$accept_select_block); ?></td>
</tr>

<?php echo $this->lib_form->form_input_tr('trong_luong',@$trong_luong , $style_input_small , "Trọng lượng") ; ?>

</tbody>  
</table>

<?php echo form_close(); ?>