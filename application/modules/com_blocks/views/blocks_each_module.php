<?php echo validation_errors('<div class="error_messenger">',"</div>");
$file_blocks = array();

$exist_blocks = array(); 
foreach ($items as $row)
$exist_blocks[] = $row['block_name'];


foreach ($folder_blocks as $file_name => $info)
{
	if(substr($file_name, 0, 6) == "block_")
	{
		$temp = str_replace(".php", "", $file_name);
		
		if(!in_array($temp, $exist_blocks))
		$file_blocks[$temp] = $file_name;
	}
}


echo form_open($this->lib_url->getUrl()); ?>
<table class="feed no_stt" width="100%">
<caption>Chọn block và vị trí để thêm</caption>	
<tr>	
<td>		
	<?php echo form_dropdown('block_name',$file_blocks); ?> - 
	<?php echo form_dropdown('position',$this->config->item('page_position')); ?>
</td>	
<td align="right" class="bor_top">
	<?php echo form_submit('submit', "Thực hiện")?>
</td>
</tr>
</table>
<?php echo form_close(); ?>