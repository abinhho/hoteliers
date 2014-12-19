<?php if(count($items) > 0){ ?>

<div class="block_scroll_image"><marquee behavior="alternate">
<?php  
foreach ($items as $row){
    
    echo "<a href = '{$row['hyperlink']}' title = '{$row['tieu_de']}'>";
    echo $this->lib_media->show($row['images'], $row['width'], $row['height'] , "alt='{$row['tieu_de']}'");
    echo "</a>";
}
?>
</marquee></div>

<?php } ?>