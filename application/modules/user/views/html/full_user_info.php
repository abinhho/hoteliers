<?php $cl = ($w <48 )? 'small' : '' ?>
<div class="full_user_info <?php echo $cl.' '.@$bg ?>">

<?php 
$user_thumb = $this->lib_media->show_crop("user" ,$user_images, $w, $h); 
?>
<a href="<?php echo base_url('user/'.$user_ID) ?>">
    <img border="0" class="thumb lazy lfloat"  alt="<?php echo $user_full_name; ?>" data-original="<?php echo $user_thumb ; ?>">
</a>
<div class="right">
<a class="tooltip_userinfo" <?php echo (isset($itemprop)) ? $itemprop : '' ?> data-id="<?php echo $user_ID ?>" href="<?php echo base_url('user/'.$user_ID) ?>"><?php echo $user_full_name?></a>
<div class="score_info">
    <span class="score_" t_title="Danh tiếng"><i class="sprites score"></i><?php echo $user_score ?></span>
    <span class="question_"  t_title="Đã hỏi"><i class="sprites question"></i><?php echo $user_n_questions ?></span>
    <span class="answer_"  t_title="Đã trả lời"><i class="sprites answer"></i><?php echo $user_n_answers ?></span>
</div>

<!--div class="ab_right">
    <a href="#" class="follow btn_hover"><strong>4.567</strong> theo dỏi</a>
</div-->

</div>

</div>