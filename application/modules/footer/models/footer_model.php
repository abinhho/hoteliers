<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Footer_model extends CI_Model{

	public function __construct(){
        parent::__construct();
                
    }
    public function block_footer(){
    	$data = $this->db->get('mod_footer')->row_array();
    	return $data + $this->lib_db->get_join_lang("mod_footer", $id = "" ,$lang = $this->session->userdata('lang') , $select_a = "*" , $select_b = "")
    	->row_array();
    }
}