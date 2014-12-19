<h4 class="cata font16 f_font1"><?php echo $topics['nRow'] ?> bài viết/ trang</h4>
    <div class="mod_user small_items font14">
        <ul>
        <?php foreach($topics['items'] as $row){
        	$link = $this->lib_menu->make_link(array( "questions" => $row['catid'] ) , array($row['ID'] => $row['tieu_de']) );
         ?>
        <li><a href="<?php echo $link; ?>"><?php echo $row['tieu_de']; ?></a> 
        <span class="font12 color44"> – <?php echo $this->lib_date->ago($row['date_upd']) ?> </span> 
        
        <?php if($this->lib_auth->check_permission($row['user_id'])){ ?>
        – <a href="<?php echo base_url('post/'.$row['ID']) ?>"><i class="fa fa-pencil-square-o"></i> Sửa</a>
        <?php } ?>
        </li>
        <?php } ?>
        </ul>
        <br />
        <?php echo $topics['split_page']; ?>
</div>