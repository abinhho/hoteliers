<div class="larger_content mod_orders">
<?php echo validation_errors('<div class="error_messenger">',"</div>"); ?>
<?php if(!empty($error_messenger)) echo $error_messenger; ?>
<?php $style_input_larger = "style='width:300px'"; ?>

<div class="user_form nomg">


<?php   echo form_open($this->lib_url->getUrl()); ?>

<div class="cata">
    <span class="left">Mời bạn nhập mã số thẻ để kiểm tra.</span>
</div>

<div class="contents after">

<div class="like_tr after"><label>Mã số thẻ<i class='red'>*</i> : </label>
<div class="td"><?php echo form_input('the_code',  set_value('the_code') , "class='input_text'"); ?>
<?php echo form_submit('submit_check_card', 'Kiểm tra ngay',"class='button mg_left_10'"); ?>
<p class="hint mg_left_10">VD: 1284011223456789</p>
</div>
</div>

<?php if(isset($full_name))
$this->load->view('info_card');
?>

</div>

 <?php  echo form_close();
 ?>
 
 
 </div>


</div>