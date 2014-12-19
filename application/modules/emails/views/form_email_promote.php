<?php if(isset($submit_email)) echo validation_errors('<div class="error_messenger">',"</div>"); ?>
<?php if(!empty($error_messenger)) echo "<div class='error_messenger'>".$error_messenger."</div>"; ?>
<div class="form_email_promote">
<!--div class="info_block"><h6>Đăng ký email</h6><p>Đăng ký nhận các thông tin từ chúng tôi.</p></div-->
<b>Đăng ký email</b>
<?php echo form_open('emails/do_email', "target = 'temp_frame'")?>
<?php echo form_input('email','', "class='email' placeholder='Nhận email giảm giá...'")?>
<?php echo form_submit('submit_email', 'Đăng ký', "class='button'")?>
<?php echo form_close();?>

</div>

<?php if(!empty($error_messenger) ) {
?>
<script type="text/javascript">
parent.alert_messenger("<?php echo $error_messenger; ?>");
</script>
<?php } ?>


<?php if(validation_errors() != "" ) { 
?>
<script type="text/javascript">
parent.alert_messenger('<?php echo str_replace("\n",'',validation_errors('-','.')) ;?>');
</script>
<?php } ?>