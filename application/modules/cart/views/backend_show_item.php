<?php echo validation_errors('<div class="error_messenger">',"</div>"); ?>
<?php echo form_open($this->lib_url->getUrl()); ?>
<table class="feed" width="100%">
<caption>Danh sách feedback</caption>
<thead>
<tr>
<td><input type='checkbox' onclick="select_all_check_box($(this),'main_tbody')"></td>
<td><?php echo $this->lib_url->change_order_col("full_name","Họ tên")?></td>
<td><?php echo $this->lib_url->change_order_col("email","Email")?></td>
<td><?php echo $this->lib_url->change_order_col("total_qty","Số lượng")?></td>
<td><?php echo $this->lib_url->change_order_col("total_price","Thành tiền")?></td>
<td><?php echo $this->lib_url->change_order_col("date_upd","Cập nhật")?></td>
<td><?php echo $this->lib_url->change_order_col("status","Trạng thái")?></td>
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
		<td><a href="<?php echo base_url('admin?module=cart&id='.$row['ID']);  ?>"><?php echo $row['full_name']; ?></a></td>
		<td><?php echo $row['email']; ?></td>
        <td><?php echo $row['total_qty']; ?></td>
        <td><?php echo number_format($row['total_price']); ?> đ</td>
		
		<td><?php  echo $this->lib_date->ago($row['date_upd']); ?></td>
		<td><?php echo status_order($row['status']) ; ?></td>
		<td align = "center">
			<?php //echo $this->lib_url->backend_link_edit_promt("vote_ideals" , $row['ID']); ?>
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