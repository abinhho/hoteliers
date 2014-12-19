<div class="mod_spage block_trang_chu_cot_phai after">
<?php foreach($items as $row){ ?>
	<div class="after">
		<div class="info_block"><h6><?php echo $row['tieu_de'] ?></h6></div>

		<?php 
		$this->lib_media->media_folder = 'images/spage';
		echo $this->lib_media->show($row['images'], 80, '', '', false);
		 ?>
		<div class="contents">
		<?php echo @$row['description']; ?>
		<a class="button_viewmore_text" href="<?php echo base_url('spage/'. $this->lib_alias->convert2Alias($row['tieu_de']).'-'.$row['ID'].'.html'  ) ?>">xem thêm</a>
		</div>
	</div>
	<?php } ?>
</div>
