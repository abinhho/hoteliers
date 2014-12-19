<?php if(!empty($error_messenger)) echo "<div class='error_messenger'>".$error_messenger."</div>"; 
$style_textarea = "style='width:-moz-available;height:80px;'";
$style_input_500 = "style='width:500px'";
?>
<?php echo form_open($this->lib_url->getUrl()); ?>
<table width="100%" class="feed no_stt">  
<caption>Cấu hình chung</caption>  
<?php echo $this->lib_form->form_dropdown_tr('body_layout',$this->config->item('body_layout') , $body_layout, "" , "Kiểu trang") ; ?>

<?php echo $this->lib_form->form_tr_lang('input' , 'name_page' , "" , "Tên trang") ; ?>

<?php echo $this->lib_form->form_tr_lang('input' , 'home_title', $style_input_500 , "Tiêu đề trang chính") ; ?>

<?php echo $this->lib_form->form_tr_lang('input' , 'page_address' , $style_input_500 , "Địa chỉ của bạn") ; ?>

<?php echo $this->lib_form->form_tr_lang('textarea' ,'description' , $style_textarea , "Description") ; ?>

<?php echo $this->lib_form->form_tr_lang('textarea' , 'short_description' , $style_textarea , "Short description") ; ?>

<?php echo $this->lib_form->form_input_tr('slogan',set_value('slogan',$slogan) , $style_input_500 , "Câu slogan") ; ?>
<?php echo $this->lib_form->form_input_tr('phone',set_value('phone',$phone) , $style_input_500 , "Điện thoại chính") ; ?>
<?php echo $this->lib_form->form_input_tr('email',set_value('email',$email) , $style_input_500 , "Email chính") ; ?>
<?php echo $this->lib_form->form_input_tr('address',set_value('address',$address) , $style_input_500 , "Địa chỉ") ; ?>


<?php echo $this->lib_form->form_input_tr('google_page',set_value('google_page',$google_page) , $style_input_500 , "Google page") ; ?>
<?php echo $this->lib_form->form_input_tr('facebook_page',set_value('facebook_page',$facebook_page) , $style_input_500 , "Facebook page") ; ?>
<?php echo $this->lib_form->form_input_tr('twitter_page',set_value('twitter_page',$twitter_page) , $style_input_500 , "Twitter page") ; ?>
<?php echo $this->lib_form->form_input_tr('youtube_page',set_value('youtube_page',$youtube_page) , $style_input_500 , "Youtube page") ; ?>

<?php echo $this->lib_form->form_textarea_tr('google_analytics',set_value('google_analytics',$google_analytics) , $style_textarea , "Google analytics ") ; ?> 
  
<tr>		
	<td align="right">
  	<?php echo form_submit('submit', 'Thực hiện',"class='button_admin'"); ?>
  	</td> 
 </tr>  
</table>
<?php echo form_close(); ?>