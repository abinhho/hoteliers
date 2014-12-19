<?php 
class Lib_image {
    var $image;
    var $image_type;
    var $path;
    public $filename = "";
    
function check_image($filename) 
{
    $image_info = @getimagesize($filename);
    if(count($image_info)>0 && $image_info!="")
    return true;
    return false;
}
function load($filename) {
 
    global $TB_url;
    $image_info = getimagesize($filename);
    $this->image_type = $image_info[2];
    if( $this->image_type == IMAGETYPE_JPEG ) {
 
         $this->image = imagecreatefromjpeg($filename);
      } elseif( $this->image_type == IMAGETYPE_GIF ) {
 
         $this->image = imagecreatefromgif($filename);
      } elseif( $this->image_type == IMAGETYPE_PNG ) {
 
         $this->image = imagecreatefrompng($filename);
      }
      $this->path=$filename;
      $this->filename=str_replace("/","-",$filename);
}
function move_to($from,$to,$lists)
{
        $lists=split(",",$lists);
        foreach($lists as $img)
        {
            if(file_exists($from.$img))
            {
                copy($from.$img, $to.$img);
                unlink($from.$img);
            }
        }
        
   }
   
   function water_mark($watermark)
   {
        $watermark = imagecreatefrompng($watermark);  
 
        $watermark_width = imagesx($watermark); 
        $watermark_height = imagesy($watermark); 
         
        $image_path = $this->path;
        
        if ($this->image === false) {
            return false;
        } 
        $size = getimagesize($image_path); 
        
        $dest_x = $size[0] - $watermark_width - 5; 
        $dest_y = $size[1] - $watermark_height - 5;
        
        imagealphablending($this->image, true);
        imagealphablending($watermark, true);
        
        imagecopy($this->image, $watermark, $dest_x, $dest_y, 0, 0, $watermark_width, $watermark_height);
        
        imagedestroy($watermark);  
   }
  function save($filename, $image_type=IMAGETYPE_JPEG, $compression=100, $permissions=null) {
 
      if( $image_type == IMAGETYPE_JPEG ) {
         imagejpeg($this->image,$filename,$compression);
      } 
      elseif( $image_type == IMAGETYPE_GIF ) {
 
         imagegif($this->image,$filename);
      }
      elseif( $image_type == IMAGETYPE_PNG ) {
        
        imagepng($this->image,$filename);
      }
      if( $permissions != null) {
 
         chmod($filename,$permissions);
      }
   }
   function output($image_type=IMAGETYPE_JPEG) {
 
      if( $image_type == IMAGETYPE_JPEG ) {
         imagejpeg($this->image);
      } elseif( $image_type == IMAGETYPE_GIF ) {
 
         imagegif($this->image);
      } elseif( $image_type == IMAGETYPE_PNG ) {
 
         imagepng($this->image);
      }
      
   }
   function getWidth() {
 
      return imagesx($this->image);
   }
   function getHeight() {
 
      return imagesy($this->image);
   }
   function resizeToHeight($height) {
        if($height < $this->getHeight()){
            $ratio = $height / $this->getHeight();
            $width = $this->getWidth() * $ratio;
            $this->resize($width,$height);
        }
   }
 
   function resizeToWidth($width) {
        if($width < $this->getWidth()){
        $ratio = $width / $this->getWidth();
        $height = $this->getheight() * $ratio;
        $this->resize($width,$height);
        }
   }
  function crop($thumb_width,$thumb_height)
   {
        $width = $this->getWidth();
        $height = $this->getheight();
        
        $original_aspect = $width / $height;
        $thumb_aspect = $thumb_width / $thumb_height;

        if ( $original_aspect >= $thumb_aspect )
        {
            $new_height = $thumb_height;
           $new_width = $width / ($height / $thumb_height);
        }
        else
        {
           $new_width = $thumb_width;
           $new_height = $height / ($width / $thumb_width);
        }

        $new_image = imagecreatetruecolor( $thumb_width, $thumb_height );
        imagecopyresampled($new_image,
                           $this->image,
                           0 - ($new_width - $thumb_width) / 2, // Center the image horizontally
                           0 - ($new_height - $thumb_height) / 2, // Center the image vertically
                           0, 0,
                           $new_width, $new_height,
                           $width, $height);
        $this->image = $new_image;
   }
 
  function scale($scale) {
      $width = $this->getWidth() * $scale/100;
      $height = $this->getheight() * $scale/100;
      $this->resize($width,$height);
   }
 
   function resize($width,$height) {
      $new_image = imagecreatetruecolor($width, $height);
      imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
      $this->image = $new_image;
   } 
}
?>