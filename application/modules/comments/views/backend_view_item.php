<?php echo form_open($this->lib_url->getUrl()); ?>
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
	<td colspan="2"><label class="label_1">Nội dung: </label></td></tr><tr>
	<td colspan="2"><div class="quote"><?php echo $noi_dung; ?></div></td>
</tr>

<tr>
	<td><label class="label_1">Kích hoạt: </label></td>
	<td><?php echo form_checkbox('active', 1, set_checkbox('active', 1 , ($active == 1) ? TRUE : FALSE  )); ?>
	<?php echo form_submit('submit', "Thực hiện")?>
	</td>
</tr>
</table>
<br/>
<?php echo form_close()?>
<br/>
<?php echo $this->lib_url->backend_link_del($ID); ?>