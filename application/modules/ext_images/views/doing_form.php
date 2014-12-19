<?php 
if(!empty($error_messenger)) {
?>
<script type="text/javascript">
parent.alert_messenger("<?php echo $error_messenger; ?>");
</script>
<?php } 
elseif (!empty($file_name))
{
?>
<script type="text/javascript">
parent.ext_images_upload_feed("<?php echo $file_name; ?>");
</script>
<?php } 
elseif (!empty($del))
{
?>
<script type="text/javascript">
parent.ext_images_del_feed("<?php echo $del; ?>");
</script>
<?php } ?>