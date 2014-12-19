<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Backend_user_model extends CI_Model{
	
	var $db_table = "mod_user";
	var $upload_folder = "images/user";
	public function __construct(){
        parent::__construct();
        
        $this->load->library("lib_upload");

        $this->lib_upload->config_upload['upload_path'] = $this->upload_folder;
                       
    }
    public function index(){
    	
    }
    public function get_all_module(){
    	return $this->db->where(array("active" => 1))->get("com_modules")->result_array();
    }
    
    public function show_item(){
    	
    	$this->db->select("*");
    	    	
    	
    	
    	$conf['nRow'] = $this->db->get($this->db_table)->num_rows();
    	$r['split_page'] = $this->lib_pagination->split_page($conf);
    	
    	$this->lib_db->order_by();
		$this->lib_pagination->db_limit();
    	$r['items'] = $this->db->get($this->db_table)->result_array();
    	
    	return $r;
    }
    public function data_edit($id){
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
    	
    	if(!$this->lib_db->check_unique($this->db_table, array("email" => $this->input->post("email") ) , $this->input->post('old_email')  ))
    	{
    		$data["error_messenger"] = "Email đã tồn tại";
			return false;
    	}
    	
        $old_password = $this->input->post('old_password');
        $password = $this->input->post('password');
                
        
    	$db_data = array
    	(
	    	"email" => $this->input->post('email')
	    	,"full_name" => $this->input->post('full_name')
	    	,"password" => md5($password)
	    	,"website" => $this->input->post('website')
	    	,"address" => $this->input->post('address')
	    	,"phone" => $this->input->post('phone')
	    	,"level" => $this->input->post('level')
	    	,"birthday" => $this->input->post('year')."-".$this->input->post('month')."-".$this->input->post('date')
            ,"permission" => implode(",",$this->input->post('module'))
    	);
        
        if($old_password == $password && $id)
        unset($db_data['password']);
    	
    	if(isset($image_data['file_name']))
    	$db_data['images'] = $image_data['file_name'];
    	
    	if($id)
    	{
    		$db_data["date_add"] = $this->lib_date->get();
    		$this->db->where("ID",$id);	
    		$this->db->update($this->db_table , $db_data);
       	}
    	else $this->db->insert($this->db_table , $db_data);
    	
    	$this->lib_url->reload("Cập nhật thành công...");
    	
    }
    public function del_user($id)
    {
    	$this->lib_db->del_images($this->db_table, $id);
    	
    	$this->db->where("ID",$id);
    	$this->db->delete($this->db_table);
    }
}