<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Customer_ideals_model extends CI_Model{
	
	var $db_table = "mod_customer_ideals";
	
	public function __construct(){
        parent::__construct();
               
                       
    }
    public function index(){
    	
    }
    
    public function block_customer_ideals(){
        
	    $data = array();
    	$this->db->order_by("trong_luong", "ASC");
        $this->db->limit(5);
    	$data['items'] = $this->db->get($this->db_table)->result_array();
        return $data;
    }
}