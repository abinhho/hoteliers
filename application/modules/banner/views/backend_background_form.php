<?php if(!empty($error_messenger)) echo "<div class='error_messenger'>".$error_messenger."</div>"; ?>
<?php echo form_open_multipart($this->lib_url->getUrl()); ?>
<table width="100%" class="feed no_stt">  
<caption>Logo, banner</caption>  
<tr>	
	<td>Background css:</td>	
	<td>
  	<?php
	$data_background_css = array(
              'name'        => 'background_css',
              'value'       => set_value('background_css',$background_css),
              'rows'   => '3',
              'cols'        => '50',
     );
  	echo form_textarea($data_background_css); ?>
  	</td> 
 </tr> 
<tr>	
	<td>Logo, banner:</td>	
	<td>
  	<?php echo form_upload("userfile") ?>
  	<?php echo form_hidden("old_images",$background); ?>
  	<label class="admin_form_hint">Ảnh mới sẽ được ghi đè lên ảnh cũ.</label>
  	</td> 
 </tr>  
<tr>	
  <td>Xem trước:</td>	
  <td><?php echo $this->lib_media->show($background,'100px'); ?></td>  
</tr> 
<tr>	
	<td></td>	
	<td align="right">
  	<?php echo form_submit('submit', 'Thực hiện',"class='button_admin'"); ?>
  	</td> 
 </tr>  
</table>
<?php echo form_close(); ?>