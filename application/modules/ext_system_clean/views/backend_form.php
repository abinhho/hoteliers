<?php echo validation_errors('<div class="error_messenger">',"</div>"); ?>
<?php if(!empty($error_messenger)) echo "<div class='error_messenger'>".$error_messenger."</div>"; 

$style_input_250 = "style='width:250px'";
$style_input_500 = "style='width:500px'";

$this->lib_form->input_tr_inline = true;
?>

<?php echo form_open($this->lib_url->getUrl()); ?>

<table class="feed no_stt mg_top_10" width="100%">
<caption>Dọn dẹp hệ thống</caption>

<tbody>
<tr><td> <label>Xóa tất cả hình ảnh không sử dung trong thư mục <strong class='red'>images/<?php echo $folder; ?>/</strong>
việc xóa này không ảnh hưởng đến các bài viết đã đăng.</label></td></tr>
</tbody>

<tr><td><?php echo form_submit('submit', 'Xóa ngay',"class='button_admin'"); ?></td></tr>  
</table>

<?php echo form_close();
if($this->input->post('submit')){
?>


<br/><b>Đã xóa <?php echo count($deleteds); ?></b> file<br/><br/>
<?php foreach ($deleteds as $del)
      {
        echo "<span class='red'>".$del."</span><br/>";
      }
      
}
?>