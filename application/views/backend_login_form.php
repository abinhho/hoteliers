<div class='admin_login_form'>
<?php 	echo form_open("/admin/login"); ?>
<table width="400" >
<thead>
<tr>
<td colspan="2" class="title">Login Panel</td>
</tr>
</thead>
<tr>
<td align="right" width="100px"><label>Tên đăng nhập: </label></td>
<td><?php echo form_input('email',  set_value('email')); ?></td>
</tr>
<tr>
<td align="right"><label>Mật khẩu: </label></td><td><?php echo form_password('password',''); ?></td>
</tr><tr>
<td></td>
<td>
<?php echo form_submit('submit', 'Đăng nhập',"class='button_admin'"); ?>
<?php echo validation_errors('<div class="text_error">',"</div>"); ?>
<?php if(!empty($error_messenger)) echo $error_messenger; ?>
</td>
</tr>
</table>
 <?php 	echo form_close(); ?>

</div>