<?php echo validation_errors('<div class="error_messenger">',"</div>"); ?>
<?php if(!empty($error_messenger)) echo "<div class='error_messenger'>".$error_messenger."</div>"; 

$style_input_250 = "style='width:250px'";
$style_input_500 = "style='width:500px'";

$this->lib_form->input_tr_inline = true;
?>
<table width="100%">
<?php echo $this->lib_form->form_input_tr('tieu_de',set_value('tieu_de',@$tieu_de) , $style_input_500 , "Nội dung") ; ?>
<?php echo $this->lib_form->form_input_tr('vote_times',set_value('vote_times',@$vote_times) , $style_input_250 , "Lượt vote") ; ?>
<?php echo $this->lib_form->form_input_tr('trong_luong',set_value('trong_luong',@$trong_luong) , $style_input_250 , "Trọng lượng") ; ?>
</table>