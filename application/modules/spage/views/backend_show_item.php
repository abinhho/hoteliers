<table class="feed" width="100%">
<caption>Danh sách người dùng</caption>
<thead>
<tr>
<td><?php echo $this->lib_url->change_order_col("ID","STT")?></td>
<td><?php echo $this->lib_url->change_order_col("catagory","Catagory")?></td>
<td><?php echo $this->lib_url->change_order_col("tieu_de","Tiêu đề")?></td>
<td><?php echo $this->lib_url->change_order_col("date_upd","Cập nhật cuối")?></td>
<td width="100px" align="center">Hành động</td>
</tr>
</thead>
<tbody>
<?php 
$i = 1;
foreach($items as $row)
{
		$link = $this->lib_menu->make_link(array("spage"=> "") , array($row['ID'] => $row['tieu_de'])
		);
		?>
		<tr>
		<td><?php echo $i; ?></td>
		<td><?php echo $row['catagory']; ?></td>
		<td><a href = "<?php echo $link; ?>"><?php echo $row['tieu_de']; ?></a></td>
		<td><?php echo $this->lib_date->ago($row['date_upd']) ; ?></td>
		<td>
			<?php echo $this->lib_url->backend_link_edit($row['ID']); ?>
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