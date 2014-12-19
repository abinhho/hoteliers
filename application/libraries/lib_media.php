<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Lib_media{
	var $media_folder;
	var $CI;
	var $image_type = array("image/jpeg","image/png","image/gif");
	public function __construct(){
        $this->CI = & get_instance();
        $this->CI->load->library("image_lib");
        $this->CI->load->library("lib_image");
	}
    public function index(){
    	
    }
    public function show($filename,$w='',$h='', $attr = '')
    {	
    	if(empty($filename)) return "";
    	$w = ($w=="")? '': "width = '{$w}'";
		$h = ($h=="")? '': "height = '{$h}'";
		
		$t = preg_split('/,/', $filename);
		$filename = $t[0];
		
		$full_path = $this->media_folder."/".$filename;
		$ext = get_mime_by_extension($filename);
		
		if(in_array($ext,$this->image_type)) 
		return  "<img border='0' src='{$full_path}' {$w} {$h} {$attr} />";
		
		elseif($ext == 'application/x-shockwave-flash')
		{
			return "
			 <object {$attr} classid='clsid:d27cdb6e-ae6d-11cf-96b8-444553540000' codebase='http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0' {$w} {$h}>
			<param name='movie' value='{$full_path}' />
			<param name='quality' value='high' />
			<param name='wmode' value='transparent' />
			<param name='allowScriptAccess' value='always' />
			<embed src='{$full_path}' {$w} {$h} quality='high' wmode='transparent' allowScriptAccess='always' pluginspage='http://www.macromedia.com/go/getflashplayer' type='application/x-shockwave-flash'></embed>
			</object>
			";
		}
    }
    
    public function show_crop($folder, $images, $w, $h)
    {
    	$images = preg_split("/,/", $images);
    	$image = ($images[0]) ? $images[0] : '';
    	
    	if(!file_exists("images/".$folder.'/'.$image)) $image = 'noimage.jpg';
    	
    	
    	$crop_name = 'crop-'.$w.$h.'-'.$image;
    	
    	$cache_img = APPPATH.'cache/'.$crop_name; 
    	if(file_exists($cache_img) )
    	return base_url($cache_img);
    	
    	if(!empty($image))
    	{
    		$filename = "images/".$folder.'/'.$image;
    		
    		
    		$this->CI->lib_image->load($filename);
            $this->CI->lib_image->crop($w,$h);
            $this->CI->lib_image->save($cache_img);
            
            return base_url($cache_img);
    	}
   
    }
    
    
    public function show_resize($folder, $images, $w, $h)
    {
        $images = preg_split("/,/", $images);
        $image = ($images[0]) ? $images[0] : '';
        
        if(!file_exists("images/".$folder.'/'.$image)) $image = 'noimage.jpg';
        
        
        $crop_name = 'resize-'.$w.$h.'-'.$image;
        
        $cache_img = APPPATH.'cache/'.$crop_name; 
        if(file_exists($cache_img) )
        return base_url($cache_img);
        
        if(!empty($image))
        {
            $filename = "images/".$folder.'/'.$image;
            
            
            $this->CI->lib_image->load($filename);
            
            if(is_numeric($w)) $this->CI->lib_image->resizeToWidth($w);
            if(is_numeric($h)) $this->CI->lib_image->resizeToHeight($h);
            $this->CI->lib_image->save($cache_img);
            
            return base_url($cache_img);
        }
   
    }
    
    
    public function show_thumb($filename){
    	if(empty($filename)) return;
    	
    	$full_path = $this->media_folder."/thumbs/".$filename;
    	return  "<img border='0' src='{$full_path}' />";
    }
    public function del_media($media_folder, $file_name)
    {
    	@unlink("images/" . str_replace("mod_", "", $media_folder) .'/'. $file_name );	
		@unlink("images/" . str_replace("mod_", "", $media_folder) .'/thumbs/'. $file_name );
    }
    public function remove_file_not_exist_in_list($media_folder, $images)
    {
    	$r = "";
    	$this->CI->load->library("lib_string");
    	$images = preg_split('/,/', $images);
    	foreach ($images as $file_name){
    		
    		if(!empty($file_name)){
    			
    			$file = "images/" . str_replace("mod_", "", $media_folder) .'/'. $file_name ;
    			if(file_exists($file)){
    				
    				$r = $this->CI->lib_string->push_coma($r, $file_name, ",");
    				
    			}
    		}
    	}
    	return $r;
    }
    public function extension($filename)
    {
    	return strtolower(substr($filename, strripos($filename, '.')+1));
    }
}