<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Backend_breadcrumb_model extends CI_Model{
	var  $banner_data = array();
	
	var $db_table = "mod_breadcrumb";
	
	public function __construct(){
       parent::__construct();
       
    }
    public function index(){
    	
    }
    function data_edit()
    {
    	$data = array();
    	return  $this->db->get($this->db_table)->row_array();
    	
    }
 	function save(&$data)
    {
    	$db_data = array(
    		"home_text" => $this->input->post('home_text')
    	);
    	$this->db->update($this->db_table , $db_data);
    		
    	$this->lib_url->reload("Cập nhật thành công...");
    }
}