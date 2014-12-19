<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Backend_support_model extends CI_Model{
	
	var $db_table = "mod_support";
	/*var $upload_folder = "images/slide_image";*/
	public function __construct(){
        parent::__construct();
               
        /*$this->load->library("lib_upload");
        $this->lib_upload->config_image['upload_path'] = $this->upload_folder;
        */               
    }
    public function index(){
    	$this->show_item();
    }
    public function show_item(){
    	
    	$this->lib_db->order_by();
    	$r['items'] = $this->db->get($this->db_table)->result_array();
    	return $r;
    }
    public function data_edit_promt($id){
    	
    	$data = array();
    	
    	$this->db->where(array("ID" =>$id ));
    	$data = $this->db->get($this->db_table)->row_array();
    	return $data;
    	/*$this->db->where(array("FID" =>$id ));
    	return $data + $this->lib_db->get_all_backend_table_lang($this->db_table, $data);*/
    }
	public function list_phong_ban(){
    	
    	$this->db->distinct();
    	$this->db->select('phong_ban');
    	$temps = $this->db->get($this->db_table)->result_array();
    	
    	$temp = array();
    	foreach ($temps as $r)
    	{
    		$temp[$r['phong_ban']] = $r['phong_ban'];
    	}
    	
    	return $temp;
    	
    }
    public function do_edit_promt(&$data , $id){
    	
    	$db_data = array
    	(
	    	"name" => $this->input->post('name')
    		,"yahoo" => $this->input->post('yahoo')
    		,"skyper" => $this->input->post('skyper')
    		,"email" => $this->input->post('email')
    		,"phone" => $this->input->post('phone')
    	);
    	
    	$db_data['phong_ban'] = ($this->input->post('new_phong_ban') != "") ? 
    	$this->input->post('new_phong_ban') : $this->input->post('phong_ban');
    	
    	if($id)
    	{
    		$this->db->where("ID",$id);	
    		$this->db->update($this->db_table , $db_data);
    		
       	}
    	else {
    		$this->db->insert($this->db_table , $db_data);
    		/*$id = $this->db->insert_id();*/	
    	}
    	
    	/*$this->lib_db->update_or_insert_lang($this->db_table
    		, $id = $id 
    		, "tieu_de,noi_dung");*/
    	
    	/*$this->lib_url->reload("Cập nhật thành công...");*/
    	
    }
    public function del($id)
    {
    	/*$this->lib_db->del_images($this->db_table, $id);*/
    	
    	/*$this->lib_db->del_data_lang($this->db_table, $id);*/
    	
    	$this->db->where("ID",$id);
    	$this->db->delete($this->db_table);
    }
}