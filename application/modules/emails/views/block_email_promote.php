<?php if(isset($submit_email)) echo validation_errors('<div class="error_messenger">',"</div>"); ?>
<?php if(!empty($error_messenger)) echo "<div class='error_messenger'>".$error_messenger."</div>"; ?>

<div class="block_emails_promote pd_10 block_white mg_bottom_10">
<?php echo $this->lib_blocks->info_block('block_email_promote'); ?>
<?php echo form_open('emails/do_email', "target = 'temp_frame'")?>
<?php echo form_input('email','', "class='email'", 'placeholder="Đăng ký email khuyến mãi..."')?>
<?php echo form_submit('submit_email', 'Send', "class='btn_submit'")?>
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