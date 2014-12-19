<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Lib_db{
	var $CI;
	public function __construct(){
		$this->CI = &get_instance();
	}
	
	public function order_by()
	{
		$sort = $this->CI->lib_url->_GET('sort');
		$order=$this->CI->lib_url->_GET('order');
		
		if($sort == "rand")
		$this->CI->db->order_by("rand()");
		elseif($sort != "" && $order != "")
			$this->CI->db->order_by($sort,$order);
		else
			$this->CI->db->order_by("ID","DESC");
	}
	
	public function filter_col()
	{
		$val = $this->CI->lib_url->_GET('filter_col');
		$val = preg_split('/\./', $val);
		if(count($val) > 1)
		$this->CI->db->where($val['0'], $val[1]);
	} 
	
	function increment_row($db_table, $field, $cond)
	{
		$this->CI->db->where($cond);
        $this->CI->db->set($field, $field.'+1', FALSE);
        $this->CI->db->update($db_table);
        
	}
	public function check_unique($db_table, $cond, $old)
	{
		foreach($cond as $colz => $valuez)
		{
			$value = $valuez; $col = $colz;
		}
		
		if($old == "" | $old == "0")
		{
			return ($this->CI->db->where($col, $value)->get($db_table)->num_rows()) ? false : true;
		}
		elseif ($old != $value)
		{
			return ($this->CI->db->where($col, $value)->get($db_table)->num_rows()) ? false : true;
		}
		return true;
	}
	public function exist($db_table, $cond)
	{
		$this->CI->db->limit(1,0);
		return ($this->CI->db->where($cond)->get($db_table)->num_rows()) ? true : false;
	}
	public function del_images($db_table , $id)
	{
		$this->CI->db->select("images"); 
		$images = $this->CI->db->get_where($db_table, array("ID"=> $id ))-> row_array();
		if(!isset($images['images'])) return;
		$list = preg_split('/,/',$images['images']);
		foreach($list as $value)
		{
			@unlink("images/" . str_replace("mod_", "", $db_table) .'/'. $value );	
			@unlink("images/" . str_replace("mod_", "", $db_table) .'/thumbs/'. $value );
		}
	}
	public function del_data_lang($db_table , $id)
	{
		$this->CI->db->where("FID" , $id);
		$this->CI->db->delete($db_table."_lang");
	}
	public function get_all_backend_table_lang($db_table)
	{
		$data = array();
		$temps = $this->CI->db->get($db_table."_lang")->result_array();
		//print_r ($temps);
    	foreach ($temps as $temp)
    	{
    		foreach ($temp as $col => $value)
    		{
    			$pre_lang = ($temp['lang'] != "") ? $temp['lang']."_" : "";
    			$data[$pre_lang.$col] = $value;
    			
    		}
    		
    	}
    	
    	return $data;
	}
	public function add_table_to_select($db_table, $selects)
	{
			if($selects == "") return "";
			
			$select = "";
			$list = preg_split('/,/', $selects);
			$i = 0;
			foreach ($list as $col)
			{
				$coma = ($i != 0) ? ",": '';
				$select .= $coma.$db_table.".".$col;
				$i++;
			}
			return $select;
	}
	public function get_join_lang($db_table, $id = array(), $lang , $select_a, $select_b){
		
		
		if(empty($lang)) $lang = $this->CI->session->userdata('lang');
		
		$select = "";
		if($select_a == "*")
		$select = "*";
		else{
			
			$select_a = $this->add_table_to_select($db_table , $select_a);
			$select_b = $this->add_table_to_select($db_table."_lang" , $select_b);
			$select = ($select_b == "") ? $select_a : $select_a .",". $select_b;
		}
		
		$this->CI->db->select($select);
		$this->CI->db->join($db_table."_lang", "{$db_table}.ID = {$db_table}_lang.FID", 'left outer');
		
		if(is_array($id))
		{
			$this->CI->db->where($id);
		}
		elseif(!empty($id))
			$this->CI->db->where('ID', $id);
			
		$this->CI->db->where('lang', $lang);
	    
		return $this->CI->db->get($db_table);
	}
	public function update_or_insert_lang($db_table, $id, $names)
	{
		foreach($this->CI->config->item("site_lang") as $lang => $text)
    	{
    		$db_data_lang = $this->CI->lib_input->post_all_lang($lang, $names);
    		
    		$this->CI->lib_db->update_or_insert($db_table."_lang"
    			, array("FID"=> $id , "lang" => $lang ) 
    			, $db_data_lang);
    	}
	}
	
	public function get_find_in_set($id = "")
	{
		/*$id = ($id == "") ? $this->CI->lib_url->_GET('catid') : $id;*/
		
		if($id == "")
		{
			$catid = $this->CI->lib_url->_GET('catid');
			if($catid != "")
			$id = $catid;
			else return "";
			//$id = $this->CI->lib_menu->module_id($this->CI->lib_url->_GET('module') ) ;
		}
		
		$temps = $this->CI->lib_menu->list_catid_children($id);
		$i = 0;
		$where = "";
        
		foreach($temps as $catid)
		{
			$s = ($i != 0) ? "OR" : "";
			$where .= $s. " " . "FIND_IN_SET($catid,catid) ";
			$i++;
		}
		
		$this->CI->db->where("($where)");
	}
	
	public function create_query_search($col = "", $q = "")
	{
		$col = ($col == "") ? $this->CI->lib_url->_GET('db_col_search') : $col;
		$q = ($q == "") ? $this->CI->lib_url->_GET('q') : $q;
		
		/*$qs = preg_split('/\+/', $q);*/
		if($q == "") return '';
		$q = str_replace("+"," ",$q);
		$where = $col." LIKE '%$q%' ";
		
		/*$i = 0;
		foreach($qs as $q)
		{
			if($q == "" || $col == "") return; 
			
			$s = ($i != 0) ? "OR" : "";
			if($col == "-" && $col == "")
			$col = "tieu_de";
			
			$where .= $s." ".$col." LIKE '%$q%' ";
		
			$i++;
		}*/
		$this->CI->db->where("($where)");
		
	}
	
	function update_or_insert($db_table, $cond, $data)
	{
		$this->CI->db->where($cond);
		$this->CI->db->limit(1,0);
		if($this->CI->db->get($db_table)->num_rows())
		{
			$this->CI->db->where($cond);
			$this->CI->db->update($db_table, $data + $cond);
			return;
		}
		else
		{
			$this->CI->db->insert($db_table, $data + $cond);
		}
	}
	
	public function dup ($db_table, $id) {
				
		$this->CI->db->select("*");
		$this->CI->db->where("ID", $id);
		
		$original_record = $this->CI->db->get($db_table)->row_array();
		
		$this->CI->db->insert($db_table, array("ID" => "NULL" ) );
		
		$newid = $this->CI->db->insert_id();
		
		$db_data = array();
		foreach ($original_record as $key => $value)
		{
			if ($key != "ID")
			$db_data[$key] = $value;
		}
		
		$this->CI->db->where("ID" , $newid);
		$this->CI->db->update($db_table, $db_data);
		
		return $newid;
	}
	
	public function dup_lang($db_table, $id, $new_fid)
	{
		$this->CI->db->select("ID");
		$rs = $this->CI->db->where('FID', $id)->get($db_table."_lang")->result_array();
		foreach ($rs as $r)
		{
			$newid = $this->dup($db_table."_lang", $r['ID']);
			$this->CI->db->where("ID" , $newid);
            $this->CI->db->update($db_table."_lang", array("FID" => $new_fid));
		}
	}
	
}