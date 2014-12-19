<?php if(!empty($error_messenger)) echo "<div class='error_messenger'>".$error_messenger."</div>"; 
$style_textarea = "style='width:-moz-available;height:80px;'";
$style_input_500 = "style='width:500px'";

?>
<?php echo form_open($this->lib_url->getUrl()); ?>
<table width="100%" class="feed no_stt">  
<caption>Chức năng tìm kiếm dùng cho module: </caption>  
<tr><td width="100px">Chọn module</td>
<td><?php	echo $this->lib_form->multi_radio('module_alias' , @$module_actived , $list_modules); ?></td>
</tr>
<tr>		
	<td align="right" colspan = "2">
  	<?php echo form_submit('submit', 'Thực hiện',"class='button_admin'"); ?>
  	</td> 
 </tr>  
</table>
<?php echo form_close(); ?>