<?php
class Frontend_model extends CI_Model{
	var  $all_blocks = array();
	public function __construct(){
        parent::__construct();
        $this->load->database();
        
        //$this->db->where(array('home_display'=>'1'));
        //$this->db->or_where("FIND_IN_SET('30',item_display) IS NOT NULL");
        $this->db->order_by("trong_luong", "ASC");       
        $this->all_blocks = $this->db->get('com_blocks')->result_array();
        
        
    }
    /* load_conf: Load conf from table com_configs*/
    public function load_conf(){
    	$data = $this->db->get('com_configs')->row_array();
    	return $data + $this->lib_db->get_join_lang("com_configs", $id = "" ,$lang = "" , $select_a = "*" , $select_b = "")
    	->row_array();
    	 
    }
    /* active_mods: Load active module*/
	public function active_mods(){
		$this->db->where(array('active'=>'1'));
		return $this->db->get('com_modules')->result_array();
    	 
    }
    /* get_blocks: get all block with position in sql*/
	public function get_blocks($curr_module, $pos)
	{
		$r = array();
		foreach ($this->all_blocks as $block)
		{
			if($pos == $block['position'])
			{
				if($block['any_display'] == 0)
				{ 
					if($curr_module == "")
					{
					    if($block['home_display'] == 1)
	                    $r[] = $block;	
					}
					else 
					{ /*echo "-".$curr_module.$block['block_name']."+<br>";*/
						$temp = preg_split('/,/', $block['item_display']);
						if(in_array($curr_module, $temp))
						$r[] = $block;
					}
				}
				else {
					$r[] = $block;
				}
			    
			    
			    
			}
		}
		return $r;
	}
	
}