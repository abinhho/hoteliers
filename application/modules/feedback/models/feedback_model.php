<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Feedback_model extends CI_Model{
	
	var $db_table = "mod_feedback";
	
	public function __construct(){
        parent::__construct();
               
                       
    }
    public function index(){
    	
    }
    
    public function send_feedback(){
    	
    	 $db_data = array
        (
            "email" => $this->input->post('email')
            ,"full_name" => $this->input->post('full_name')
            ,"website" => $this->input->post('website')
            ,"address" => $this->input->post('address')
            ,"phone" => $this->input->post('phone')
            ,"tieu_de" => $this->input->post('tieu_de')
            ,"noi_dung" => $this->input->post('noi_dung')
            
        );
        
        $this->db->insert($this->db_table , $db_data);
        $this->lib_url->reload("Chân thành cảm ơn. Ý kiến của bạn đã được gửi thành công.");
    }
}