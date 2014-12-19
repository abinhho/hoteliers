<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ext_system_clean_model extends CI_Model{

	
	/*var $db_table = "mod_sitemap";*/
	public function __construct(){
        parent::__construct();
        
        $this->load->library('lib_upload');
        $this->load->library('lib_input');
    }
    public function get_data($module){
    	$this->db->select('images');
    	$rows = $this->db->where('images !=', '')->get("mod_".$module)->result_array();
        
    	$lists = array();
    	
	    foreach($rows as $row)
	    {
	        $temp = $row['images'];
	        $temps = preg_split("/,/",$temp);
	        foreach ($temps as $img)
	        $lists[] = $img;
	    }
	    return $lists;
    }
}