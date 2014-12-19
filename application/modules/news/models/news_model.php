<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class News_model extends CI_Model{
	
	var $db_table = "mod_news";
	var $upload_folder = "images/news";
    var $lang;  
	public function __construct(){
        parent::__construct();
        $this->lang = $this->session->userdata('lang');  
        $this->load->library("lib_upload");
        $this->lib_upload->config_image['upload_path'] = $this->upload_folder;
                       
    }
    public function index(){
    	
    }
    public function show_item($catid){
    	
    	$select_a = "ID,date_upd,active,user_id,viewed_times,catid,images";
    	$select_b = "tieu_de,description";
    	
    	$this->lib_db->get_find_in_set($catid);
    	/*$this->lib_db->create_query_search();*/
    	    	
    	$this->lib_db->order_by();
    	$this->lib_pagination->db_limit();
    	$r['items'] = $this->lib_db->get_join_lang($this->db_table, $id = "" ,$lang = "" , $select_a , $select_b)
    	->result_array();
    	
    	/*echo $this->db->last_query();*/
    	
    	$this->lib_db->get_find_in_set($catid);
		/*$this->lib_db->create_query_search();*/
    	
    	$r['nRow'] = $conf['nRow'] = $this->lib_db->get_join_lang($this->db_table, $id = "" ,$lang = "" , $select_a , $select_b)
    	->num_rows();
    	
    	$r['split_page'] = $this->lib_pagination->split_page($conf);
    	
    	
   		/*echo $this->db->last_query();*/
   		
    	
   		
   		
    	//$this->db->stop_cache();
    	/*$this->lib_db->get_find_in_set();*/
    	
    	
    	return $r;
    }
    
    public function same_topic($catid){
        
        $select_a = "ID,date_upd,active,user_id,viewed_times,catid";
        $select_b = "tieu_de";
        $this->db->limit(8);
     	
        return $this->lib_db->get_join_lang($this->db_table, $id = "" ,$lang = "" , $select_a , $select_b)
        ->result_array();
       
    }
    
    function in_home()
    {
        $catas = $this->lib_menu->cata_show_in_home();
        
        foreach($catas as $i => $cata)
        {
            $select_a = "ID,date_upd,active,user_id,viewed_times,catid,images";
        	$select_b = "tieu_de,description";
        	
        	$this->lib_db->get_find_in_set($cata['ID']);
            $this->db->where('mod_noi_bat', 1);
        	$this->db->order_by('ID', 'DESC');
            $this->db->limit(5);
        	$catas[$i]['items'] = $this->lib_db->get_join_lang($this->db_table, $id = "" ,$lang = "" , $select_a , $select_b) ->result_array();
        }
        //print_r ($catas); exit;
        return $catas; 
    }
    
    public function block_by_catid($catid){
        
        $select_a = "ID,date_upd,active,user_id,viewed_times,catid,images";
        $select_b = "tieu_de";
        $this->lib_db->get_find_in_set($catid);
        $this->db->limit(6);
     	$this->db->order_by($this->db_table.".ID", "DESC");
        return $this->lib_db->get_join_lang($this->db_table, $id = "" ,$lang = "" , $select_a , $select_b)
        ->result_array();
       
    }
    
    public function block_latest_news(){
        
        $select_a = "ID,date_upd,active,user_id,viewed_times,catid,images";
        $select_b = "tieu_de";
        $this->db->limit(5);
     	$this->db->order_by($this->db_table.".ID", "DESC");
        return $this->lib_db->get_join_lang($this->db_table, $id = "" ,$lang = "" , $select_a , $select_b)
        ->result_array();
       
    }
	public function block_most_read_news(){
        
        $select_a = "ID,date_upd,catid,active,user_id,viewed_times,catid,images";
        $select_b = "tieu_de";
        $this->db->limit(4);
     	$this->db->order_by($this->db_table.".viewed_times", "DESC");
        return $this->lib_db->get_join_lang($this->db_table, $id = "" ,$lang = "" , $select_a , $select_b)
        ->result_array();
       
    }
    
    public function view_item($id){
    	
    	$data = array();
    	$select_a = "ID,date_upd,catid,active,user_id,viewed_times,catid,active_comment";
        $select_b = "tieu_de,description,noi_dung";
        
    	return $data += $this->lib_db->get_join_lang($this->db_table, array($this->db_table.".ID" => $id) ,
    	$lang = $this->session->userdata('lang') , $select_a , $select_b)
        ->row_array();
    }
    
    function search()
    {
    	$select_a = "ID,date_upd,catid,active,user_id,viewed_times,catid,active_comment,images";
        $select_b = "tieu_de,description,noi_dung";
        
        
        //$this->lib_db->get_find_in_set($this->lib_url->_GET('catid') );
        
        $this->lib_db->create_query_search('tieu_de');
                
        $this->lib_db->order_by();
        $this->lib_pagination->db_limit();
        $r['items'] = $this->lib_db->get_join_lang($this->db_table, $id = "" ,$this->lang , $select_a , $select_b)
        ->result_array();
        
        /*echo $this->db->last_query(); exit;*/
        
        
        //$this->lib_db->get_find_in_set($this->lib_url->_GET('catid'));
        /*$this->lib_db->create_query_search();*/
         $this->lib_db->create_query_search('tieu_de');
        
        $r['nRow'] = $conf['nRow'] = $this->lib_db->get_join_lang($this->db_table, $id = "" ,$this->lang , $select_a , $select_b)
        ->num_rows();
        
        $r['split_page'] = $this->lib_pagination->split_page($conf);
       
        return $r;
    }
    
}