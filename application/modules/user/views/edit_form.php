<?php echo validation_errors('<div class="error_messenger">',"</div>"); ?>
<?php if(!empty($error_messenger)) echo "<div class='error_messenger'>".$error_messenger."</div>"; ?>
<?php $style_input_larger = "style='width:250px'";
$style_area_larger = "style='width:97%'";
 ?>

<?php echo form_open_multipart($this->lib_url->getUrl()); ?>
<div class="user_form mod_user">
</h1>
<div class="d2_col_equa s1 after">

<div class="col_1">
    <table width="100%" cellpadding="4">
        <tr>
            <td rowspan="100" width="10px" class="tcenter pd_right_10" valign="top">
            <div  class="full_user_info">
				<?php $hinh_anh = $this->lib_media->show_crop("user" ,$images, 128, 128); ?>
				<img border="0" class="main"  alt="<?php echo $full_name; ?>" src="<?php echo $hinh_anh ; ?>" />
            </div>
            </td>
            <td class="gray" width="130px">Họ tên</td>
            <td><?php echo myform_input('user[full_name]', $full_name , "maxlength='20' class='input_text capitalize'". $style_input_larger); ?></td>
        </tr>
        <tr>
            <td class="gray">Email</td>
            <td><a href="mailto:<?php echo $email ?>"><?php echo $email ?></a></td>
        </tr>
        
        <tr>
            <td class="gray">Mật khẩu</td>
            <td>
            <?php echo form_hidden('old_password', base64_encode(@$password) ) ?>
            <?php echo form_password('password',base64_encode(@$password), "class='input_text'"); ?></td>
        </tr>
        
        <tr>
            <td class="gray">Xác nhận mật khẩu</td>
            <td> <?php echo form_password('re_password',base64_encode(@$password) , "class='input_text'"); ?></td>
        </tr>
        
        <tr>
            <td  class="gray">Học vấn</td>
            <td><?php 
            $edu_options = array(
                "Trung cấp"
                ,"Cao đẳng"
                ,"Đại học"
                ,"Cao học"
                ,"Tiến sỹ"
                ,"Thạc sỹ"
                ,"Giáo sư"
                ,"Phổ thông"
                ,"Khác"
            );
            echo myform_dropdown($name = 'user[edu]', $edu_options, $edu, $extra = '') ?></td>
        </tr>
         <tr>
            <td  class="gray">Nghề nghiệp</td>
            <td><?php echo myform_input('user[job]', $job , "class='input_text'". $style_input_larger); ?></td>
        </tr>
         <tr>
            <td  class="gray">Sinh nhật</td>
            <td><?php   echo $this->lib_form->birthday(@$birthday); ?></td>
        </tr>
       
         <tr >
            <td class="gray">Địa chỉ</td>
            <td><?php echo myform_input('user[address]', $address , "class='input_text'". $style_input_larger); ?></td>
        </tr>
         <tr >
            <td class="gray">Website</td>
            <td><?php echo myform_input('user[website]',  $website , "class='input_text'". $style_input_larger); ?></td>
        </tr>
        <tr>
            <td class="gray">Điện thoại</td>
            <td><?php echo myform_input('user[phone]',  $phone , "class='input_text'"); ?></td>
        </tr>
        
        <tr>
            <td class="gray">Ảnh đại diện</td></td>
            <td>
            	<?php echo form_upload("userfile") ?>
              	<?php echo form_hidden("old_images",@$images); ?>
              	<label class="block mg_top_10 gray">Ảnh mới sẽ được ghi đè lên ảnh cũ.</label>
            </td>
        </tr>
        
        <tr>
            <td></td>
            <td>
				<?php echo form_submit('submit_user_info', 'Cập nhật ngay',"class='button'"); ?><br />
            </td>
        </tr>
        
    </table>
</div>
<div class="col_2">
    <span class="gray block mg_bottom_10">Đôi nét về bản thân</span>
    <div class="user_description"><?php echo myform_textarea('user[about]', $about, "class='area'".$style_area_larger); ; ?></div>
</div>

</div>
<br />
 <?php 	echo form_close(); ?>
 </div>
