<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Backend_menu_model extends CI_Model{
	var  $banner_data = array();
	
	var $db_table = "mod_menu";
	var $db_table_sitemap = "mod_sitemap";
	
	public function __construct(){
        parent::__construct();
        
        $this->load->library('lib_upload');
        $this->load->library('lib_input');
    }
    public function index(){
    	
    }
    function get_items($block)
    {
    	$data = array();
    	$this->db->where("block" , $block);
    	$this->db->order_by('trong_luong', 'ASC');
    	return $this->lib_db->get_join_lang($this->db_table, "", "", "ID,block,parent_id,href", "tieu_de")->result_array();
    }
	
 	public function data_edit($id){
 		
 		$data = array();
 		
    	$this->db->where(array("ID" =>$id ));
    	
    	$data = $this->db->get($this->db_table)->row_array();
    	$this->db->where(array("FID" =>$id ));
    	return $data + $this->lib_db->get_all_backend_table_lang($this->db_table);
    }
    
    public function do_edit($block, $type , $id){
    	
    	$db_data = array
    	(
    		"href" => $this->input->post('href')
    		,"target" => $this->input->post('target')
    		,"FID" => $this->input->post('FID')
    		,"trong_luong" => $this->input->post('trong_luong')
    	);
    	
    	/*$module_alias = $this->input->post('module_alias'); 
    	
    	$db_data['module_alias'] = ($module_alias) ? $module_alias : '';*/
    	
    	if($type == "edit")
    	{
    		$this->db->where("ID",$id);
	    	$this->db->update($this->db_table , $db_data);
	    	$insert_lang_id = $id;
	   	}
    	elseif ($type == "add")
    	{
    		$db_data['parent_id'] = $id ;
    		$db_data['block'] = $block ;
    		$this->db->insert($this->db_table , $db_data);
    		
    		$insert_lang_id = $this->db->insert_id();    		
    	}
    	
    	if(isset($insert_lang_id))
    	$this->lib_db->update_or_insert_lang($this->db_table
	    	,$id = $insert_lang_id
	    	 ,"tieu_de,description");
    
    	
    }
    
    public function radio_select_menu($block)
    {
    	$rows = $this->db->where('active', 1)->get($this->db_table_sitemap)->result_array();
    	
    	$exist = array();
    	$this->db->select("FID");
		$temp = $this->db->where( array('block' => $block, 'FID >' => '' ) )->get($this->db_table)->result_array();
		foreach ($temp as $row)
		{
			$exist[] = $row['FID'];
		}
		
		return $this->lib_menu->radio_select_menu($rows, $exist);
    }
    
    public function do_radio_select_menu($block, $id)
    {
    	$db_data = array
    	(
    		"FID" => $this->input->post('menu')
    		,"parent_id" => $id
    		,"block" => $block
    	);
    	
    	$this->db->insert($this->db_table , $db_data);
    	
    	$db_data_lang['FID'] = $this->db->insert_id(); 
    	
    	$this->db->select('tieu_de');
    	
    	$temp = $this->db
    	->where('ID', $this->input->post('menu') )
    	->get($this->db_table_sitemap)
    	->row_array();
    	
    	$db_data_lang['tieu_de'] = $temp['tieu_de'];
    	
    	$this->db->insert($this->db_table."_lang" , $db_data_lang);
    	
    }
    
    
	public function del($id)
    {
    	/*$this->lib_db->del_images($this->db_table, $id);*/
    	if($this->lib_db->exist($this->db_table , array("parent_id" => $id) ) )
    	{ 
    		return false;
    	}
    	$this->db->where("ID",$id);
    	$this->db->delete($this->db_table);
    	$this->lib_db->del_data_lang($this->db_table, $id);
    	return true;
    }
}