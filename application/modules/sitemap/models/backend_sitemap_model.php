<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Backend_sitemap_model extends CI_Model{

	
	var $db_table = "mod_sitemap";
	public function __construct(){
        parent::__construct();
        
        $this->load->library('lib_upload');
        $this->load->library('lib_input');
        $this->load->library('lib_convert');
    }
    public function index(){
    	
    }
    function show_catagory()
    {
    	$data = array();
    	return $this->db->get($this->db_table)->result_array();
    }
	
 	public function data_edit($id){
    	$this->db->where(array("ID" =>$id ));
    	return $this->db->get($this->db_table)->row_array();
    }
    
    public function do_edit($type , $id){
    	
    	$db_data = array
    	(
	    	"tieu_de" => $this->input->post('tieu_de')
            ,"images" => $this->input->post('images')
            ,"images1" => $this->input->post('images1')
            ,"home_display" => $this->input->post('home_display')
	    	,"active" => $this->input->post('active')
	    	,"trong_luong" => $this->input->post('trong_luong')
    	);
    	
    	/*$db_data['alias'] = ($this->input->post('alias')) ? $this->input->post('alias') : 	$this->lib_alias->convert2Alias($this->input->post('tieu_de'));*/
    	
    	$module_alias = $this->input->post('module_alias'); 
    	
    	$db_data['module_alias'] = ($module_alias) ? $module_alias : '';
    	
    	if($type == "edit")
    	{
    		$this->db->where("ID",$id);	
	    	$this->db->update($this->db_table , $db_data);
	   	}
    	elseif ($type == "add")
    	{
    		$db_data['parent_id'] = $id ;
    		$this->db->insert($this->db_table , $db_data);
    	}
    
    	
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
    	return true;
    }
}