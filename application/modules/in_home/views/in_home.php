<div class="mod_in_home after">
<?php echo Modules::run('news/in_home'); ?>
</div>
<?php $spage = $this->load->module('spage'); 
$colm = $spage->get_by_catagories('VIDEO_TRANG_CHU');
?>
<div class="mod_spage in_home_video">
<?php
echo @$colm[0]['noi_dung']; 
?>
</div>

<?php
$colm = $spage->get_by_catagories('GIOI_THIEU_TRANG_CHU');
?>
<div class="mod_spage in_home_gioi_thieu">
<h4 class="caption"><?php echo @$colm[0] ['tieu_de'] ?></h4>
<?php
$this->lib_media->media_folder = 'images/spage';
echo $this->lib_media->show(@$colm[0] ['images']);
echo @$colm[0] ['noi_dung']; 
?>
</div>