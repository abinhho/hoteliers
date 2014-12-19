<?php
$style_input_small = "style='width:250px'";
$style_input_50 = "style='width:50px'";
$style_input_larger = "style='width:600px'";
$style_textarea = "style='width:600px;height:50px'";

$this->lib_form->input_tr_inline = false;

$list_target = array(
"" => "Mặc định"
,"_blank" => "_blank"
,"_self" => "_self"
,"_parent" => "_parent"
,"_top" => "_top"
);

?>

<table width="100%">
<tbody>
<?php echo $this->lib_form->form_tr_lang('input' , 'tieu_de' , $style_input_small , "Tên menu") ; ?>
<?php echo $this->lib_form->form_tr_lang('textarea' , 'description' , $style_textarea , "Description") ; ?>

<?php echo $this->lib_form->form_input_tr('href',@$href , $style_input_larger , "Liên kết") ; ?>
<?php echo $this->lib_form->form_dropdown_tr('target', $list_target ,@$target , '' , "Target") ; ?>
<?php echo $this->lib_form->form_input_tr('FID',@$FID , $style_input_50 , "FID") ; ?>
<?php echo $this->lib_form->form_input_tr('trong_luong',@$trong_luong , $style_input_50 , "Trọng lượng") ; ?>

</tbody>  
</table>

<?php echo form_close(); ?>