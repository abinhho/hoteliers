<?php if(!empty($error_messenger)) echo "<div class='error_messenger'>".$error_messenger."</div>"; ?>
<?php
echo init_ckeditor();
echo form_open_multipart($this->lib_url->getUrl()); ?>
<table width="100%" class="feed no_stt">  
<caption>Nội dung footer</caption>  

<?php echo $this->lib_form->form_tr_lang('ckeditor' , 'noi_dung' , "" ,$label = ""); ?>

 <tr>
	<td align="right">
  	<?php echo form_submit('submit', 'Thực hiện',"class='button_admin'"); ?>
  	</td> 
 </tr>  
</table>
<?php echo form_close(); ?>