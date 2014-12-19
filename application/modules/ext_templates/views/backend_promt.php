<?php echo validation_errors('<div class="error_messenger">',"</div>"); ?>
<?php if(!empty($error_messenger)) echo "<div class='error_messenger'>".$error_messenger."</div>"; ?> 

<p class="note"><b>Chú ý: </b>Việc chỉnh sửa template không đúng sẽ làm hõng website, vui lòng liên hệ với bộ phận kỹ thuật để biết thêm.</p>
<textarea style="width:670px;height:400px;" name= "content_template"><?php echo $contents;?></textarea>