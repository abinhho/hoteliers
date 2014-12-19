<table class="feed" width="100%">
<caption>Danh sách ngôn ngữ <?php echo $this->lib_url->backend_link_edit_promt("com_translate"); ?></caption>
<thead>
<tr>
<td><?php echo $this->lib_url->change_order_col("ID","STT")?></td>
<?php foreach ($arr_langs as $lang): ?>
<td><?php echo $this->lib_url->change_order_col($lang,$lang)?></td>
<?php endforeach; ?>
<td width="100px" align="center">Hành động</td>
</tr>
</thead>
<tbody>
<?php 
$i = 1;
foreach($items as $row)
{
		?>
		<tr>
		<td><?php echo $i; ?></td>
		
		<?php foreach ($arr_langs as $lang): ?>
		<td><?php echo $row[$lang]?></td>
		<?php endforeach; ?>
		
		<td align = "center">
			<?php echo $this->lib_url->backend_link_edit_promt("com_translate" , $row['ID']); ?>
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
<?php echo anchor('com_translate/backend_com_translate/to_csv', "Xuất ra file", "class='excel rfloat'");  ?>