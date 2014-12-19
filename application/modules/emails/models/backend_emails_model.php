<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Backend_emails_model extends CI_Model{
	
	var $db_table = "mod_emails";
	var $upload_folder = "images/user";
	public function __construct(){
        parent::__construct();
        
        /*$this->load->library("lib_upload");*/

        /*$this->lib_upload->config_upload['upload_path'] = $this->upload_folder;*/
                       
    }
    public function index(){
    	
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
    
    public function data_edit_promt($id){
    	$this->db->where(array("ID" =>$id ));
    	return $this->db->get($this->db_table)->row_array();
    }
    public function do_edit_promt($id){
    	
    	
    	if(!$this->lib_db->check_unique($this->db_table, array("email" => $this->input->post("email") ) , $this->input->post('old_email')  ))
    	{
    		$data_feed['ok'] = "error";
    		$data_feed['messenger_promt'] = "Email đã tồn tại";
			return $data_feed ;
    	}
    	
    	$db_data = array
    	(
	    	"email" => $this->input->post('email')
	    	,"full_name" => $this->input->post('full_name')
    	);
    	
    	if($id)
    	{
    		$this->db->where("ID" , $id);	
    		$this->db->update($this->db_table , $db_data);
       	}
    	else $this->db->insert($this->db_table , $db_data);
    	
    }
    public function del($id)
    {
    	/*$this->lib_db->del_images($this->db_table, $id);*/
    	
    	$this->db->where("ID",$id);
    	$this->db->delete($this->db_table);
    }
}