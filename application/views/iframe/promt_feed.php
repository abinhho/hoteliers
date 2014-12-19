<?php
if(!isset($feed))
		$feed = array();


$err_vali = validation_errors();
if(!empty($err_vali) )
{
		
	$feed['ok'] = "error";
	$feed['messenger_promt'] = $err_vali;
}
else {
	if(isset($ok))
	$feed['ok'] = $ok;
	else 
	$feed['ok'] = "reload";
	
	if(isset($messenger))
	{
		$feed['messenger'] = $messenger;
	}
	
	if(isset($messenger_promt))
	{
		$feed['messenger_promt'] = $messenger_promt;
	}
}
?>
<script type="text/javascript">
parent.FRAME.feed_back_promt(<?php echo json_encode($feed); ?>);
</script>