<?php if(!empty($error_messenger)) echo "<div class='error_messenger'>".$error_messenger."</div>"; ?>

<table class="feed" width="100%">
<caption>Danh sách file</caption>
<thead>
<tr>
<td><?php echo $this->lib_url->change_order_col("ID","STT")?></td>
<td><?php echo $this->lib_url->change_order_col("block_name","Tên block")?></td>
<td><?php echo $this->lib_url->change_order_col("tieu_de","Tên hiển thị")?></td>
<td><?php echo $this->lib_url->change_order_col("module","Module")?></td>
<td><?php echo $this->lib_url->change_order_col("position","Vị trí")?></td>
<td width="150px" align="center">Hành động</td>
</tr>
</thead>
<tbody>
<?php 

foreach($items as $i => $row)
{		
		?>
		<tr>
		<td><?php echo $i+1; ?></td>
		<td><?php echo $row['block_name'] ?></td>
		<td><?php echo $row['tieu_de'] ?></td>
		<td><?php echo $row['module'] ?></td>
		<td><?php echo $row['position'] ?></td>
		<td align = "center">
		<?php echo $this->lib_url->backend_link_edit_promt("com_blocks" , $row['ID']); ?>
		<?php echo $this->lib_url->backend_link_del($row['ID']); ?>
		</td>
		</tr>
		<?php 
		
		
}
?>
</tbody>
</table>