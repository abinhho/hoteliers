<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Feedback extends MX_Controller {
    
    
    public function __construct(){
        parent::__construct();
        $this->load->Model('Feedback_model');
        $this->load->helper('myform');
        $this->config->set_item("body_layout", "body"); 
    
    }
    public function index()
    {
       echo "index feedback";
    }
 
       
    function send_feedback($catid)
    {
    	
        $data = array();
        
        $this->template->write("title","Feedback", true);
        
        $data = $this->session->all_userdata();
        
         $this->load->library('form_validation');
        
         $this->form_validation->set_rules('full_name', 'Họ tên', 'trim|required');
         $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
         $this->form_validation->set_rules('tieu_de', 'Tiêu đề', 'trim|required');
         $this->form_validation->set_rules('noi_dung', 'Nội dung', 'trim|required');
            
            if($this->form_validation->run()){
               $this->Feedback_model->send_feedback();
            }   
        
        
        $this->load->view("feedback_form",$data);
    }
    
}
 
