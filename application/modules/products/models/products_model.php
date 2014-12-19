<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Products_model extends CI_Model{
	
	var $lang;
	var $db_table = "mod_products";
	var $upload_folder = "images/products";
	var $db_select_show_item;
	public function __construct(){
        parent::__construct();
        
        $this->lang = $this->session->userdata('lang');
        
        $this->load->library("lib_upload");
        $this->lib_upload->config_image['upload_path'] = $this->upload_folder;
        $this->db_select_show_item = "ID,alias,active,user_id,viewed_times,catid,images,rate,rate_times,price,old_price,discount,active_comment,bought";         
    }
    public function index(){
    	
    }
    public function show_item($catid, $type = ''){
    	
    	$select_a = $this->db_select_show_item;
    	$select_b = "tieu_de";
    	
    	$this->lib_db->get_find_in_set($catid);
    	/*$this->lib_db->create_query_search();*/
   	    
        if($type == 'promotion') $this->db->where('`discount` !=', 0 );
        elseif($type == 'hot') $this->db->where('`mod_noi_bat` !=', 0 );
        
        
    	$this->lib_db->order_by();
    	$this->lib_pagination->db_limit();
    	$r['items'] = $this->lib_db->get_join_lang($this->db_table, $id = "" ,$this->lang , $select_a , $select_b)
    	->result_array();
    	
    	//echo $this->db->last_query(); exit;
    	
    	$this->lib_db->get_find_in_set($catid);
		/*$this->lib_db->create_query_search();*/
    	if($type == 'promotion') $this->db->where('`discount` >', 0 );
        elseif($type == 'hot') $this->db->where('`mod_noi_bat` !=', 0 );
        
    	$r['nRow'] = $conf['nRow'] = $this->lib_db->get_join_lang($this->db_table, $id = "" ,$lang = $this->lang , $select_a , $select_b)
    	->num_rows();
    	
    	$r['split_page'] = $this->lib_pagination->split_page($conf);
    
    	return $r;
    }
    
    public function show_item_noi_bat($catid){
        
        $select_a = $this->db_select_show_item;
        $select_b = "tieu_de";
        
        $this->lib_db->get_find_in_set($catid);
        
        $this->db->where('mod_noi_bat', 1);
        $this->db->limit(12,0);
        $this->db->order_by("rand()");
        
        $r['items'] = $this->lib_db->get_join_lang($this->db_table, $id = "" ,$this->lang , $select_a , $select_b)
        ->result_array();
        
        /*echo $this->db->last_query();*/
        
        return $r;
    }
    
    public function noi_bat_in_home($limit = 6){
        
        
        $select_a = $this->db_select_show_item;
        $select_b = "tieu_de";
        
        $this->db->where('mod_noi_bat', 1);
        $this->db->limit($limit,0);
        $this->db->order_by("rand()");
        
        $r['items'] = $this->lib_db->get_join_lang($this->db_table, $id = "" ,$this->lang , $select_a , $select_b)
        ->result_array();
        return $r;
    }
    
    public function newest_in_home(){
        
        
        $select_a = $this->db_select_show_item;
        $select_b = "tieu_de";
        
        $this->db->where('mod_noi_bat', 0);
        $this->db->limit(16,0);
        $this->db->order_by("ID", "DESC");
        
        $r['items'] = $this->lib_db->get_join_lang($this->db_table, $id = "" ,$this->lang , $select_a , $select_b)
        ->result_array();
        return $r;
    }
    
    public function in_home($catid){
        
    	$tt = $this->lib_menu->meta_by_catid($catid);
    	
        $select_a = $this->db_select_show_item;
        $select_b = "tieu_de";
        
        $this->lib_db->get_find_in_set($catid);
        /*$this->db->where("( FIND_IN_SET({$catid},catid) )");*/
        $this->db->limit(9,0);
        $this->db->order_by("ID","DESC");
        $r['title'] = $tt['title'];
        $temp = $this->lib_db->get_join_lang($this->db_table, $id = "" ,$this->lang , $select_a , $select_b);
        
        $r['items'] = $temp->result_array();
        
        $r['link_more'] = $this->lib_menu->make_link(array($catid => $tt['title'] ));
        
        /*echo $this->db->last_query();*/
        return $r;
    }
    
    public function lien_quan_1_column($catid){
        
        $select_a = "ID,catid,images";
        $select_b = "tieu_de";
        
        $this->db->limit(16,0);
		$this->db->order_by("rand()");
        $r['items'] = $this->lib_db->get_join_lang($this->db_table, $id = "" ,$this->lang , $select_a , $select_b)
        ->result_array();
       
        return $r;
    }
    
    public function block_products_noi_bat_1_column(){
        
        $select_a = "ID,catid,images";
        $select_b = "tieu_de";
        
        $this->db->where('mod_noi_bat', 1);
        $this->db->limit(5,0);
        $this->db->order_by("ID","DESC");
        
        $r['items'] = $this->lib_db->get_join_lang($this->db_table, $id = "" ,$this->lang , $select_a , $select_b)
        ->result_array();
       
        return $r;
    }
    
   
    function search()
    {
    	$select_a = $this->db_select_show_item;
        $select_b = "tieu_de";
        
        
        //$this->lib_db->get_find_in_set($this->lib_url->_GET('catid') );
        
        $this->lib_db->create_query_search('tieu_de');
                
        $this->lib_db->order_by();
        $this->lib_pagination->db_limit();
        $r['items'] = $this->lib_db->get_join_lang($this->db_table, $id = "" ,$this->lang , $select_a , $select_b)
        ->result_array();
        
        /*echo $this->db->last_query();*/
        
        
        //$this->lib_db->get_find_in_set($this->lib_url->_GET('catid'));
        /*$this->lib_db->create_query_search();*/
         $this->lib_db->create_query_search('tieu_de');
        
        $r['nRow'] = $conf['nRow'] = $this->lib_db->get_join_lang($this->db_table, $id = "" ,$this->lang , $select_a , $select_b)
        ->num_rows();
        
        $r['split_page'] = $this->lib_pagination->split_page($conf);
       
        return $r;
    }
    
   
    
    public function same_topic($catid){
        
        $select_a = $this->db_select_show_item;
        $select_b = "tieu_de";
        
        $this->db->limit(4,0);
        return $this->lib_db->get_join_lang($this->db_table, $id = "" ,$this->lang , $select_a , $select_b)
        ->result_array();
       
    }
    
    public function view_item($id){
    	
    	$data = array();
    	$select_a = $this->db_select_show_item;
        $select_b = "tieu_de,description,noi_dung,features,condition_use,keywords";
        
    	return $data += $this->lib_db->get_join_lang($this->db_table, array($this->db_table.".ID" => $id) ,
    	$this->lang , $select_a , $select_b)
        ->row_array();
    }
}