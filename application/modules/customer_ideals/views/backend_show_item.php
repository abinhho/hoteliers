<?php echo validation_errors('<div class="error_messenger">',"</div>"); ?>
<?php echo form_open($this->lib_url->getUrl()); ?>


<table class="feed" width="100%">
<caption>Danh sách customer ideal <?php echo $this->lib_url->backend_link_edit_promt("customer_ideals"); ?></caption>
<thead>
<tr>
<td><input type='checkbox' onclick="select_all_check_box($(this),'main_tbody')"></td>
<td><?php echo $this->lib_url->change_order_col("full_name","Họ tên")?></td>
<td><?php echo $this->lib_url->change_order_col("date_upd","Cập nhật")?></td>
<td><?php echo $this->lib_url->change_order_col("active","Trạng thái")?></td>
<td width="100px" align="center">Hành động</td>
</tr>
</thead>
<tbody class="main_tbody">
<?php 
$i = 1;
foreach($items as $row)
	{
		//$link_edit=$TB_url->change_url_arr("",array("op"=>"add", "id"=>$row['ID']) );
		?>
		<tr>
		<td><?php echo form_checkbox('multi_select[]', $row['ID'], false)?></td>
		<td><?php echo $row['full_name']; ?></td>
		<td><?php  echo $this->lib_date->ago($row['date_upd']); ?></td>
        <td><?php echo status_topic($row['active']); ?></td>
		<td align = "center">
			<?php echo $this->lib_url->backend_link_edit_promt("customer_ideals" , $row['ID']); ?>
			<?php echo $this->lib_url->backend_link_del($row['ID']); ?>
		</td>
		</tr>
		<?php 
		$i++;
	}
?>
</tbody>
</table>

<br/>
<?php echo form_submit('submit', "Xóa mục đã chọn"); ?>
<br/><br/>
<?php echo form_close(); ?>
<?php echo $split_page; ?>