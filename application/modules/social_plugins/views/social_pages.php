<div class="block_social_pages">
<span class="desc"><?php echo __('Chia sẻ mạng xã hội') ?></span>
<ul class="after">
    <li class="twitter">
    <?php if(TWITTER_PAGE!=''){ ?><a title="Follow us on Twitter" target="_blank" href="<?php echo TWITTER_PAGE ?>">Follow us on Twitter</a></li>
    <?php } if(FACEBOOK_PAGE!=''){ ?>
    <li class="facebook"><a title="Become a fan on Facebook" target="_blank" href="<?php echo FACEBOOK_PAGE ?>">Become a fan on Facebook</a></li>
    <?php } if(GOOGLE_PAGE!=''){ ?>
    <li class="gplus"><a title="Follow us on Google Plus" target="_blank" href="<?php echo GOOGLE_PAGE ?>">Follow us on Google Plus</a></li>
    <?php } ?>
    <li class="rss"><a title="Subscriber to RSS Feed" target="_blank" href="<?php echo base_url('rss')?>">Subscriber to RSS Feed</a></li>
    <?php if(YOUTUBE_PAGE!=''){ ?>
    <li class="youtube"><a title="Follow us on youtube" target="_blank" href="<?php echo YOUTUBE_PAGE ?>">Follow us on youtube</a></li>
    <?php } ?>
</ul>
</div>