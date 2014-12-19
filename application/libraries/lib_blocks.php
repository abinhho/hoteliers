<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Lib_blocks{
	
    var $CI;
    public function __construct(){
        $this->CI = &get_instance();
    }
	
	public function info_block($block)
	{
		$this->CI->db->select("tieu_de,description");
		$temp = $this->CI->db->where('block_name', $block)->get("com_blocks")->row_array();
		$tieu_de = ($temp['tieu_de'] != "") ? "<h6>".__($temp['tieu_de'])."</h6>" : '';
		$description = ($temp['description'] != "") ? "<p class='description'>".__($temp['description'])."</p>" : '';
		return "<div class ='info_block'>".$tieu_de.$description."</div>";
	}
}