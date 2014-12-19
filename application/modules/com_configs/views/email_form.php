<?php if(!empty($error_messenger)) echo "<div class='error_messenger'>".$error_messenger."</div>"; 

$style_input_250 = "style='width:250px'";
$style_input_500 = "style='width:500px'";

$email_send_style = array(
"smtp" => "SMTP"
,"php" => "PHP mail"
);
$smtp_hidden = ($email_type=='php') ? "style='display:none'" : '';
$this->lib_form->input_tr_inline = true;
?>

<?php echo form_open($this->lib_url->getUrl()); ?>
<table class="feed no_stt select_type_email" width="100%">
<caption>Cấu hình email</caption>
<tr><td width="100px">Kiểu gửi email</td>
<td><?php	echo $this->lib_form->multi_radio('email_type' , $email_type , $email_send_style); ?></td>
</tr>
</table>

<table class="feed no_stt mg_top_10" width="100%">

<tbody class='select_smtp' <?php echo $smtp_hidden ?>>
<?php echo $this->lib_form->form_input_tr('email_host',set_value('email_host',$email_host) , $style_input_500 , "Email host") ; ?>
<?php echo $this->lib_form->form_input_tr('email_port',set_value('email_port',$email_port) , '' , "SMTP Port") ; ?>
<?php echo $this->lib_form->form_input_tr('email_ssl',set_value('email_ssl',$email_ssl) , '' , "SSL") ; ?>
<?php echo $this->lib_form->form_input_tr('email_username',set_value('email_username',$email_username) , $style_input_250 , "Username") ; ?>
<?php echo $this->lib_form->form_password_tr('email_password',set_value('email_password',$email_password) , $style_input_250 , "Password") ; ?>
</tbody>
<tbody>
<?php echo $this->lib_form->form_input_tr('email_from',set_value('email_from',$email_from) , $style_input_500 , "Email from") ; ?>
<?php echo $this->lib_form->form_input_tr('email_reply_to',set_value('email_reply_to',$email_reply_to) , $style_input_500 , "Reply to") ; ?>
<?php echo $this->lib_form->form_input_tr('email_encoding',set_value('email_encoding',$email_encoding) , '' , "Message Encoding") ; ?>
<?php echo $this->lib_form->form_input_tr('email_frequency',set_value('email_frequency',$email_frequency) , '' , "Frequency") ; ?>
</tbody>

<tr><td></td><td><?php echo form_submit('submit', 'Thực hiện',"class='button_admin'"); ?></td></tr>  
</table>

<?php echo form_close(); ?>

<script type="text/javascript">
	$("input[name='email_type']").click(function(){
		$val = $(this).val();
		($val == "smtp") ? $(".select_smtp").show() : $(".select_smtp").hide();
	});
</script>