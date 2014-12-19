<div class="block_customer_ideals after">
<?php echo $this->lib_blocks->info_block('block_customer_ideals'); ?>

<div id="block_customer_ideals">
    <?php
    foreach($items as $row) {
     ?>
        <div class="contents">
            <p class="nd"><?php echo $row['noi_dung']; ?></p>
            <p class="full_name"><?php echo $row['full_name']; ?></p>
        </div>
    
    <?php } ?>
</div>
</div>


<script type="text/javascript">
$(document).ready(function(){
$('#block_customer_ideals').cycle({
   fx: 'turnDown',
   //next:'#spnbNext',
   //prev:'#spnbPrev'
});
});
</script>