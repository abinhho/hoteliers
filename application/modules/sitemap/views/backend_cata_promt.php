<?php
$style_input_small = "style='width:250px'";
$style_input_larger = "style='width:500px'";

$this->lib_form->input_tr_inline = true;
?>

<table width="100%">
<tbody>
<?php echo $this->lib_form->form_input_tr('tieu_de' , @$tieu_de , $style_input_small , "Tên menu") ; ?>
<?php 
if(empty($parent_id)) 
echo $this->lib_form->form_input_tr('module_alias',@$module_alias , $style_input_small , "Module alias") ; 

echo $this->lib_form->form_input_tr('images',@$images , $style_input_larger , "Hình lớn") ; 
echo $this->lib_form->form_input_tr('images1',@$images1 , $style_input_larger , "Hình nhỏ") ;
?>



<tr><td></td>
<td><?php echo form_checkbox('home_display', 1 , @$home_display); ?> Hiển thị trong trang chủ</td>
</tr>

<tr><td></td>
<td><?php echo form_checkbox('active', 1 , @$active); ?> Kích hoạt</td>
</tr>
<?php echo $this->lib_form->form_input_tr('trong_luong',@$trong_luong , $style_input_small , "Trọng lượng") ; ?>

</tbody>  
</table>