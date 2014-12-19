<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Lib_upload{
	var $config_upload  = array(
			'allowed_types' => 'jpg|jpeg|gif|png|swf',
			'max_size' => 2000
			);
    var $type_image = array(".jpg",".jpeg",".png",".gif");
	var $allowed_files = 'jpg|jpeg|gif|png|swf|doc|docx|pdf|xls|xlsx|ppt|pptx|mm|zip|rar|gz|gz2|7z|txt';
			
	var $image_type = array("jpeg","png","gif");
	var $data = array();
	var $CI;
	var $create_thumb = false;
	
	public function __construct(){
		$this->CI = &get_instance();
		$this->CI->load->library('lib_alias');
		$this->CI->load->library("image_lib");
	}
    
    function saved_img($uploaddir, $url, $width, $height ,$crop=true)
	{
		if($url!=""){
			
			$file_ext = ".jpg";
			$this->CI->lib_image->load($url);
			
			if($crop)
				$this->CI->lib_image->crop($width,$height);
				
			$new_name=time()."-".rand().rand().$file_ext;
			$this->CI->lib_image->save($uploaddir . '/'. $new_name);
			return $new_name;
			}
		return "";
		
	}
    public function upload_image($uploaddir, $myfile="myfile",$w=600 )
	{
		
		$filename = $_FILES[$myfile]["name"]; //echo $filename; exit;
		if($filename != ""){
			$this->CI->lib_image->load($_FILES[$myfile]['tmp_name']);
			$this->CI->lib_image->resizeToWidth($w);
		   
			$file_ext = strtolower(substr($filename, strripos($filename, '.')));
			
			$filesize = $_FILES[$myfile]["size"];
			
			if( !defined('IMG_FILE_SIZE_UPLOAD') )
			define("IMG_FILE_SIZE_UPLOAD","2048000");
			
			if($filesize >IMG_FILE_SIZE_UPLOAD)
			return -2;
			
		
            $newfilename = time()."-".rand().rand().$file_ext;
			$uploadfile=$uploaddir .'/'. $newfilename;
			
			if(in_array($file_ext,$this->type_image)){
				//if (move_uploaded_file($_FILES['myfile']['tmp_name'], $uploadfile) && $filename !="")
                $this->CI->lib_image->save($uploadfile,IMAGETYPE_JPEG);
                
			     return $newfilename;
			}
			else return -1; //invalid file type
		}
		else return -3;
	
	}
	public function upload_media($new_filename){
		
		$this->config_upload['file_name'] =  $this->create_filename($new_filename);
		$this->CI->load->library('upload', $this->config_upload);
		
		if($this->CI->upload->do_upload())
		{
			$this->data = $this->CI->upload->data();
			
			if(in_array( $this->data['image_type'], $this->image_type ) && $this->create_thumb ){
				/*$this->config_upload['upload_path']*/
				$config = array("source_image" => $this->config_upload['upload_path']."/".$this->data['file_name'],
	                        "new_image" => $this->config_upload['upload_path'] . "/thumbs",
	                        "maintain_ration" => true,
	                        "width" => '100',
	                        "height" => "100");
				
		        $this->CI->image_lib->initialize($config);
		        $this->CI->image_lib->resize();
		        echo $this->CI->image_lib->display_errors();
			}
			return true;
		}
		else
		{
			$this->display_errors = $this->CI->upload->display_errors();
			return false;	
		}
	}
	
	public function upload_files(){
		
		$temp = substr($_FILES['userfile']['name'], 0, strripos($_FILES['userfile']['name'], '.'));
		$new_filename = $this->CI->lib_alias->convert2Alias($temp); 
		
		$this->config_upload['file_name'] =  $new_filename;
		
		$this->config_upload['allowed_types'] = $this->allowed_files;
		
		$this->CI->load->library('upload', $this->config_upload);
		
		if($this->CI->upload->do_upload())
		{
			$this->data = $this->CI->upload->data();
			return true;
		}
		else
		{
			$this->display_errors = $this->CI->upload->display_errors();
			return false;	
		}
	}
	
	
	public function create_filename($filename){
		$temp = substr($filename, 0, strripos($filename, '.'));
		return rand()*rand()+time().'-'.$this->CI->lib_alias->convert2Alias($temp);
	}
}