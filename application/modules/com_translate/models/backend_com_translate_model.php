<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Backend_com_translate_model extends CI_Model{
	
	var $db_table = "com_translate";
	
	var $langs = array();
	var $db_select;
	
	public function __construct(){
        parent::__construct();
     
    }
    public function index(){
    	
    }
    public function show_item(){
    	
    	$this->db->select(implode(",", $this->langs));
    	
    	$conf['nRow'] = $this->db->get($this->db_table)->num_rows();
    	$r['split_page'] = $this->lib_pagination->split_page($conf);
    	
    	$this->lib_db->order_by();
		$this->lib_pagination->db_limit();
    	$r['items'] = $this->db->get($this->db_table)->result_array();
    	
    	return $r;
    }
    
    public function data_edit_promt($id){
    	$this->db->select(implode(",", $this->langs));
    	$this->db->where(array("ID" =>$id ));
    	return $this->db->get($this->db_table)->row_array();
    }
    public function do_edit_promt($id){
 
    	$db_data = array();
    	foreach ($this->langs as $lang)
    	{
    		$db_data[$lang] = $this->input->post($lang);
    	}
      	
    	if($id)
    	{
    		$this->db->where("ID" , $id);	
    		$this->db->update($this->db_table , $db_data);
       	}
    	else $this->db->insert($this->db_table , $db_data);
    	
    }
    public function del($id)
    {
    	/*$this->lib_db->del_images($this->db_table, $id);*/
    	
    	$this->db->where("ID",$id);
    	$this->db->delete($this->db_table);
    }
}