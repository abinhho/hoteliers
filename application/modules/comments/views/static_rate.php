<div class='mod_comment_rate only_star'>
<?php if($rate_times != 0 && $rate_times !="")  
$n = $rate/$rate_times; 
else $n = 0;
for($i=1; $i<=5; $i++)  
{
    $active = ($i <= $n)? "active" : '';         
    echo "<span class='each {$active} '></span>";       
    
}
?>
</div>