<div class="column_footer after">
<div class="column first">
<h6>Facebook và chúng tôi</h6>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-like-box" data-colorscheme="light" data-href="<?php echo FACEBOOK_PAGE; ?>" 
data-width="300" data-height="200" data-show-faces="true" data-stream="false" data-header="false"></div>

</div>

<div class="column small">
<h6>Dành cho thành viên</h6>
<ul>
<li><a href="">Giới thiệu HDweb</a></li>
<li><a href="">Gói giải pháp</a></li>
<li><a href="">Quyền lợi</a></li>
<li><a href="">Hỏi đáp</a></li>
<li><a href="">Chia sẻ</a></li>
</ul>
</div>

<div class="column larger">
<h6>Liên hệ</h6>
<h4>Cty TNHH Quảng Cáo & Thương Mại HAPPYCARD</h4>
<p style="font-size: 13px;">Lầu 1, 387 Lạc Long Quân, P.5, Quận 11, Tp. HCM.</p>
<p style="font-size: 13px;">ĐT: (08) 62641973 / 0903.159.246</p>
<p style="font-size: 13px;">Email: happycard.vn@gmail.com / info@happycard.vn</p>
<p>Website: <?php echo anchor('http://happycard.vn')?> - <?php echo anchor('http://hddeals.vn')?></p>

<?php echo $email->form_email_promote() ?>

</div>

</div>