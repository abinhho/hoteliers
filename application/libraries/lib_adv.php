<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Lib_adv {
	var $CI;
	
	function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->database();
	}
	
	public function show_adv($postion, $index, $ext = "" , $rand = false){
		
        $this->CI->lib_media->media_folder = base_url("images/ad_images");
        
		$this->CI->db->where(array("position"=>$postion));
        
        if($rand) $this->CI->db->order_by("rand()");
        
        $this->CI->db->limit($index+1,$index);
		$row = $this->CI->db->get("mod_ad_images")->row_array();
        if(!count($row)) return '';
        $html = '<div '.$ext.'>';
        $html .= "<a href = '".$row['hyperlink']."' title = '".$row['tieu_de']."'>";
    	$html .= $this->CI->lib_media->show($row['images'], $row['width'], $row['height'] , "alt='".$row['tieu_de']."'");
    	$html .= "</a></div>";
        return $html;
	}
	
} 