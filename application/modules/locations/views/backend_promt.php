<?php
$style_input_small = "style='width:250px'";
$style_input_larger = "style='width:500px'";

$this->lib_form->input_tr_inline = true;
?>

<table width="100%">
<tbody>
<?php echo form_hidden('parent_id', $parent_id); ?>
<?php echo $this->lib_form->form_input_tr('tieu_de',@$tieu_de , $style_input_small , "Tên vị trí") ; ?>
</tbody>  
</table>
