<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ext_csv_model extends CI_Model{
	
	public function __construct(){
        parent::__construct();
        
        /*$this->load->library("lib_upload");*/

        /*$this->lib_upload->config_upload['upload_path'] = $this->upload_folder;*/
                       
    }
    public function index(){
    	
    }
    
 	public function get_data($db_table, $select){
    	
    	$this->db->select($select);
    	return $this->db->get($db_table);
    	//return $r;
    }
    public function data_lang($db_table, $select_a, $select_b = "tieu_de", $lang = "")
    {
    	return $this->lib_db->get_join_lang($db_table, $id = "" ,$lang , $select_a , $select_b);
    }
}