<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Backend_comments_model extends CI_Model{
	
	var $db_table = "mod_comments";
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
    	    	    	
    	$conf['nRow'] = $this->db->get($this->db_table)->num_rows();
    	$r['split_page'] = $this->lib_pagination->split_page($conf);
    	
    	$this->lib_db->order_by();
		$this->lib_pagination->db_limit();
    	
    	$r['items'] = $this->db->get($this->db_table)->result_array();
    	
    	return $r;
    }
	public function view_item($id){
    	
    	$this->db->select("*");
    	$data_view  = array();
    	$data_view = $this->db->where("ID", $id)->get($this->db_table)->row_array();
    	
    	return $data_view;
    }
   public function do_active($id){
   	
    	$db_data = array
    	(
	    	"active" => $this->input->post('active')
	   	);
    	
    
    	$this->db->where("ID",$id);	
    	$this->db->update($this->db_table , $db_data);
    	
    	$this->lib_url->redirect_to_back("module", $msg = "Thành công...");
    	
    }
    public function del_multi()
    {
    	$list = $this->input->post('multi_select');
    	foreach ($list as $id)
    	{
    		$this->del($id);
    	}
    }
    public function del($id)
    {
    	/*$this->lib_db->del_images($this->db_table, $id);*/
    	
    	$this->db->where("ID",$id);
    	$this->db->delete($this->db_table);
    }
}