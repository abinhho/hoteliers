<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Backend_cards_model extends CI_Model{
	
	var $db_table = "mod_cards";
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
	
    public function data_edit($id){
        $this->db->where(array("ID" =>$id ));
        return $this->db->get($this->db_table)->row_array();
    }
    public function do_edit(&$data , $id){
       
        if(!$this->lib_db->check_unique($this->db_table, array("the_code" => $this->input->post("the_code") ) , $this->input->post('old_the_code')  ))
        {
            $data["error_messenger"] = "Mã số thẻ đã tồn tại";
            return false;
        }
        
        $db_data = array
        (
            "the_code" => $this->input->post('the_code')
            ,"status" => $this->input->post('status')
            ,"email" => $this->input->post('email')
            ,"full_name" => $this->input->post('full_name')
            ,"address" => $this->input->post('address')
            ,"phone" => $this->input->post('phone')
            ,"cmnd" => $this->input->post('cmnd')
            
            
        );
        $db_data['expiry_date'] = $this->lib_input->post_date_picker('expiry_date');
        if(isset($image_data['file_name']))
        $db_data['images'] = $image_data['file_name'];
        
        if($id)
        {
            $this->db->where("ID",$id); 
            $this->db->update($this->db_table , $db_data);
        }
        else $this->db->insert($this->db_table , $db_data);
        
        $this->lib_url->reload("Cập nhật thành công...");
        
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
    	
    	$this->db->where("ID",$id);
    	$this->db->delete($this->db_table);
    }
}