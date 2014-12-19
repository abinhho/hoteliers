<?php if(isset($module)) : ?>
<div class="block_rate after">
<div class="rate_full_info">
<h5 class='caption_rate'>Đánh giá</h5>
<p class='info'>Tổng số điểm là <span class='vote_total'>
<?php echo $rate; ?></span> trong <span class='vote_times'>
<?php echo $rate_times; ?></span> đánh giá
</p>
<?php   

	if($rate_times)  {
	   $n_vote = $rate/$rate_times;  
    }   
	else $n_vote=0; 
	$this->lib_comments->show_star((int) ($n_vote) ,$module, $ID);
?>
<span class='mg_left_10 text_rate'>Click để đánh giá</span>
</div>
</div>


<?php
endif;

$feed=array(
    "vote"=>$rate
    ,"vote_times" => $rate_times
    );
?>

<script type="text/javascript">
parent.RATE.feed_back(<?php echo json_encode($feed); ?>);
</script>