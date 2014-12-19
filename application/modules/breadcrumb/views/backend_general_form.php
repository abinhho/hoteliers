<?php if(!empty($error_messenger)) echo "<div class='error_messenger'>".$error_messenger."</div>"; 
$style_textarea = "style='width:-moz-available;height:80px;'";
$style_input_500 = "style='width:500px'";
?>
<?php echo form_open($this->lib_url->getUrl()); ?>
<table width="100%" class="feed no_stt">  
<caption>Cấu hình</caption>  

<?php echo $this->lib_form->form_input_tr('home_text',set_value('home_text',$home_text) , $style_input_500 , "Home text") ; ?>  
<tr>		
	<td align="right">
  	<?php echo form_submit('submit', 'Thực hiện',"class='button_admin'"); ?>
  	</td> 
 </tr>  
</table>
<?php echo form_close(); ?>