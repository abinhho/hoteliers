<?php echo validation_errors('<div class="error_messenger">',"</div>"); ?>
<?php if(!empty($error_messenger)) echo "<div class='error_messenger'>".$error_messenger."</div>";
 
$style_textarea = "style='width:-moz-available;height:40px;'";
$style_input_small = "style='width:100px'";
$style_input_larger = "style='width:-moz-available'";

$this->lib_form->input_tr_inline = false;
echo init_ckeditor();


?>

<?php echo form_open_multipart($this->lib_url->getUrl() , "id='mainform'"); ?>

<table class="bound_feed  no_stt mg_top_10" width="100%">
<caption>Thêm, chỉnh sửa bài viết</caption>
<tbody>
<tr>
<td valign = "top"><?php $this->load->view('form/backend_left_edit_topic'); ?>

</td>
<td valign = "top" width="300px"><?php $this->load->view('form/backend_right_edit_topic'); ?>

<table class = "feed no_stt mg_top_10" width = "100%">
<tr>
<td>
<?php echo form_checkbox('mod_noi_bat', 1, set_checkbox('mod_noi_bat', 1 , (@$mod_noi_bat == 1) ? TRUE : FALSE  )); ?>
<label class="label_checkbox">Nổi bật</label>
</td></tr>

</table>

</td>
</tr>
</tbody>
</table>

<table class="feed no_stt mg_top_10" width="100%">
<tbody>

<?php  
$conf['media_folder'] = $module_alias;
$conf['images'] = @$images;
$this->load->view("ext_images/ext_images_view", $conf); ?>
<?php echo $this->lib_form->form_input_tr('thumb' , @$thumb , "" , "Hình thumb") ; ?>

<?php echo $this->lib_form->form_input_tr('bought' , @$bought , "" , "Đã mua") ; ?>
 
<?php echo $this->lib_form->form_input_tr('price' , @$price , "" , "Giá đang bán") ; ?>
<?php echo $this->lib_form->form_input_tr('old_price' , @$old_price , "" , "Giá cũ") ; ?>
<?php echo $this->lib_form->form_input_tr('discount' , @$discount , "" , "Khuyến mãi %") ; ?>
<?php echo $this->lib_form->form_tr_lang('ckeditor' , 'features', "" , "Đặc điểm nổi bật") ; ?>
<?php echo $this->lib_form->form_tr_lang('ckeditor' , 'noi_dung', "" , "Mô tả chi tiết") ; ?>
<?php //echo $this->lib_form->form_textarea_tr('map' , @$map, $style_textarea , "Bản đồ đường đi") ; ?>
 

</tbody>

<tr><td>
<input type="submit" name ="submit" class="button_admin" value="Upload" onclick = "return submit_form({action:'<?php echo $this->lib_url->getUrl() ?>', target:''})" />
</td></tr>  
</table>

<?php echo form_close(); ?>

<script type="text/javascript">
$(document).ready(function(){
    $("select[name='tinh_thanh']").change(function(){
    	$("select[name='quan_huyen']").load("<?php echo base_url('locations/backend_locations/dropdown_child_locations')?>/" + $(this).val() );

    });

});
</script>