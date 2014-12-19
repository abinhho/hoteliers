<div class="mod_support_block">
<?php echo $this->lib_blocks->info_block('block_support'); ?>
<ul class="support">
<?php 
foreach($items as $row){ ?>
<li>
<?php if($row['name'] != "") { ?>
<span class="name"><?php echo $row['name'];?></span>
<?php }?>

<?php if($row['phone'] != "") { ?>
<span class="phone"><?php echo $row['phone'];?>.</span>
<?php }?>

<?php if($row['yahoo'] != "") { ?>
<a href="ymsgr:sendIM?<?php echo $row['yahoo']?>" >
<img src="http://opi.yahoo.com/online?u=<?php echo $row['yahoo']?>&m=g&t=2">
</a>
<?php }?>

<?php if($row['skyper'] != "") { ?>
<a href="skype:<?php echo $row['skyper']?>?chat"><img src="http://download.skype.com/share/skypebuttons/buttons/chat_green_transparent_97x23.png"></a>
<?php } ?>

</li>

<?php } ?>
</ul>

</div>