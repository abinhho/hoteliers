<?php 
$status_list = array(
"0" => "Chưa duyệt"
,"1" => "Đang giao"
,"2" => "Đã giao"
);
?>
<table width="100%" class="feed no_stt">
<caption>Đặt hàng của : <?php echo $full_name; ?></caption>

<tr>
<td width="100px"><label class="label_1">Trạng thái: </label></td>
<td>
<?php 
echo form_open($this->lib_url->getUrl());
echo form_dropdown('status',$status_list, $status);
echo form_hidden("id", $ID);
echo form_submit('submit', 'Cập nhật');
echo form_close();
?>

</td>
</tr>

<tr>
<td width="100px"><label class="label_1">Loại thẻ: </label></td>
<td><span class=""><?php echo $loai_the; ?></span></td>
</tr>

<tr>
<td width="100px"><label class="label_1">Ngân hàng: </label></td>
<td><span class=""><?php echo $bank; ?></span></td>
</tr>

<tr>
<td width="100px"><label class="label_1">Họ tên: </label></td>
<td><span class=""><?php echo $full_name; ?></span></td>
</tr>

<tr>
	<td><label class="label_1">Email: </label></td>
	<td><span class="name_file "><?php echo $email; ?></span></td>
</tr>

<tr>
	<td><label class="label_1">Địa chỉ: </label></td>
	<td><span class="name_file "><?php echo $address; ?></span></td>
</tr>

<tr>
	<td><label class="label_1">Điện thoại: </label></td>
	<td><b><?php echo $phone; ?></b></td>
</tr>

<tr>
    <td><label class="label_1">Khu vực: </label></td>
    <td><b><?php echo $this->lib_locations->full_info($id_location); ?></b></td>
</tr>

</table>
<br/>
<?php echo $this->lib_url->backend_link_del($ID); ?>