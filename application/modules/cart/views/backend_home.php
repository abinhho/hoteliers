<table class="feed" width="100%">
<caption>Danh sách đặt hàng trực tuyến <a href="<?php echo base_url('/admin?module=cart')?>">Xem thêm</a></caption>
<thead>
<tr>
<td>ID</td>
<td>Họ tên</td>
<td>Email</td>
<td>Số lượng</td>
<td>Thành tiền</td>
<td>Cập nhật</td>
<td>Trạng thái</td>
</tr>
</thead>
<tbody class="main_tbody">
<?php 
$i = 1;
foreach($items as $row)
	{
		?>
		<tr>
        <td><?php echo $row['ID']; ?></td>
		<td><a href="<?php echo base_url('admin?module=cart&id='.$row['ID']);  ?>"><?php echo $row['full_name']; ?></a></td>
		<td><?php echo $row['email']; ?></td>
        <td><?php echo $row['total_qty']; ?></td>
        <td><?php echo number_format($row['total_price']); ?> đ</td>
		
		<td><?php  echo $this->lib_date->ago($row['date_upd']); ?></td>
		<td><?php echo status_order($row['status']) ; ?></td>
		</tr>
		<?php 
		$i++;
	}
?>
</tbody>
</table>
<br />