<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Backend_search_model extends CI_Model{
	
	var $db_table = "mod_search";
	
	public function __construct(){
       parent::__construct();
       
    }
    public function index(){
    	
    }
    function data_edit()
    {
    	$data = array();
    	$this->db->select("name,alias");
    	$this->db->where(array("has_search" => 1, "active" => 1));
    	
    	$rs = $this->db->get("com_modules")-> result_array();
    	$temp = array();
    	foreach ($rs as $r){
    		$temp[$r['alias']] = $r['alias']. " - ". $r['name'];
    	}
    	$data['list_modules'] = $temp;
    	
    	$this->db->select("module_alias");
    	$data['module_actived'] = $this->db->get($this->db_table)->row()->module_alias;
    	return $data ; 
    	
    }
 	function save(&$data)
    {
    	$db_data = array(
    		"module_alias" => $this->input->post('module_alias')
    	);
    	$this->db->update($this->db_table , $db_data);
    		
    	$this->lib_url->reload("Cập nhật thành công...");
    }
}