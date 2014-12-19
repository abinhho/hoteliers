<div class="mod_vote_ideals block_white pd_10 after">
<?php echo $this->lib_blocks->info_block('block_vote_ideals'); ?>
<form class="user_email pd_0_5" action="<?php echo base_url('vote_ideals/do_vote')?>" method="post" target="temp_frame">
<ul>
<?php 
    foreach ($items as $i => $row)
    {
    	$selected = ($i == 0) ? "checked" : "";
    	 echo "<li><input type='radio' name='ideal' {$selected} value='{$row['ID']}' id='id_{$row['ID']}' />
    	 <label for='id_{$row['ID']}'>{$row['tieu_de']}</label></li>";
    }
    
?>
</ul>
<input type="submit" value="<?php echo __("Bình chọn");?>" class="button" name = "submit">
<a href="#" rel="nofolow" onclick="return mod_vote_ideals_result()" > <?php echo __("Xem kết quả")?></a>
</form>
</div>

<div class="mod_vote_ideals_result">
<i class="close"></i>
<div class="content"></div>
</div>

<script type="text/javascript">
$(document).ready(function(){
    mod_vote_ideals_result =function()
    {
        $("#dim_body").fadeIn();
        $(".mod_vote_ideals_result").css({top:$(document).scrollTop()+100+'px',position:'absolute'}).fadeIn()
        .children(".content").load("<?php  echo base_url('vote_ideals/view_result'); ?>");
        
        $(".mod_vote_ideals_result .close").click(function(){
            $(".mod_vote_ideals_result").hide();
            $("#dim_body").hide();
        });
        
        return false;
    }
});

<?php if(!empty($error_messenger) ) {
?>
	parent.alert_messenger("<?php echo $error_messenger; ?>");
<?php } ?>

</script>
