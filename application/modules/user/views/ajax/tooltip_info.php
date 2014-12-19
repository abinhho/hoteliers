<?php $user_thumb = $this->lib_media->show_crop("user" ,$images, 80, 80);  ?>
<div class="tooltip_info_user">
<div class="header">
<img src="<?php echo $user_thumb ?>" class="thumb" />
<div class="right font13">
    <a href="<?php echo base_url('user/'.$ID) ?>/" class="block font14 bold"><?php echo $full_name ?></a>
    <?php if(trim($edu) != ''){ ?>
    <span class="block"><span class="gray">Học vấn:</span> <?php echo $edu ?></span>
    <?php } ?>
    <?php if(trim($job) != ''){ ?>
    <span class="block"><span class="gray">Nghề nghiệp:</span> <?php echo $job ?></span>
    <?php } ?>
    
    <span class="block"><span class="gray">Tham gia:</span> <?php echo $this->lib_date->re_format($date_add, 'd/m/Y') ?></span>
    <span class="block"><span class="gray">Lần cuối:</span> <?php echo $this->lib_date->ago($last_connect) ?></span>
</div>
</div>
<div class="footer">
<i class="sprites score"></i> <b><?php echo $score ?></b><span class="gray font12"> (danh tiếng)</span>
<i class="sprites question"></i> <b><?php echo $n_questions ?></b><span class="gray font12"> (câu hỏi)</span>
<i class="sprites answer"></i> <b><?php echo $n_answers ?></b><span class="gray font12"> (trả lời)</span>
</div>

</div>