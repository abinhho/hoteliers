<div class="social_share after" >
    <!--div class="left">Today: <?php echo $this->lib_date->get('d/m/Y H:i')?> GMT+7</div-->
    <div class="right">
    <span class="bold"><?php echo __("Share")?>: </span>
    <a title="Chia sẻ qua Facebook" target="_blank" href="http://www.facebook.com/share.php?u=<?php echo $this->lib_url->getUrl();?>" class="f"></a>
    <a title="Chia sẻ qua Twitter" target="_blank" href="http://twitter.com/home?status=<?php echo $this->lib_url->getUrl();?>" class="t"></a>
    <a title="Chia sẻ qua Google+" target="_blank" href="https://plus.google.com/share?url=<?php echo $this->lib_url->getUrl();?>" class="g"></a>
    <a title="Đánh dấu trang này" href="#" onclick="return bookmark_page()();" class="bookmark"></a>
    <a title="In trang này" href="#" onclick="window.print(); return false;" class="print"></a>
    </div>
</div>