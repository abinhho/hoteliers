<?php if(!empty($error_messenger)) echo "<div class='error_messenger'>".$error_messenger."</div>"; ?>
<table width="100%" class="feed no_stt">
<tr>
<td align="right">
<?php echo form_open_multipart($this->lib_url->getUrl()); ?>
<?php echo form_upload('userfile')?>
<?php echo form_submit('submit_upload', "Upload")?>
<span> Click chuột phải vào hình và chọn copy link location để lấy link của hình ảnh	</span>
<?php echo form_close()?>
</td>
</tr>
</table>


<table class="feed" width="100%">
<caption>Danh sách file</caption>
<tbody>
<tr><td>
<ul class="admin_manage_images">
<?php 
$i = 1;
foreach($items as $file_name => $info)
{
	?>
	<li>
	<a rel="lightbox[i]" href="<?php echo base_url('images/images/').'/'.$file_name ?>">
	<?php echo $this->lib_media->show($file_name)?></a>
	<div class="user_do"><?php echo anchor('com_images/backend_com_images/del/'.$file_name, "Xóa", "class='del'"); ?></div>
	</li>
	<?php 
}
?>
</ul>
</td></tr>
</tbody>
</table>