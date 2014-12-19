<table class="feed" width="100%">
<caption>Danh sách vị trí <?php echo $this->lib_url->backend_link_edit_promt("locations"); ?></caption>
<thead>
<tr>
<td>STT</td>
<td>Tên vị trí</td>
<td width="100px" align="center">Hành động</td>
</tr>
</thead>
<tbody>
<?php 
$i = 1;
foreach($items as $row)
    {
        //$link_edit=$TB_url->change_url_arr("",array("op"=>"add", "id"=>$row['ID']) );
        ?>
        <tr>
        <td><?php echo $i; ?></td>
        <td><?php 
        if($this->lib_url->_GET('parent_id') != "")
        echo $row['tieu_de']; 
        else 
        echo anchor($this->lib_url->change_url("", array('parent_id'=> $row['ID']) ) , $row['tieu_de']);
        
        ?></td>
        
        
        <td>
            <?php echo $this->lib_url->backend_link_edit_promt("locations" , $row['ID']); ?>
            <?php echo $this->lib_url->backend_link_del($row['ID']); ?>
        </td>
        </tr>
        <?php 
        $i++;
    }
?>
</tbody>
</table>