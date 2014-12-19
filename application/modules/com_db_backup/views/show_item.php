<?php 
$backup_type = array(
"download" => "Tải về"
,"save" => "Lưu trên hệ thống"
);

$struct_type = array(
"0" => "Cấu trúc"
,"1" => "Cấu trúc và dữ liệu"
);
$file_type = array(
"gzip" => "File .gz"
,"zip" => "File  .zip"
,"txt" => "File .sql"
);
?>

<?php echo form_open_multipart($this->lib_url->getUrl()); ?>
<table width="100%" class="feed no_stt">
<tr>
<td width="100px"><?php echo form_dropdown('backup_type', $backup_type); ?></td>
<td width="100px"><?php echo form_dropdown('struct_type', $struct_type); ?></td>
<td width="100px"><?php echo form_dropdown('file_type', $file_type); ?></td>
<td>
<?php echo form_submit('submit', "Backup")?>
</td>
</tr>
</table>
<?php echo form_close(); ?>

<table class="feed" width="100%">
<caption>Danh sách file sql backup</caption>
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
		?>
		<tr>
		<td><?php echo $i; ?></td>
		<td><?php echo $file_name; ?></td>
		<td><?php echo $this->lib_convert->formatBytes($info['size']); ?></td>
		<td><?php  echo $this->lib_date->time2date($info['date'], "d/m/Y H:i:s"); ?></td>
		<td align = "center">
		<?php echo anchor('com_db_backup/backend_com_db_backup/download/'.$file_name, "Download", "class='download'"); ?>
		<?php echo anchor('com_db_backup/backend_com_db_backup/del/'.$file_name, "Xóa", "class='del'"); ?>
		</td>
		</tr>
		<?php 
		$i++;
}
?>
</tbody>
</table>