<style type="text/css">
.ext_images_upload_feed{margin:0px 0;background:#fff;padding:10px;}
.ext_images_upload_feed li{width:80px;height:80px;position:relative;display:inline-block;border:1px dashed #cccccc;margin:0 5px 5px 0}

.ext_images_upload_feed li .del,.ext_images_upload_feed li img{position:absolute;top:0; bottom:0;left:0;right:0; margin:auto;}.ext_images_upload_feed li .del{bottom:auto;left:auto;padding:5px 10px;background:#444;color:#fff !important;}
.ext_images_upload_feed li img{max-width:80px;max-height:80px;width:auto;height:auto;}
</style>

<script type="text/javascript">
$(document).ready(function(){
	
	ext_images_upload_feed = function(file_name){
		
		var media_folder = "<?php echo $media_folder; ?>"; 
		var url_unlink = "<?php echo base_url('ext_images/del')?>/"+media_folder+"/"+file_name;
		var li = "<li remove='"+file_name+"'><img src = '<?php echo base_url()?>images/"+media_folder+"/"+file_name+"'/><a href = "+url_unlink+" target = 'temp_frame' class = 'del'>Xóa</a></li>";
		$(".ext_images_upload_feed").append(li);
		$("input[name='userfile']").val('');
		
		var temp = $("input[name='images']").val() + ","+file_name;
		$("input[name='images']").val(temp);
	}
	ext_images_del_feed = function(file_name){
		$("li[remove='"+file_name+"']").remove();
		var temp = $("input[name='images']").val();
		$("input[name='images']").val(temp.replace(file_name,"") );
	}
});
</script>

<tr>
	<td>
		<?php echo form_hidden('media_folder' , $media_folder); ?>
		<input type="file" name="userfile" id="userfile">
		<input type="hidden" name="images" value = "<?php echo $images; ?>">
		<input type="submit" name ="submit" value="Upload" onclick = "return submit_form({action:'<?php echo base_url('ext_images/do_upload/'.$media_folder)?>'})" />
	
	</td>
</tr>
<tr>
	<td>
		<ul class="ext_images_upload_feed">
		<?php 
		$full_media_folder = "images/".$media_folder."/";
		$list_image = preg_split('/,/' , $images);
		
		foreach ($list_image as $image)
		{
			if(!empty($image)):
			$id=rand();
			
			$url_unlink = base_url('ext_images/del/'.$media_folder.'/'.$image);
			$file = $full_media_folder.$image; 
			
			if(file_exists($file)){
				$this->lib_media->media_folder = base_url().'images/'.$media_folder;
		?>		
				<li remove="<?php echo $image?>">
				<?php echo $this->lib_media->show($image); ?>
				<a href = "<?php echo $url_unlink; ?>" target = "temp_frame" class = "del">Xóa</a></li>
		<?php
			}
			endif;
		}
		?>
		</ul>
</td>
</tr>