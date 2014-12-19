<h2 class="title">Kết quả thăm dò ý kiến.</h2>
<table>
<?php     
    $sum = 0;
    foreach($items as $i => $row)
    {
    	$sum += $row['vote_times'];
    }
    foreach($items as $i => $row)
    {
    	$per=(int) ($row['vote_times']/$sum*100);
        $bg="background:red";
        if($per>25)
        $bg="background:green";
        if($per>=50) $bg="background:blue";
    	?>
    	<tr>
        <td><?php echo $row['tieu_de']?>: </td>
        <td width='200px'><span class='per_line' style='width:<?php echo $per?>%; <?php echo $bg?>'></span></td>
        <td><span class='per_num'><?php echo $per; ?>%</span></td>
        </tr>
    	<?php 
    }

?>
</table>