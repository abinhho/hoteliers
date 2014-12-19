<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Cards_model extends CI_Model{
	var $mod_name =''; 
	private $db_table = "mod_cards";
	public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->mod_name = $this->router->fetch_module();
        $this->load->library('lib_input'); 
    }
    public function index(){
    	
    }
  
    public function do_check(&$data){
        
        $the_code = $this->input->post('the_code');
        
     
        $this->db->select('*');
        $this->db->limit(1,0);
        $query = $this->db->where('the_code', $the_code)->get($this->db_table);
        if($query->num_rows() == 0){
        	$data["error_messenger"] = "<div class='error_messenger'>- Lỗi. Mã số thẻ không tồn tại</div>";
        }
        else 
        {
        	$data += $query->row_array();
        }
        
    }
    
    public function do_active(&$data){
        
    	$db_data = $this->input->post('card');
    	
        $the_code = $db_data['the_code'];
        
        $this->db->select('*');
        $this->db->limit(1,0);
        $query = $this->db->where('the_code', $the_code)->get($this->db_table);
        if($query->num_rows() == 0){
        	
        	$db_data['expiry_date'] = $this->lib_input->post_date_picker('expiry_date');
        	$this->db->insert($this->db_table , $db_data);
        }
        else 
        {
            $data += $query->row_array();
        }
        redirect('cards/check?the_code='.$the_code);
        
    }
    
    
}