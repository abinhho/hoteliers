<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Backend_stat_model extends CI_Model{
	
	var $db_table = "mod_stat";
	/*var $upload_folder = "images/user";*/
	public function __construct(){
        parent::__construct();
        
        /*$this->load->library("lib_upload");*/

        /*$this->lib_upload->config_upload['upload_path'] = $this->upload_folder;*/
                       
    }
    public function home(&$data){
    	
    	$this->db->select_sum("total");
    	$data['total'] = $this->db->get($this->db_table)->row()->total;
    	
    	$month = $this->lib_date->get("m");
    	$this->db->select_sum("total_month");
    	$data['total_month'] = $this->db->where("MONTH(date_upd)", $month)->get($this->db_table)->row() -> total_month;
    	
    	$time =  $this->lib_date->sub("-600 second");
    	$this->db->select("ID");
    	$this->db->where("date_upd >", $time);
    	
    	$data['online'] = $this->db->get($this->db_table)->num_rows() ;
    }
    public function show_item(){
    	
    	$this->db->select("*");
    	    	    	
    	$conf['nRow'] = $this->db->get($this->db_table)->num_rows();
    	$r['split_page'] = $this->lib_pagination->split_page($conf);
    	
    	$this->lib_db->order_by();
		$this->lib_pagination->db_limit();
    	
    	$r['items'] = $this->db->get($this->db_table)->result_array();
    	
    	return $r;
    }
    
    public function del_multi()
    {
    	$list = $this->input->post('multi_select');
    	foreach ($list as $id)
    	{
    		$this->del($id);
    	}
    }
    public function del($id)
    {
    	/*$this->lib_db->del_images($this->db_table, $id);*/
    	
    	$this->db->where("ID",$id);
    	$this->db->delete($this->db_table);
    }
}