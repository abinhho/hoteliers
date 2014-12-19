<table class="feed" width="100%">
<caption>Danh sách feedback <a href="<?php echo base_url('/admin?module=feedback')?>">Xem thêm</a></caption>
<thead>
<tr>
<td>STT</td>
<td>Họ tên</td>
<td>Email</td>
<td>Tiêu đề</td>
<td>Cập nhật</td>
</tr>
</thead>
<tbody class="main_tbody">
<?php 
$i = 1;
$this->lib_url->this_module = "feedback";
foreach($items as $row)
	{
		
		?>
		<tr>
		<td><?php echo $i; ?></td>
		<td><?php echo $row['full_name']; ?></td>
		<td><?php echo $row['email']; ?></td>
		<td><?php echo $this->lib_url->backend_link_view_item($row['tieu_de'] , $row['ID']); ?></td>
		<td><?php  echo $this->lib_date->ago($row['date_upd']); ?></td>
		</tr>
		<?php 
		$i++;
	}
?>
</tbody>
</table>
