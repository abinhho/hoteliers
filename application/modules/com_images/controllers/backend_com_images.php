<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backend_com_images extends MX_Controller {
	
	public $title = "Quản lý hình ảnh";
	var $media_folder ;
	
	public function __construct(){
       	parent::__construct();
      	
       	$this->media_folder = 'images/images';

       	$this->load->helper('directory');
       	$this->load->helper('file');
       	$this->load->helper('download');
       	$this->load->library('lib_convert');
       	$this->load->library('lib_upload');

       	$this->lib_media->media_folder = base_url('images/images');
       	
       	$this->lib_upload->config_upload['upload_path'] = $this->media_folder;
       	
	}
	public function index()
	{
		$this->show_item();
	}
	public function show_item(){
		
		$data = array();
		$this->template->write('title',$this->title, true);
		
		
		$submit_filter = $this->input->post('submit_filter');
		$submit_upload = $this->input->post('submit_upload');
		if($submit_upload)
		{
			$this->upload_file($data);
		}
		
		$data['items'] = get_dir_file_info($this->media_folder);		
		$this->load->view("show_item",$data);
	}
	
	public function upload_file(&$data)
	{
		if(!empty($_FILES['userfile']['tmp_name'])){
    		
			$this->lib_upload->create_thumb = false;
			
    		if($this->lib_upload->upload_media($_FILES['userfile']['name'])){
				
				$image_data = $this->lib_upload->data;	
				$this->lib_url->reload("Thành công...");
			}
			else {
				$data["error_messenger"] = $this->lib_upload->display_errors;
				return false;
			}
    	}
    	$data["error_messenger"] = "No file selected";
	}
	
	public function download($file_name)
	{
		$data = file_get_contents($this->media_folder.'/'.$file_name); 
        force_download($file_name, $data);
	}
	public function del($file_name)
	{
		unlink($this->media_folder.'/'.$file_name);
		$this->lib_url->redirect_to_back();
	}
	
}
 
