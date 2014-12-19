<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Backend_vote_ideals_model extends CI_Model{
	
	var $db_table = "mod_vote_ideals";
	/*var $upload_folder = "images/user";*/
	public function __construct(){
        parent::__construct();
        
        /*$this->load->library("lib_upload");*/

        /*$this->lib_upload->config_upload['upload_path'] = $this->upload_folder;*/
                       
    }
    public function index(){
    	
    }
    public function show_item(){
    	
    	$this->db->select("*");
    	
    	$this->lib_db->order_by();
    	
    	$r['items'] = $this->db->get($this->db_table)->result_array();
    	
    	return $r;
    }
    public function data_edit_promt($id){
    	$this->db->where(array("ID" =>$id ));
    	return $this->db->get($this->db_table)->row_array();
    }
    public function do_edit_promt($id){
    	    	
    	$db_data = array
    	(
	    	"tieu_de" => $this->input->post('tieu_de')
	    	,"vote_times" => $this->input->post('vote_times')
	    	,"trong_luong" => $this->input->post('trong_luong')
    	);
    	
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