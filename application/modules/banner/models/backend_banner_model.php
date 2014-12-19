<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Backend_banner_model extends CI_Model{
	var $upload_folder = "images/banner";
	var $db_table = "mod_banner";
	public function __construct(){
        parent::__construct();
        
        $this->load->library('lib_upload');
    	$this->lib_upload->config_upload['upload_path'] = $this->upload_folder;
    }
    public function index(){
    	
    }
    function get_data()
    {
    	return $this->db->get($this->db_table)->row_array();
    }
 	function do_banner(&$data)
    {
    	if(!empty($_FILES['userfile']['tmp_name'])){
    		
    		if($this->lib_upload->upload_media($_FILES['userfile']['name'])){
				
				$image_data = $this->lib_upload->data;
				@unlink($this->upload_folder .'/'. $this->input->post('old_images'));	
			}
			else {
				$data["error_messenger"] = $this->lib_upload->display_errors;
				return false;
			}	
    	}
    	$db_data = array(
    	"width" => $this->input->post('width')
    	,"height" => $this->input->post('height')
    	);
    	
    	if(isset($image_data['file_name']))
    	$db_data['images'] = $image_data['file_name'];
    	$this->db->update($this->db_table , $db_data);
    	$this->lib_url->reload("Cập nhật thành công...");
    }
	function do_background(&$data)
    {
    	if(!empty($_FILES['userfile']['tmp_name'])){
    		
    		if($this->lib_upload->upload_media($_FILES['userfile']['name'])){
				
				$image_data = $this->lib_upload->data;
				@unlink($this->upload_folder .'/'. $this->input->post('old_images'));	
			}
			else {
				$data["error_messenger"] = $this->lib_upload->display_errors;
				return false;
			}	
    	}
    	$db_data = array(
    	"background_css" => $this->input->post('background_css')
    	);
    	
    	if(isset($image_data['file_name']))
    	$db_data['background'] = $image_data['file_name'];
    	$this->db->update($this->db_table , $db_data);
    	$this->lib_url->reload("Cập nhật thành công...");
    }
}