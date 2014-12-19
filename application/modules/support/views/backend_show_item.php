<table class="feed" width="100%">
<caption>Danh sách hổ trợ trực tuyến <?php echo $this->lib_url->backend_link_edit_promt('support' , '', 'promt'); ?></caption>
<thead>
<tr>
<td><?php echo $this->lib_url->change_order_col("ID","STT")?></td>
<td><?php echo $this->lib_url->change_order_col("phong_ban","Phòng ban")?></td>
<td><?php echo $this->lib_url->change_order_col("name","Tên")?></td>
<td><?php echo $this->lib_url->change_order_col("yahoo","Nick yahoo")?></td>
<td><?php echo $this->lib_url->change_order_col("skyper","Skyper")?></td>
<td><?php echo $this->lib_url->change_order_col("email","Email")?></td>
<td><?php echo $this->lib_url->change_order_col("phone","Điện thoại")?></td>
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
		<td><?php echo $row['phong_ban']; ?></td>
		<td><?php echo $row['name']; ?></td>
		<td><?php echo $row['yahoo']; ?></td>
		<td><?php echo $row['skyper']; ?></td>
		<td><?php echo $row['email']; ?></td>
		<td><?php echo $row['phone']; ?></td>
		<td>
			<?php echo $this->lib_url->backend_link_edit_promt('support' , $row['ID'], 'promt'); ?>
			<?php echo $this->lib_url->backend_link_del($row['ID']); ?>
		</td>
		</tr>
		<?php 
		$i++;
}
?>
</tbody>
</table>