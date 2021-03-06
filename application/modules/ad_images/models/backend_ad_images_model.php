<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Backend_ad_images_model extends CI_Model{
	
	var $db_table = "mod_ad_images";
	var $upload_folder = "images/ad_images";
	public function __construct(){
        parent::__construct();
               
        $this->load->library("lib_upload");
        $this->lib_upload->config_upload['upload_path'] = $this->upload_folder;
                       
    }
    public function index(){
    	
    }
    public function show_item(){
    	$this->lib_db->order_by();
    	$r['items'] = $this->db->get($this->db_table)->result_array();
    	return $r;
    }
    public function data_edit($id){
    	
    	$data = array();
    	
    	$this->db->where(array("ID" =>$id ));
    	return $this->db->get($this->db_table)->row_array();
    }
    public function do_edit(&$data , $id){
    	
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
    	
    	
    	$db_data = array
    	(
    		"tieu_de" => $this->input->post('tieu_de')
	    	,"hyperlink" => $this->input->post('hyperlink')
    		,"position" => $this->input->post('position')
    		,"width" => $this->input->post('width')
    		,"height" => $this->input->post('height')
    	);
    	
    	if(isset($image_data['file_name']))
    	$db_data['images'] = $image_data['file_name'];
    	elseif($this->input->post('old_images') == "") {
    		$data["error_messenger"] = "No file upload.";
			return false;
    	}
    	
    	if($id)
    	{
    		$this->db->where("ID",$id);	
    		$this->db->update($this->db_table , $db_data);
    		
       	}
    	else {
    		$this->db->insert($this->db_table , $db_data);
    		$id = $this->db->insert_id();	
    	}
    	
    	/*$this->lib_db->update_or_insert_lang($this->db_table
    		, $id = $id 
    		, "tieu_de,noi_dung");
    	*/
    	$this->lib_url->reload("Cập nhật thành công...");
    	
    }
    public function del($id)
    {
    	$this->lib_db->del_images($this->db_table, $id);
    	//$this->lib_db->del_data_lang($this->db_table, $id);
    	
    	$this->db->where("ID",$id);
    	$this->db->delete($this->db_table);
    }
}