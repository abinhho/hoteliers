<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ext_images extends MX_Controller {
	
		public $images;
		public function __construct(){
       	parent::__construct();
       	$this->load->helper('form');
       	$this->load->library('lib_upload');
       	
       	$this->_GET_id = $this->lib_url->_GET('id');
	}
	public function index()
	{
		$this->show_item();
	}
	
	public function do_upload($media_folder)
	{
			
		$this->lib_upload->config_upload['allowed_types'] = 'jpg|jpeg|gif|png';
		$this->lib_upload->config_upload['upload_path'] = "images/".$media_folder;
		//print_r ($this->lib_upload->config_media);
		if(!$this->input->post('submit')) return;
				
		if(!empty($_FILES['userfile']['tmp_name'])){
    		
    		if($this->lib_upload->upload_media($_FILES['userfile']['name'])){
				
				$image_data = $this->lib_upload->data;
				$data['file_name'] = $image_data['file_name'];
				//print_r ($image_data);
			}
			else {
				$data["error_messenger"] = $this->lib_upload->display_errors;
			}
			
    	}
    	else $data["error_messenger"] = "No file upload";
		$this->load->view("doing_form", $data );
	}
	public function del($media_folder, $image){
		$this->lib_media->del_media($media_folder, $image);
		$this->load->view("doing_form", array("del" => $image) );
	}
}
 
