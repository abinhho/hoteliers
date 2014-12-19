<table width="100%" cellspacing="0" cellpadding="0">
<tr>
    <td width="50%"  class="pd_right_20" valign="top">
    <?php $link_more = $this->lib_url->change_url('', array('usertab'=>'question')) ?>
    <h4 class="title_view_questions font16 f_font1"><?php echo $topics['nRow'] ?> <span class="gray">Sản phẩm đã đăng</span>
    <!--a class="right" rel="nofollow" href="<?php echo $link_more ?>"><i class="fa fa-arrow-circle-right"></i> xem thêm</a-->
    </h4>
    <?php if($topics['nRow']){ ?>
    <div class="mod_user small_items font14">
        <ul>
        <?php foreach($topics['items'] as $i => $row){
        	$link = $this->lib_menu->make_link(array( "pages" => '' ) , array($row['ID'] => $row['tieu_de']) );
         ?>
        
          <li><a href="<?php echo $link; ?>"><?php echo $row['tieu_de']; ?></a> 
        <span class="font12 color44"> – <?php echo $this->lib_date->ago($row['date_upd']) ?></span>
         <?php if($this->lib_auth->check_permission($row['user_id'])){ ?>
            – <a href="<?php echo base_url('post/'.$row['ID']) ?>"><i class="fa fa-pencil-square-o"></i> Sửa</a>
         <?php } ?>
        </li>
        
        <?php if($i == 10) break; } ?>
        </ul>
    </div>
    <a rel="nofollow" class="color44 rfloat mg_top_10" href="<?php echo $link_more ?>"><i class="fa fa-arrow-circle-right"></i> xem thêm</a>
    
    <?php } else { ?>
    <span class="gray">Chưa có sản phẩm nào</span>
    <?php } ?>
    </td>
     <td width="50%"  class="pd_right_10" valign="top">
     <?php if($this->session->userdata('ID')){ ?>
        <?php $link_more = $this->lib_url->change_url('', array('usertab'=>'notes')) ?>
        <h4 class="title_view_questions font16 f_font1"><span class="gray">Thông báo </span>
        <!--a class="right" rel="nofollow" href="<?php echo $link_more ?>">xem thêm</a-->
        </h4>
        
        <?php if($notes['nRow']){ ?>
        <div class="mod_user small_items font14">
            <ul>
            <?php foreach($notes['items'] as $i => $row){ ?>
            
            <li><?php echo anchor('user/'.$row['user_id_from'], $row['full_name']) ?>
            <?php echo $row['action_name'] ?> <?php echo anchor($row['link'], $row['tieu_de']) ?>
             – <span class="gray font12"><?php echo $this->lib_date->ago($row['date_upd']) ?></span>
            </li> 
            
            <?php if($i == 10) break; } ?>
            </ul>
        </div>
        <a rel="nofollow" class="rfloat mg_top_10" href="<?php echo $link_more ?>"><i class="fa fa-arrow-circle-right"></i> xem thêm</a>
        
        <?php } else { ?>
        <span class="gray">Không có thông báo nào!</span>
        <?php } ?>
        
        <?php } ?>
    </td>
    <td valign="top" class="pd_left_10" >
    
    </td>
</tr>  

</table>