<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Vote_ideals_model extends CI_Model{
	
	private $db_table = "mod_vote_ideals";
	public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->mod_name = $this->router->fetch_module(); 
    }
    public function index(){
    	
    }
  
    public function block_vote_ideals(){
        
    	$data = array();
    	$this->db->order_by("trong_luong", "ASC");
    	$data['items'] = $this->db->get($this->db_table)->result_array();
        return $data;
    }
    
    public function do_vote(){
        
        $data = array();
        
        $has = $this->session->userdata('vote_ideals');
        if($has == "")
        {
            $id = $this->input->post('ideal');
            $this->lib_db->increment_row($this->db_table, "vote_times", array("ID" => $id));
            $data['ok'] = true;
            $data['messenger'] = "Cám ơn đóng góp của bạn...";
            $this->session->set_userdata("vote_ideals", 1);	
        }
        else 
        {
            $data['ok'] = true;
        	$data['messenger'] = "Bạn đã bình chọn rồi...";
        }
        
        return $data;
    }
    
    
    
    
}