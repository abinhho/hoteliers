<table class="feed" width="100%">
<caption>Danh sách order <?php echo $this->lib_url->backend_link_action("" , "", "Xem thêm"); ?></caption>
<thead>
<tr>
<td>STT</td>
<td>Họ tên</td>
<td>Email</td>
<td>Loại thẻ</td>
<td>Cập nhật</td>
<td>Trạng thái</td>
</tr>
</thead>
<tbody class="main_tbody">
<?php 
$i = 0;
foreach($items as $row)
	{
		
		?>
		<tr>
		<td><?php echo $i+1; ?></td>
        <td><?php echo $row['full_name']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $this->lib_url->backend_link_view_item($row['loai_the'] , $row['ID']); ?></td>
        
        <td><?php  echo $this->lib_date->ago($row['date_upd']); ?></td>
        <td><?php echo status_order($row['status']) ; ?></td>
		</tr>
		<?php 
		$i++;
	}
?>
</tbody>
</table>
<br>
