<table class="feed" width="100%">
<caption>Danh sách người dùng</caption>
<thead>
<tr>
<td>STT</td>
<td width = "50px">Hình ảnh</td>
<td>Tiêu đề</td>
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
		<td><?php echo $this->lib_media->show($row['images'], 80); ?></td>
		<td><?php echo $row['tieu_de']; ?></td>
		<td>
			<?php echo $this->lib_url->backend_link_edit($row['ID']); ?>
			<?php echo $this->lib_url->backend_link_del($row['ID']); ?>
		</td>
		</tr>
		<?php 
		$i++;
}
?>
</tbody>
</table>