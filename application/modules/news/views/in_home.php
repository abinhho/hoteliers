<div class="mod_news in_home after">
<table>
<?php 
foreach($items as $i => $row)
{ 
    $odd = ($i%2 == 1)? 'odd' : '';
    if($i %2 == 0 ) echo "<tr>";
    
    $link_cata = $this->lib_menu->make_link(array($row['ID'] => $row['tieu_de']), array());
    
    ?>
    
    <td class="each_col <?php echo $odd ?>">
    <img class="larger_img"  src="<?php echo base_url($row['images']) ?>"/>
    <h2><a href="<?php echo $link_cata ?>"><?php echo $row['tieu_de'] ?></a></h2>
    
    <?php 
    $items_list = $row['items'];
    if(count($items_list)){ 
    $list = $items_list[0];
    unset($items_list[0]);   
    ?>
    
    <div class="main_topic after">
    <img class="small_img"  src="<?php echo base_url($row['images1']) ?>"/>
    <a href="<?php echo $this->lib_menu->make_link(array($list['catid'] => "") , array($list['ID'] => $list['tieu_de']) );  ?>"><?php echo $list['tieu_de'] ?></a>
    <p><?php echo $list['description'] ?></p>
    
    
    <?php if(count($items_list)){  ?>
    <ul>
    <?php 
        
        foreach($items_list as $list){
            $link = $this->lib_menu->make_link(array($list['catid'] => "") , array($list['ID'] => $list['tieu_de']) );
            ?>
            <li><a href="<?php echo $link ?>"><?php echo $list['tieu_de'] ?></a></li>
            <?php
        }
    
     ?>
    </ul>
    
    <?php } ?>
    
    <a rel="nofollow" href="<?php echo $link_cata ?>" class="button_viewmore rfloat">xem thêm</a>
    </div>
    
    
    <?php } ?>
    </td>
    
<?php 
    if(($i+1) %2 == 0 || $i == (count($items) -1) ) echo "</tr>";
}
 ?>
</table>
</div>