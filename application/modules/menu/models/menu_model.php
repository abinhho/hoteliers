<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Menu_model extends CI_Model{
		
	var $db_table = "mod_menu";
	
	public function __construct(){
        parent::__construct();
 
    }
    public function index(){
    	
    }
    function get_items($block)
    {
    	$data = array();
    	$this->db->where("block" , $block);
    	$this->db->order_by('trong_luong', 'ASC');
    	return $this->lib_db->get_join_lang($this->db_table, "", "", "ID,FID,block,parent_id,href,target", "tieu_de")->result_array();
    }
	
 	
}
?>