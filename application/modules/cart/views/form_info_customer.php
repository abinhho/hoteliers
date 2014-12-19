<div class="larger_content content_payment_info">
<h1>Thông tin thanh toán</h1>
<p class="no_mg">Hãy nhập các thông tin thanh toán dưới đây để hoàn tất việc đặt hàng.</p>
</div>

<?php echo validation_errors('<div class="error_messenger">',"</div>"); ?>
<?php if(!empty($error_messenger)) echo "<div class='error_messenger'>".$error_messenger."</div>"; ?>

<div class="user_form">
<?php 
$style_input_larger = "style='width:300px'"; 
$style_input_largest = "style='width:400px'";
$style_textarea = "style='width:400px'";

$list_payment_method = array( "Thanh toán tại cửa hàng" , "Thanh toán khi giao hàng" , "Thanh toán qua tài khoản ngân hàng" );

?>

<?php   
echo form_open($this->lib_url->getUrl()); ?>
<div class="contents">

<div class="lfloat">

<div class="like_tr after"><label>Phương thức thanh toán: </label>
<div class="td">
<?php echo $this->lib_form->form_dropdown_themself('payment[payment_method]', $list_payment_method ,  set_value('payment[payment_method]') , "class='input_text payment_method'"); ?>
</div>
</div>

<div class="like_tr after"><label>Họ tên<span class="red">*</span>: </label>
<div class="td"><?php echo form_input('payment[full_name]',  set_value('payment[full_name]', @$full_name) , "class='input_text'"); ?>
</div>
</div>

<div class="like_tr after"><label>Email<span class="red">*</span>: </label>
<div class="td"><?php echo form_input('payment[email]',  set_value('payment[email]', @$email) , "class='input_text'". $style_input_larger); ?>
</div>
</div>

<div class="like_tr after"><label>Địa chỉ<span class="red">*</span>: </label>
<div class="td"><?php echo myform_input('payment[address]', set_value('payment[address]' , @$address) , "class='input_text'". $style_input_larger); ?></div>
</div>

<div class="like_tr after"><label>Điện thoại<span class="red">*</span>: </label>
<div class="td"><?php echo myform_input('payment[phone]', set_value('payment[phone]' , @$phone)   , "class='input_text'"); ?></div>
</div>

<div class="like_tr after"><label>Nội dung: </label>
<div class="td"><?php echo form_textarea('payment[noi_dung]',  set_value('payment[noi_dung]') , "class='input_text'".$style_textarea); ?></div>
</div>

<div class="like_tr nobg  after"><label></label>
<div class="td"><?php echo form_submit('submit_payment', 'HOÀN TẤT ĐẶT HÀNG',"class='button'"); ?></div>
</div>
<br />
</div>

<div class="html_payment_method rfloat" style="width: 350px;">

<p class="each">
<b class="font15 main_color">Thanh toán tại cửa hàng của chúng tôi:</b><br />
Quý khách đến nhận hàng và thanh toán tại địa chỉ:<br />
<b><?php echo PAGE_ADDRESS ?></b>
</p>


<p class="each">
<b class="font15 main_color">Thanh toán khi giao hàng:</b><br />
Chúng tôi sẽ giao hàng tận nơi theo địa chỉ quý khách cung cấp.</p>

<p class="each">
<b class="font15 main_color">Thanh toán qua tài khoản ngân hàng:</b><br />
Quý khách mua hàng thanh toán qua ngân hàng vui lòng thanh toán theo thông tin dưới đây. Sau khi thanh toán xong quý khách vui lòng liên hệ lại với thời trang Tích Tắc để xác nhận thông tin.
<br />
a. <b>Ngân hàng Vietcombank</b>
  Tài khoản: <b>0111001362333</b> - Từ Xuân Pha
  Mở tại ngân hàng Vietcombank chi nhánh Cần Thơ.
<br /><br />
b. <b>Ngân hàng Đông Á</b>
  Tài khoản: <b>0104242057</b> - Từ Xuân Pha
  Mở tại ngân hàng Đông Á chi nhánh Cần Thơ.
<br /><br />
c. <b>Ngân hàng Techcombank</b>
  Tài Khoản: <b>19027065774018</b> - Từ Xuân Pha
  Mở tại Chi nhánh Cần Thơ.

</p>

</div>

</div> 
 <?php  echo form_close(); ?>
 </div>
 
 <script type="text/javascript">
 $(document).ready(function(){
    $('.payment_method').change(function(){
       var index = $(this)[0].selectedIndex;
       $('.html_payment_method .each').hide();
       $('.html_payment_method .each'). eq(index). fadeIn(); 
    });
    
 });
 </script>
 