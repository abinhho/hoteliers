<?php $js_add = 'onclick="return open_promt({title:\'Thêm module\', url:\''.base_url('com_modules/backend_com_modules/edit/').'\'})"'; ?>
<table class="feed" width="100%">
<caption>Danh sách các module
<?php echo anchor("#", "+ Thêm module", $js_add); ?>
</caption>
<thead>
<tr>
<td><?php echo $this->lib_url->change_order_col("ID","STT")?></td>
<td><?php echo $this->lib_url->change_order_col("tieu_de","Tên module")?></td>
<td><?php echo $this->lib_url->change_order_col("alias","Alias")?></td>
<td><?php echo $this->lib_url->change_order_col("trong_luong","Trọng lượng")?></td>
<td><?php echo $this->lib_url->change_order_col("active","Trạng thái")?></td>
<td width="100px" align="center">Hành động</td>
</tr>
</thead>
<tbody>
<?php 
$i = 1;
foreach($items as $row)
	{
		$js = 'onclick="return open_promt({title:\'Chỉnh sửa module\', url:\''.base_url('com_modules/backend_com_modules/edit/'.$row['ID']).'\'})"';
		?>
		<tr>
		<td><?php echo $i; ?></td>
		<td><?php echo $row['tieu_de']; ?></td>
		<td><?php echo $row['alias']; ?></td>
		<td><?php echo $row['trong_luong']; ?></td>
		<td><?php echo status_topic($row['active']); ?></td>
		<td>
			<a class="edit" <?php echo $js; ?>>Sửa</a>
			<?php echo $this->lib_url->backend_link_del($row['ID']); ?>
		</td>
		</tr>
		<?php 
		$i++;
	}
?>
</tbody>
</table>
<?php echo $split_page; ?>