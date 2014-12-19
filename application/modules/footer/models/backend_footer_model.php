<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Backend_footer_model extends CI_Model{
	
	var $db_table = "mod_footer";
	public function __construct(){
        parent::__construct();
    }
    public function index(){
    	
    }
    function get_data()
    {
    	$data = array();
    	$data =  $this->db->get($this->db_table)->row_array();
    	return $data + $this->lib_db->get_all_backend_table_lang($this->db_table, $data);
    }
 	function do_footer(&$data)
    {
    	//$db_data = array();
    	//$this->db->update($this->db_table , $db_data);
    	
    	foreach($this->config->item("site_lang") as $lang => $text)
    	{
    		$db_data_lang = $this->lib_input->post_all_lang($lang, "noi_dung");
    		
    		$this->lib_db->update_or_insert($this->db_table."_lang"
    			, array("FID"=> 1, "lang" => $lang ) 
    			, $db_data_lang);
    	}
    	
    	$this->lib_url->reload("Cập nhật thành công...");
    }
}