<table class="feed" width="100%">
<caption>Danh sách ý kiến<?php echo $this->lib_url->backend_link_edit_promt("vote_ideals"); ?></caption>
<thead>
<tr>
<td><?php echo $this->lib_url->change_order_col("ID","STT")?></td>
<td><?php echo $this->lib_url->change_order_col("tieu_de","Nội dung thăm dò")?></td>
<td><?php echo $this->lib_url->change_order_col("vote_times","Lượt bỏ phiếu")?></td>
<td><?php echo $this->lib_url->change_order_col("trong_luong","Trọng lượng")?></td>
<td><?php echo $this->lib_url->change_order_col("date_upd","Lần cuối")?></td>
<td width="100px" align="center">Hành động</td>
</tr>
</thead>
<tbody>
<?php 
$i = 1;
foreach($items as $row)
	{
		//$link_edit=$TB_url->change_url_arr("",array("op"=>"add", "id"=>$row['ID']) );
		?>
		<tr>
		<td><?php echo $i; ?></td>
		<td><?php echo $row['tieu_de']; ?></td>
		<td><?php echo $row['vote_times']; ?></td>
		<td><?php echo $row['trong_luong']; ?></td>
		<td><?php  echo $this->lib_date->ago($row['date_upd']); ?></td>
		<td>
			<?php echo $this->lib_url->backend_link_edit_promt("vote_ideals" , $row['ID']); ?>
			<?php echo $this->lib_url->backend_link_del($row['ID']); ?>
		</td>
		</tr>
		<?php 
		$i++;
	}
?>
</tbody>
</table>