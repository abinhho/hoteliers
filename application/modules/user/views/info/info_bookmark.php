<h4 class="title_view_questions font16 f_font1"><?php echo $bookmark['nRow'] ?> câu hỏi đánh dấu </h4>
    <div class="mod_questions small_items font14">
        <ul>
        <?php 
        if(isset($bookmark['items']) && is_array($bookmark['items']))
        foreach($bookmark['items'] as $row){
        	$link = $this->lib_menu->make_link(array( "questions" => $row['catid'] ) , array($row['ID'] => $row['tieu_de']) );
         ?>
          <li><a href="<?php echo $link; ?>"><?php echo $row['tieu_de']; ?></a> 
        <span class="font12 color44"> – <?php echo $row['n_answers'] ?> <span class="gray">trả lời</span>, <?php echo $row['n_votes'] ?> <span class="gray">điểm</span></span></li>
        <?php } ?>
        </ul>
        <br />
        <?php echo $bookmark['split_page']; ?>
</div>