<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Backend_locations_model extends CI_Model{
	
	var $db_table = "mod_locations";
	
	public function __construct(){
        parent::__construct();
                             
    }
    public function index(){
    	$this->show_item();
    }
    public function items($parent_id = ""){
        
        $r = array();
        $this->db->select("*");
        return $r + $this->db->where("parent_id", $parent_id)->get($this->db_table)->result_array();
        
    }
    
    public function parent_items($id){
    	
    	$this->db->select("parent_id,ID");
    	$temp = $this->db->where("ID", $id)->get($this->db_table)->row_array();
    	
    	$parent_active = '';
    	if($temp)
    	{
    		$parent_active = ($temp['parent_id'] != "") ? $temp['parent_id'] : $temp['ID'];
    	}
    	
    	$r = array();
    	$this->db->select("*");
    	
    	$abc = $this->db->where("parent_id", "")->get($this->db_table)->result_array();
    	
    	$r['items'] = array_merge(array(0=> array("ID"=> '', "tieu_de" => "Chọn tỉnh thành...") ), $abc );
    	
    	$r['curr_id'] = $parent_active;
    	return $r;
    }
    
    public function child_items($id){
        
        $this->db->select("parent_id,ID");
        $temp = $this->db->where("ID", $id)->get($this->db_table)->row_array();
        
        $parent_active = '';
        if($temp)
        {
            $parent_active = ($temp['parent_id'] != "") ? $temp['parent_id'] : $temp['ID'];
        }
        $r = array();
        $this->db->select("*");
        
        $abc = $this->db->where(array("parent_id" => $parent_active, "parent_id !=" => "") )->get($this->db_table)->result_array();
        $r['items'] = array_merge(array(0=> array("ID"=> '', "tieu_de" => "Chọn quận huyện...") ), $abc);
        
        
        $r['curr_id'] = $id;
        return $r;
    }
    
    
    public function data_edit($id){
    	$this->db->where(array("ID" =>$id ));
    	return $this->db->get($this->db_table)->row_array();
    }
    public function do_edit($id){
    	
    	$db_data = array
    	(
	    	"tieu_de" => $this->input->post('tieu_de')
	    	,"alias" => $this->lib_alias->convert2Alias( $this->input->post('tieu_de') )
	    	,"parent_id" => $this->input->post('parent_id')
	    	
    	);
    	
    	
    	if($id)
    	{
    		/*$db_data["date_add"] = $this->lib_date->get();*/
    		$this->db->where("ID",$id);	
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