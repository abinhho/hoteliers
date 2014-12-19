<?php
$style_input_small = "style='width:250px'";
$style_input_larger = "style='width:500px'";

$this->lib_form->input_tr_inline = true;
$list_phong_ban = array("" => "") + $list_phong_ban;
?>

<table width="100%">
<tbody>

<tr><td>Catagory</td>
	<td>
	  	<?php echo form_dropdown('phong_ban', $list_phong_ban , @$phong_ban); ?>
	  	<?php echo form_input("new_phong_ban", set_value('new_phong_ban' , '' ), $style_input_small ); ?>
	  	<label class="admin_form_hint">Chọn hoặc nhập để thêm mới.</label>
  	</td> 
</tr>

<?php echo $this->lib_form->form_input_tr('name' , @$name , $style_input_small , "Tên") ; ?>
<?php echo $this->lib_form->form_input_tr('yahoo' , @$yahoo , $style_input_small , "Nick yahoo") ; ?>
<?php echo $this->lib_form->form_input_tr('skyper' , @$skyper , $style_input_small , "Nick skyper") ; ?>
<?php echo $this->lib_form->form_input_tr('email' , @$email , $style_input_larger , "Email") ; ?>
<?php echo $this->lib_form->form_input_tr('phone' , @$phone , $style_input_small , "Điện thoại") ; ?>
</tbody>  
</table>