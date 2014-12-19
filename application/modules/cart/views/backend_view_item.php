<?php 
$status_list = array(
"0" => "Chưa duyệt"
,"1" => "Đang giao"
,"2" => "Đã giao"
);
?>
<table width="100%" class="feed no_stt">
<caption>Đặt hàng của : <?php echo $infos['full_name']; ?></caption>

<tr>
<td width="100px"><label class="label_1">Trạng thái: </label></td>
<td>
<?php 
echo form_open($this->lib_url->getUrl());
echo form_dropdown('status',$status_list, $infos['status']);
echo form_hidden("id", $infos['ID']);
echo form_submit('submit', 'Cập nhật');
echo form_close();

?>

</td>
</tr>

<tr>
<td width="100px"><label class="label_1">Họ tên: </label></td>
<td><span class=""><?php echo $infos['full_name']; ?></span></td>
</tr>

<tr>
<td width="100px"><label class="label_1">Email: </label></td>
<td><span class=""><?php echo $infos['email']; ?></span></td>
</tr>


<tr>
	<td><label class="label_1">Địa chỉ: </label></td>
	<td><span class="name_file "><?php echo $infos['address']; ?></span></td>
</tr>

<tr>
	<td><label class="label_1">Điện thoại: </label></td>
	<td><span class=""><?php echo $infos['phone']; ?></span></td>
</tr>


<tr>
<td width="100px"><label class="label_1">Hình thức TT: </label></td>
<td><span class=""><?php echo $infos['payment_method']; ?></span></td>
</tr>


<tr>
	<td><label class="label_1">Nội dung: </label></td>
	<td><span class=""><?php echo $infos['noi_dung']; ?></span></td>
</tr>


</table>
<br/>


<table class="feed" cellpadding="6" cellspacing="1" style="width:100%" border="0">

<tr>
    <th>Hình ảnh</th>
    <th>Tên sản phẩm</th>
    <th>Số lượng</th>
    <th style="text-align:right">Giá</th>
    <th style="text-align:right">Tổng giá</th>
</tr>

<?php $i = 1; ?>

<?php foreach ($carts as $row): ?>
	<tr>
	  <td width="80px"><img src="<?php echo $row['images']?>"></td>
	  <td>
		<a href="<?php echo $row['url']?>" target="_blank"><?php echo $row['name']; ?></a>
	  </td>
      <td  align="center"><?php echo $row['qty'] ?></td>
	  <td style="text-align:right"><?php echo number_format($row['price']); ?> đ</td>
	  <td style="text-align:right">$<?php echo number_format($row['subtotal']); ?> đ</td>
	</tr>

<?php $i++; ?>

<?php endforeach; ?>

<tr>
  <td colspan="3"> </td>
  
  <td align="right"><strong>Tổng giá</strong></td>
  <td align="right">$<?php echo number_format($infos['total_price']); ?> đ</td>
  <td> </td>
</tr>

</table>

<br />
<?php echo $this->lib_url->backend_link_del($infos['ID']); ?>