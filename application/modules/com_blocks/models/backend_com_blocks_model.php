<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Backend_com_blocks_model extends CI_Model{
	
	var $db_table = "com_blocks";
		
	public function __construct(){
        parent::__construct();
        
    }
    public function index(){
    	
    }
	function show_item()
    {
    	$data = array();
    	$this->lib_db->order_by();
    	return $data + $this->db->get($this->db_table)->result_array();
    }
    function show_item_each_module($module)
    {
    	$data = array();
    	$this->db->where("module" , $module);
    	return $data + $this->db->get($this->db_table)->result_array();
    }
	
 	public function data_edit_promt($id){
    	
 		$this->db->where(array("ID" =>$id ));
    	return $this->db->get($this->db_table)->row_array();
    }
    
    public function do_edit_promt($id){
 
    	
    	$db_data = array
    	(
	    	//"block_name" => $this->input->post('name')
	    	"tieu_de" => $this->input->post('tieu_de')
	    	,"description" => $this->input->post('description')
	    	,"home_display" => $this->input->post('home_display')
	    	,"any_display" => $this->input->post('any_display')
	    	,"position" => $this->input->post('position')
	    	,"trong_luong" => $this->input->post('trong_luong')
    	);
    	
    	$db_data['item_display'] = implode(",", $this->input->post('module'));
    	
    	
    	if($id)
    	{
    		/*$db_data["date_add"] = $this->lib_date->get();*/
    		$this->db->where("ID",$id);	
    		$this->db->update($this->db_table , $db_data);
       	}
    	else $this->db->insert($this->db_table , $db_data);
    
    	
    }
   
 	public function do_add($module){
 
    	
    	$db_data = array
    	(
	    	"block_name" => $this->input->post('block_name')
	    	,"position" => $this->input->post('position')
	    	,"module" => $module
    	);
    	
    	$this->db->insert($this->db_table , $db_data);
    	
    
    	
    }
 	public function del($id)
    {
    	/*$this->lib_db->del_images($this->db_table, $id);*/
    	
    	$this->db->where("ID",$id);
    	$this->db->delete($this->db_table);
    }
}