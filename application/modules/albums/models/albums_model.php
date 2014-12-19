<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Albums_model extends CI_Model{
	
	var $db_table = "mod_albums";
	var $upload_folder = "images/albums";
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
    public function show_item(){
    	
    	$select_a = "ID,date_upd,active,user_id,viewed_times,images";
    	$select_b = "tieu_de,description";
    	
    	//$this->lib_db->get_find_in_set($catid);
    	/*$this->lib_db->create_query_search();*/
    	    	
    	//$this->lib_db->order_by();
    	//$this->lib_pagination->db_limit();
    	$r['items'] = $this->lib_db->get_join_lang($this->db_table, $id = "" ,$lang = "" , $select_a , $select_b)
    	->result_array();
    	
    	/*echo $this->db->last_query();*/
    	
    	//$this->lib_db->get_find_in_set($catid);
		/*$this->lib_db->create_query_search();*/
    	
    	//$r['nRow'] = $conf['nRow'] = $this->lib_db->get_join_lang($this->db_table, $id = "" ,$lang = "" , $select_a , $select_b)
    	//->num_rows();
    	
    //	$r['split_page'] = $this->lib_pagination->split_page($conf);
    
    	return $r;
    }

    public function view_item($id){
    	
    	$data = array();
    	$select_a = "ID,body_layout,user_id,date_upd,active,user_id,viewed_times,catid,images";
        $select_b = "tieu_de,description";
        
    	return $data += $this->lib_db->get_join_lang($this->db_table, array($this->db_table.".ID" => $id) ,
    	$lang = $this->session->userdata('lang') , $select_a , $select_b)
        ->row_array();
    }
	
	public function block_newest_albums(){
    	
    	$select_a = "ID,date_upd,images";
        $select_b = "tieu_de";
        $this->db->limit(6);
     	$this->db->order_by($this->db_table.".ID", "DESC");
        return $this->lib_db->get_join_lang($this->db_table, $id = "" ,$lang = "" , $select_a , $select_b)
        ->result_array();
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