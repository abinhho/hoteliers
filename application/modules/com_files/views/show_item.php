<?php if(!empty($error_messenger)) echo "<div class='error_messenger'>".$error_messenger."</div>"; ?>
<?php
$file_types = array(
"" => "Tất cả các file"
,"rar,zip,7z,gz,gz2" => "File rar"
,"swj" => "Flash"
,"jpg,jpeg,png,bmp,gif" => "Hình ảnh"
,"doc,docx" => "File word"
,"xls,xlsx" => "File Excel"
,"pdf" => "File PDF"
,"ppt,pptx" => "File PowerPoint"
);
$curr= @split(",",$_GET['filetype']);
?>
<table width="100%" class="feed no_stt">
<tr>
<td width="50%">
<?php echo form_open_multipart($this->lib_url->getUrl()); ?>
<?php echo form_dropdown('filter_type', $file_types, $this->input->post('filter_type'))?>
<?php echo form_submit('submit_filter', "Lọc file" , "class='mg_left_10'")?>
<?php echo form_close()?>
</td>
<td align="right">
<?php echo form_open_multipart($this->lib_url->getUrl()); ?>
<?php echo form_upload('userfile')?>
<?php echo form_submit('submit_upload', "Upload")?>
<?php echo form_close()?>
</td>
</tr>
</table>


<table class="feed" width="100%">
<caption>Danh sách file</caption>
<thead>
<tr>
<td>STT</td>
<td>File name</td>
<td>File size</td>
<td>Cập nhật</td>
<td width="150px" align="center">Hành động</td>
</tr>
</thead>
<tbody>
<?php 
$i = 1;
foreach($items as $file_name => $info)
{
		if($info['size'] == 0) continue;
		$ext = $this->lib_media->extension($file_name);
		
		$temps = (isset($filter_type) ) ? preg_split('/,/', $filter_type) : array();
		
		if(in_array($ext, $temps)  || @$filter_type == "" ) :
		
		
		?>
		<tr>
		<td><?php echo $i; ?></td>
		<td><?php echo $file_name; ?></td>
		<td><?php echo $this->lib_convert->formatBytes($info['size']); ?></td>
		<td><?php  echo $this->lib_date->time2date($info['date'], "d/m/Y H:i:s"); ?></td>
		<td align = "center">
		<?php echo anchor('com_files/backend_com_files/download/'.$file_name, "Download", "class='download'"); ?>
		<?php echo anchor('com_files/backend_com_files/del/'.$file_name, "Xóa", "class='del'"); ?>
		</td>
		</tr>
		<?php 
		endif;
		$i++;
}
?>
</tbody>
</table>