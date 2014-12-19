<div class="mod_breadcrumb after ">     
    <div class="contents_980 after">         
        <ul  itemscope itemtype='http://data-vocabulary.org/Breadcrumb' class="after">  
        <?php           
        echo "<li class='home'><a href='".base_url()."' itemprop='url' title='{$home_text}'>".__($home_text)."</a></li>";   
        
        foreach($contents_breadcrumb as $row)
        {
        	if($row['href'] != "#")
        	{
        	?>
        	<li itemscope itemtype='http://data-vocabulary.org/Breadcrumb'>
            <a itemprop='url' title='<?php echo $row['tieu_de'] ?>' href='<?php echo $row['href'] ?>'>
            <span itemprop='title'><?php echo $row['tieu_de'] ?></span></a></li>      
        	<?php
        	} 
        }
        $a = $this->template->render('title');
        if($a != @$row['tieu_de']) {
        ?>
        <li><span class='end'><?php echo $this->template->render('title') ?></span></li>
        <?php } ?>                  
        </ul>
        
        <div class="right_">
        <span class="hotline">Hotline: <b><?php echo _PHONE ?></b></span>
        <?php //echo $this->load->view('emails/form_email_promote'); ?>
        </div>
               
     </div>                          
</div>  