<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Backend_spage_model extends CI_Model{
	
	var $db_table = "mod_spage";
	var $upload_folder = "images/spage";
	public function __construct(){
        parent::__construct();
               
        $this->load->library("lib_upload");
        $this->lib_upload->config_image['upload_path'] = $this->upload_folder;
                       
    }
    public function index(){
    	
    }
    public function show_item(){
    	
    	$select_a = "ID,catagory,date_upd";
    	$select_b = "tieu_de";
    	
    	$this->lib_db->order_by();
    	$this->lib_pagination->db_limit();
    	$r['items'] = $this->lib_db->get_join_lang($this->db_table, $id = "" ,$lang = "" , $select_a , $select_b)
    	->result_array();
    	
    	$conf['nRow'] = $this->lib_db->get_join_lang($this->db_table, $id = "" ,$lang = "" , $select_a , $select_b)
    	->num_rows();
    	$r['split_page'] = $this->lib_pagination->split_page($conf);
    	
    	return $r;
    }
    public function data_edit($id){
    	
    	$data = array();
    	
    	$this->db->where(array("ID" =>$id ));
    	$data = $this->db->get($this->db_table)->row_array();
    	
    	$this->db->where(array("FID" =>$id ));
    	return $data + $this->lib_db->get_all_backend_table_lang($this->db_table);
    }
    public function list_catagory(){
    	
    	$this->db->distinct();
    	$this->db->select('catagory');
    	$temps = $this->db->get($this->db_table)->result_array();
    	
    	$temp = array();
    	foreach ($temps as $r)
    	{
    		$temp[$r['catagory']] = $r['catagory'];
    	}
    	
    	return $temp;
    	
    }
    public function do_edit(&$data , $id){
    	
    	$db_data = array
    	(
	    	"body_layout" => $this->input->post('body_layout')
    	);
    	
    	$db_data['catagory'] = ($this->input->post('new_catagory') != "") ? 
    	$this->input->post('new_catagory') : $this->input->post('catagory');
    	
    	$images  = $this->input->post('images');
    	$db_data['images'] =  $this->lib_media->remove_file_not_exist_in_list($this->db_table,$images);
    	
    	if($id)
    	{
    		$this->db->where("ID",$id);	
    		$this->db->update($this->db_table , $db_data);
    		
       	}
    	else {
    		$this->db->insert($this->db_table , $db_data);
    		$id = $this->db->insert_id();	
    	}
    	
    	$this->lib_db->update_or_insert_lang($this->db_table
    		, $id = $id 
    		, "tieu_de,noi_dung,keywords,description");
    	
    	$this->lib_url->reload("Cập nhật thành công...");
    	
    }
    public function del($id)
    {
    	$this->lib_db->del_images($this->db_table, $id);
    	$this->lib_db->del_data_lang($this->db_table, $id);
    	
    	$this->db->where("ID",$id);
    	$this->db->delete($this->db_table);
    }
}