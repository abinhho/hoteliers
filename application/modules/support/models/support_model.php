<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Support_model extends CI_Model{
	
	private $db_table = "mod_support";
	public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->mod_name = $this->router->fetch_module(); 
    }
    public function index(){
    	
    }
  
    
    public function block_support(){
        
    	$data = array();
    	$this->db->select("*");
    	$data += $this->db->get($this->db_table)->result_array();
    	
        return $data;
    }
    
}