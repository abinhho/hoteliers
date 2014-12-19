<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Slide_image_model extends CI_Model{
	
	private $db_table = "mod_slide_image";
	public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->mod_name = $this->router->fetch_module(); 
    }
    public function index(){
    	
    }
  
    public function block_nivo_slide_image(){
        
    	$data = array();
        $data += $this->lib_db->get_join_lang($this->db_table, $id = "" ,$lang = $this->session->userdata('lang')
        ,$select_a = "*" , $select_b = "")->result_array();
        return $data;
        
        
    }
    
}