<div class="larger_content mod_orders mg_top_20">
<h1>Đăng ký sử dụng <?php echo NAME_PAGE?>.</h1>
<p class="description no_mg">Có Happycard, ăn uống, mua sắm thỏa sức, tiết kiệm chi phí tối đa.</p>
<br/>

<?php echo validation_errors('<div class="error_messenger">',"</div>"); ?>
<?php if(!empty($error_messenger)) echo $error_messenger; ?>
<?php $style_input_larger = "style='width:300px'"; ?>

<div class="user_form">


<?php   echo form_open($this->lib_url->getUrl()); ?>

<div class="cata">
    <span class="left">Nhập thông tin cá nhân</span>
    <span class="right">và thời gian ưu đãi.</span>
</div>

<div class="contents after">

<div class="left">

<div class="like_tr after"><label>Họ tên<i class='red'>*</i> : </label>
<div class="td"><?php echo form_input('order[full_name]',  set_value('order[full_name]') , "class='input_text'"); ?>
<p class="hint">VD: Hồ Thanh Bình</p>
</div>
</div>

<div class="like_tr after"><label>Email<i class='red'>*</i> : </label>
<div class="td"><?php echo form_input('order[email]',  set_value('order[email]') , "class='input_text'". $style_input_larger); ?>
<p class="hint">VD: thanhbinhbk88@gmail.com</p>
</div>
</div>



<div class="like_tr after"><label>Địa chỉ: </label>
<div class="td"><?php echo myform_input('order[address]',  set_value('order[address]') , "class='input_text'". $style_input_larger); ?>
<p class="hint">VD: 387 Lạc Long Quân , Phường 5 , Quận 11 , Tp HCM</p>
</div>
</div>

<div class="like_tr after"><label>Điện thoại<i class='red'>*</i> : </label>
<div class="td"><?php echo myform_input('order[phone]',  set_value('order[phone]') , "class='input_text'"); ?></div>
</div>

<div class="like_tr after"><label>Ngân hàng liên kết<i class='red'>*</i> : </label>
<div class="td">
<?php
    $list_banks = array(
    "ACB" => "Ngân hàng Á Châu"
    ,"Đông Á" => "Ngân hàng Đông Á"
    );
    
    echo form_dropdown('order[bank]', $list_banks , set_value('order[bank]', ''))?>

</div>
</div>


<?php $id_location = ($this->input->post('quan_huyen')) ? $this->input->post('quan_huyen') : 1; ?>

<div class="like_tr after"><label>Tỉnh thành: </label>
<div class="td"><?php echo $locations->dropdown_parent_locations($id_location, 'order_tinh_thanh'); ?></div>
</div>

<div class="like_tr after"><label>Quận huyện: </label>
<div class="td"><?php echo $locations->dropdown_child_locations($id_location,  'order_quan_huyen'); ?></div>
</div>



</div>

<div class="right">
    
    <p><?php echo form_radio('order[loai_the]', '1 tháng')?><label><strong>* 1 tháng</strong></label></p>
    <p><?php echo form_radio('order[loai_the]', '3 tháng')?><label><strong>* 3 tháng</strong></label></p>
    <p><?php echo form_radio('order[loai_the]', '6 tháng')?><label><strong>* 6 tháng</strong></label></p>
    <p><?php echo form_radio('order[loai_the]', '12 tháng' ,'true')?><label><strong>* 12 tháng</strong></label></p>
    <br>
    
    <p><?php echo form_submit('submit', 'Đăng ký ngay',"class='button'"); ?></p>
    
    <strong class="title_hint">Hướng dẫn mua đăng ký.</strong>
    <p class="gray">Mời bạn nhập đầy đủ thông tin bắt buộc(*).</p>
    <p class="gray">Để chúng tôi có thể liên hệ và phục vụ một cách tốt nhất.</p>
    
</div>

</div>

 <?php  echo form_close(); ?>
 </div>


</div>

<script type="text/javascript">
$(document).ready(function(){
    $("select[name='order_tinh_thanh']").change(function(){
        $("select[name='order_quan_huyen']").load("<?php echo base_url('locations/backend_locations/dropdown_child_locations')?>/" + $(this).val() );

    });

});
</script>