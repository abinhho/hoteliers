<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Backend_com_modules_model extends CI_Model{
	
	var $db_table = "com_modules";
	
	public function __construct(){
        parent::__construct();
                             
    }
    public function index(){
    	$this->show_item();
    }
    public function show_item(){
    	
    	$this->db->select("*");
    	    	
    	
    	
    	$conf['nRow'] = $this->db->get($this->db_table)->num_rows();
    	$r['split_page'] = $this->lib_pagination->split_page($conf);
    	
    	$this->lib_db->order_by();
		$this->lib_pagination->db_limit();
    	$r['items'] = $this->db->get($this->db_table)->result_array();
    	
    	return $r;
    }
    public function data_edit($id){
    	$this->db->where(array("ID" =>$id ));
    	return $this->db->get($this->db_table)->row_array();
    }
    public function do_edit(&$data , $id){
    	
    	$db_data = array
    	(
	    	"tieu_de" => $this->input->post('tieu_de')
	    	,"alias" => $this->input->post('alias')
	    	,"active" => $this->input->post('active')
	    	,"accept_select_block" => $this->input->post('accept_select_block')
	    	,"trong_luong" => $this->input->post('trong_luong')
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