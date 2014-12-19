<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Lib_modules{
	
    var $CI;
    var $modules;
    public function __construct(){
        $this->CI = &get_instance();
        
        $this->modules = $this->CI->db->where(array("active" => 1, "accept_select_block" => 1))->get("com_modules")->result_array();
    }
	
	public function form_checkbox_select_modules($curr)
	{
		$modules = $this->CI->input->post('module');
		$curr = (!$modules) ? preg_split('/,/', $curr) : $modules;
		$r = "";
		foreach ($this->modules as $row)
		{ 
			$checked = (@in_array($row['alias'], $curr)) ? true : '';
			$r .=  "<tr>";
			$r .=  "<td>".form_checkbox('module[]', $row['alias'], $checked)." ".$row['tieu_de']."</td>";
			$r .=  "</tr>";
			
		}
		return $r;
	}
}