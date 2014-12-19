<?php echo validation_errors('<div class="error_messenger">',"</div>"); ?>
<?php if(!empty($error_messenger)) echo "<div class='error_messenger'>".$error_messenger."</div>"; 

$style_input_250 = "style='width:250px'";
$style_input_500 = "style='width:500px'";

$this->lib_form->input_tr_inline = true;
?>
<?php echo form_hidden("old_email",@$email); ?>
<table width="100%">
<?php echo $this->lib_form->form_input_tr('full_name',set_value('full_name',@$full_name) , $style_input_250 , "Họ tên") ; ?>
<?php echo $this->lib_form->form_input_tr('email',set_value('email',@$email) , $style_input_250 , "Email") ; ?>
</table>