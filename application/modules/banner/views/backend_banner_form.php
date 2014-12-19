<?php if(!empty($error_messenger)) echo "<div class='error_messenger'>".$error_messenger."</div>"; ?>
<?php echo form_open_multipart($this->lib_url->getUrl()); ?>
<table width="100%" class="feed no_stt">  
<caption>Logo, banner</caption>  
<tr>	
	<td>Width:</td>	
	<td>
  	<?php echo form_input("width", set_value('width',$width)) ?>
  	<label class="admin_form_hint">Chiều rộng logo hoặc banner.</label>
  	</td> 
 </tr>  
<tr>	
	<td>Height:</td>	
	<td>
  	<?php echo form_input("height", set_value('height',$height)) ?>
  	<label class="admin_form_hint">Chiều cao logo hoặc banner.</label>
  	</td> 
 </tr>  
<tr>	
	<td>Logo, banner:</td>	
	<td>
  	<?php echo form_upload("userfile") ?>
  	<?php echo form_hidden("old_images",$images); ?>
  	<label class="admin_form_hint">Ảnh mới sẽ được ghi đè lên ảnh cũ.</label>
  	</td> 
 </tr>  
<tr>	
  <td>Xem trước:</td>	
  <td><?php echo $this->lib_media->show($images,$width,$height); ?></td>  
</tr> 
<tr>	
	<td></td>	
	<td align="right">
  	<?php echo form_submit('submit', 'Thực hiện',"class='button_admin'"); ?>
  	</td> 
 </tr>  
</table>
<?php echo form_close(); ?>