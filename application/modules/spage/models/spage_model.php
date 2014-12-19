<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Spage_model extends CI_Model{
	
	var $db_table = "mod_spage";
	var $upload_folder = "images/spage";
	public function __construct(){
        parent::__construct();
               
                       
    }
    public function index(){
    	
    }
   
    public function same_topic($catid){
        
        $select_a = "ID,date_upd";
        $select_b = "tieu_de";
        
     
        return $this->lib_db->get_join_lang($this->db_table, $id = "" ,$lang = "" , $select_a , $select_b)
        ->result_array();
       
    }
    
    function get_by_catagories($cata)
    {
        $data = array();
    	$select_a = "ID,images,link";
        $select_b = "tieu_de,description,noi_dung";
        $this->db->order_by($this->db_table.'.ID', 'ASC');
    	return $data += $this->lib_db->get_join_lang($this->db_table, array($this->db_table.".catagory" => $cata) ,
    	$lang = $this->session->userdata('lang') , $select_a , $select_b)
        ->result_array();
    }
    
    
    public function view_item($id){
    	
    	$data = array();
    	$select_a = "ID,body_layout";
        $select_b = "tieu_de,description,noi_dung";
        
    	return $data += $this->lib_db->get_join_lang($this->db_table, array($this->db_table.".ID" => $id) ,
    	$lang = $this->session->userdata('lang') , $select_a , $select_b)
        ->row_array();
    }
	
	public function get_block($catagory){
    	
    	$data = array();
    	$select_a = "ID";
        $select_b = "noi_dung";
        
    	return $data += $this->lib_db->get_join_lang($this->db_table, array($this->db_table.".catagory" => $catagory) ,
    	$lang = $this->session->userdata('lang') , $select_a , $select_b)
        ->row_array();
    }
    
	public function in_home(){
        
        $select_a = "ID,date_upd,images";
        $select_b = "tieu_de,description";
        $this->db->limit(4);
		$this->db->order_by("ID", "ASC");
        return $this->lib_db->get_join_lang($this->db_table, $id = "" ,$lang = "" , $select_a , $select_b)
        ->result_array();
       
    }
    
}