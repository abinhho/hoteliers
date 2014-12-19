<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Comments_model extends CI_Model{
	
	private $db_table = "mod_comments";
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
    
    function get_rate($mod, $id){
    	$this->db->select('rate,rate_times');
        return $this->db->get_where("mod_".$mod , array("ID" => $id) )->row_array();
    }
    public function do_rate(&$data){
        
        $currs  = $this->get_rate($data['module'], $data['ID']);
        echo $data['module'];
	    $this->lib_db->increment_row("mod_".$data['module'] ,"rate_times" , array("ID"=> $data['ID']) );
	    
	    $this->db->where("ID", $data['ID']);
	    $this->db->update("mod_".$data['module'], array("rate"=>$currs['rate'] + $data['rate']) );
	    
	    $this->lib_comments->add2rate($data['module'],$data['ID']);
	    
	    $currs  = $this->get_rate($data['module'], $data['ID']);
	    $data['rate'] = $currs['rate'];
	    $data['rate_times'] = $currs['rate_times'];
    }
}