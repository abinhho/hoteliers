<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Lib_locations{
	
	var $CI;
	var $db_table = "mod_locations";
	public function __construct(){
		$this->CI = &get_instance();
		
    }
    public function index(){
    	//echo "Index TB_media";
    }
    function single_info($id_locaiton)
    { 
    	$this->CI->db->select("tieu_de");
    	$t = $this->CI->db->where('ID', $id_locaiton)->get($this->db_table)->row_array();
    	if($t) return $t['tieu_de'];
    	return "";
    }
    function full_info($id_locaiton)
    { 
        $this->CI->db->select("tieu_de,parent_id");
        $t = $this->CI->db->where('ID', $id_locaiton)->get($this->db_table)->row_array();
        if($t) {
        	
        	$a = $t['tieu_de'];
        	if($t['parent_id'] != "")
        	{
        		$b = $this->single_info($t['parent_id']);
        		return ($b != "") ? $a.", ".$b : $a;
        	}
        	else return $a;
        }
        
        return "";
    }
	
}