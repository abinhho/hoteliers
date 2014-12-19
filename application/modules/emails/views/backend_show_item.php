<table class="feed" width="100%">
<caption>Danh sách người dùng <?php echo $this->lib_url->backend_link_edit_promt("emails"); ?></caption>
<thead>
<tr>
<td><?php echo $this->lib_url->change_order_col("ID","STT")?></td>
<td><?php echo $this->lib_url->change_order_col("email","Email")?></td>
<td><?php echo $this->lib_url->change_order_col("full_name","Họ tên")?></td>
<td><?php echo $this->lib_url->change_order_col("date_add","Ngày tạo")?></td>
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
		<td><?php echo $row['email']; ?></td>
		<td><?php echo $row['full_name']; ?></td>
		<td><?php  echo $this->lib_date->ago($row['date_upd']); ?></td>
		<td>
			<?php echo $this->lib_url->backend_link_edit_promt("emails" , $row['ID']); ?>
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
<?php echo anchor('emails/backend_emails/to_csv', "Xuất ra file", "class='excel rfloat'");  ?>