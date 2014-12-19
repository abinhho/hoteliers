<?php echo validation_errors('<div class="error_messenger">',"</div>"); ?>
<?php if(!empty($error_messenger)) echo "<div class='error_messenger'>".$error_messenger."</div>";
 
$style_textarea = "style='width:-moz-available;height:40px;'";
$style_input_100 = "style='width:100px'";
$style_input_500 = "style='width:500px'";

$this->lib_form->input_tr_inline = false;
echo init_ckeditor();

$body_layout_list = array("" => "");
$body_layout_list += $this->config->item('body_layout');
?>

<?php echo form_open_multipart($this->lib_url->getUrl() , "id='mainform'"); ?>

<table class="feed no_stt mg_top_10" width="100%">
<caption>Thêm, chỉnh sửa bài viết</caption>
<tbody>

<?php  
$conf['media_folder'] = "albums";
$conf['images'] = @$images;
$this->load->view("ext_images/ext_images_view", $conf); ?>


<?php echo $this->lib_form->form_dropdown_tr('body_layout' , $body_layout_list , @$body_layout, "" , "Body layout") ; ?>

 <?php echo $this->lib_form->form_tr_lang('input' , 'tieu_de', $style_input_500 , "Tiêu đề") ; ?>
 <?php echo $this->lib_form->form_tr_lang('textarea' , 'description', $style_textarea , "Mô tả ngắn (description)") ; ?>
 <?php echo $this->lib_form->form_tr_lang('textarea' , 'keywords', $style_textarea , "Từ khóa (keywords)") ; ?>
 
 <?php //echo $this->lib_form->form_tr_lang('ckeditor' , 'noi_dung', "" , "Nội dung") ; ?>

</tbody>

<tr><td>
<input type="submit" name ="submit" class="button_admin" value="Upload" onclick = "return submit_form({action:'<?php echo $this->lib_url->getUrl() ?>', target:''})" />
</td></tr>  
</table>

<?php echo form_close(); ?>