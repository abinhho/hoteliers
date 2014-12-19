<table width="100%" class="feed no_stt">
<caption>Ý kiến của: <?php echo $full_name; ?></caption>
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
	<td><span class="name_file "><?php echo $location; ?></span></td>
</tr>

<tr>
	<td><label class="label_1">Điện thoại: </label></td>
	<td><b><?php echo $phone; ?></b></td>
</tr>
<tr>
	<td><label class="label_1">Tiêu đề: </label></td>
	<td><span class=" "><?php echo $tieu_de; ?></span></td>
</tr>
<tr>
	<td colspan="2"><label class="label_1">Nội dung: </label></td></tr><tr>
	<td colspan="2"><div class="quote"><?php echo $noi_dung; ?></div></td>
</tr>
</table>
<br/>
<?php echo $this->lib_url->backend_link_del($ID); ?>
