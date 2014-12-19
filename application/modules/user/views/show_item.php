<?php 
$data_filter = array(
'title' => $title
,'tabs' => 
    array('newest' => 'mới nhất'
    ,'oldest' => 'cũ nhất'
    ,'score' => 'danh tiếng'
    ,'question' => 'số câu hỏi'
    ,'answer' => 'số trả lời'
    )
,'name_order' => 'usersort'
,'hash' => 'usersort_tab'
); 
$this->load->view('ext_filter/tab_questions', $data_filter);?>
<span style="margin: 0px 0 20px;" class="block f_font1 font15 bold"><a href="<?php echo base_url('user/login') ?>">Đăng ký</a> trở thành thành viên của chúng tôi, ban sẽ được giải đáp thắc mắc nhanh nhất, sớm nhất
, chỉ cần 30 giây.</span>
<div class="mod_user show_items after">
<ul class="after">
<?php foreach($items as $row){ 
    
$hinh_anh = $this->lib_media->show_crop("user" ,$row['images'], 80, 80);
if($hinh_anh == "") $hinh_anh = base_url('images/user/noimage.jpg');
$link = base_url('user/'.$row['ID']);
?>
<li class="after" itemscope itemtype="<?php echo $link;?>">
<img width="80px" class="thumb lazy lfloat" width="80" height="80" data-original="<?php echo $hinh_anh ?>" />

<div style="margin:-4px 0 0 90px;">

<a class="title bold font14 f_font1" href="<?php echo $link ?>"><?php echo $row['full_name'] ?></a>· <?php echo $row['score'] ?> <span class="gray">danh tiếng</span>

<div class="full_user_info">
    <div class="score_info">
        <span class="score_"  t_title="Danh tiếng"><i class="sprites score"></i><?php echo $row['score'] ?></span>
        <span class="question_"  t_title="Đã hỏi"><i class="sprites question"></i><?php echo $row['n_questions'] ?></span>
        <span class="answer_"  t_title="Đã trả lời"><i class="sprites answer"></i><?php echo $row['n_answers'] ?></span>
    </div>
</div>
<span class="gray block font12">Tham gia: <?php echo $this->lib_date->ago($row['date_add']) ?></span>
<span class="gray block font12">Lần cuối: <?php echo $this->lib_date->ago($row['last_connect']) ?></span>

</div>	
</li>

<?php } ?>
</ul>
<?php echo $split_page;?>
<br />
</div>