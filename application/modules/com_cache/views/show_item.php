<?php if(!empty($error_messenger)) echo "<div class='error_messenger'>".$error_messenger."</div>"; ?>

<table width="100%" class="feed no_stt">
<tr>
<td width="50%">
<?php echo anchor('com_cache/backend_com_cache/del_all/', "Xóa tất cả", "class='del'"); ?>
</td>
</table>


<table class="feed" width="100%">
<caption>Danh sách file cached</caption>
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
		if($file_name == "index.html") continue;
		?>
		<tr>
		<td><?php echo $i; ?></td>
		<td><?php echo $file_name; ?></td>
		<td><?php echo $this->lib_convert->formatBytes($info['size']); ?></td>
		<td><?php  echo $this->lib_date->time2date($info['date'], "d/m/Y H:i:s"); ?></td>
		<td align = "center">
		<?php echo anchor('com_cache/backend_com_cache/del/'.$file_name, "Xóa", "class='del'"); ?>
		</td>
		</tr>
		<?php 
			
		$i++;	
}
?>
</tbody>
</table>