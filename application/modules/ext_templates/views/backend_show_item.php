<table class="feed" width="100%">
<caption>Danh sách file</caption>
<thead>
<tr>
<td>STT</td>
<td>Tên file</td>
<td align='center' width="170px">Hành động</td>

</tr>
</thead>
<?php
$i = 1;
foreach($files as $filename)
    {
    	$fol = (strpos($filename, '.css') === false ) ? 'views' : 'assets/css';
    	
        if(substr($filename, 0, 8) != "backend_" || strpos($filename, '.css') !== false){
        
        $path = APPPATH.'modules/'.$module.'/'.$fol.'/'.$filename;
        $file_edit= base_url('ext_templates/edit_promt/?path='.$path); 
    ?>
            <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $filename; ?></td>
            <td align='center'>
                <a class='edit' onclick="return open_promt({title:'Sửa template',url:'<?php echo $file_edit?>'})" href="#">Sửa</a>
            </td>
            </tr>
        <?php
        $i++;
        }
    
    }
    ?>

</table>

<?php 
if(count($files) == 0)
echo "<p class='no_result'>Không có file nào...</p>";