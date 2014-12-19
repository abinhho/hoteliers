<?php 
$style_textarea = "style='width:-moz-available;height:40px;'";
$style_input_larger = "style='width:-moz-available'";

?>
<table width="100%" class="feed no_stt">
<caption class="no_bg">Lựa chọn mở rộng</caption>
<tbody>

<tr><td>
<?php echo myform_input('the_code', @$the_code)?>
<label class="label_checkbox">Mã</label>
</td>
</tr>

<tr>
<td>
<?php echo form_checkbox('active', 1, set_checkbox('active', 1 , ($active == 1) ? TRUE : FALSE  )); ?>
<label class="label_checkbox">Kích hoạt hiển thị</label>
</td></tr>

<tr><td>
<?php echo form_checkbox('active_comment', 1, set_checkbox('active_comment', $active_comment , ($active_comment == 1) ? TRUE : FALSE )); ?>
<label class="label_checkbox">Cho phép bình luận</label></td></tr>

<tr><td>
<?php echo form_checkbox('active_vote', 1, set_checkbox('active_vote', $active_vote , ($active_vote == 1) ? TRUE : FALSE )); ?>
<label class="label_checkbox">Cho phép đánh giá</label></td></tr>

</tbody></table>

<table class='feed no_stt' width='100%'>

<tr><td>Thời gian đăng</td></tr>
<tr><td><?php echo $this->lib_date->form_date_picker('date_add' , @$date_add, TRUE) ?></td></tr>

<tr><td>Thời gian hết hạn</td></tr>
<tr><td><?php echo $this->lib_date->form_date_picker('date_end' , @$date_end) ?></td></tr>

<?php echo $this->lib_form->form_tr_lang('textarea' , 'keywords', @$style_textarea , "Từ khóa (keywords)") ; ?>
</table>
