<?php 
//$user_id_topic = base64_encode($this->session->userdata('user_id_topic')); ?>

<?php if(!$this->lib_auth->check_permission($user_id_topic)) redirect(); ?>

<h4 class="title_view_questions font16 f_font1"><?php echo $notes['nRow'] ?> thông báo 
<a class="right " onclick="return del_user_notes('<?php echo encode_me('all;'.$user_id_topic); ?>', $(this) )">Xóa tất cả thông báo</a>
</h4>
    <div class="mod_questions small_items font14">
        <ul>
        <?php foreach($notes['items'] as $row){ 
            $data_del =  encode_me($row['p_ID'].';'.$user_id_topic);
            ?>
          <li><?php echo anchor('user/'.$row['user_id_from'], $row['full_name']) ?> – 
            <?php echo $row['action_name'] ?> <?php echo anchor($row['link'], $row['tieu_de']) ?>
             – <span class="gray font12"><?php echo $this->lib_date->ago($row['date_upd']) ?></span>
             <i class="sprites close" onclick="return del_user_notes('<?php echo $data_del  ?>', $(this) )" t_title="Xóa thông báo này"></i>
            </li> 
        <?php } ?>
        </ul>
        <br />
        <?php echo $notes['split_page']; ?>
</div>