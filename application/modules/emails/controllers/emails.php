<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Emails extends MX_Controller {
	var $img_folder = "";
	public function __construct(){
       	parent::__construct();
       	$this->load->Model('Emails_model');
       
       
        $this->load->helper('myform');
        $this->load->library('lib_form');
       
        
	}
	public function index($viewid = "")
	{ 
		echo "index_order";
	}
	function do_email()
	{
	   $data = array();
       $submit = $this->input->post('submit_email');
       
        if($submit)
        {
            $this->load->library('form_validation');
            $data['submit_email'] = $submit;
            $data = array();
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            
            if($this->form_validation->run())
            {
                $this->Emails_model->do_email($data);
            }
            $this->load->view("block_email_promote", $data);
        }
       
	}
	
	function send($mess = array('to' => 'vinhphatvnit@gmail.com','subject'=> 'Default subject', 'message'=> 'Default message'))
	{
	   
		$db_config = $this->Emails_model->get_config();
		
		$config = array(
                'protocol' => $db_config['email_type'],
                'smtp_host' => $db_config['email_host'],
                'smtp_port' => $db_config['email_port'],
                'smtp_user' => $db_config['email_username'],
                'smtp_pass' => $db_config['email_password']
                
        );
        /*print_r ($config);*/
        $this->load->library('email',$config);
        $this->email->set_newline("\r\n");
        
        $this->email->from($db_config['email_from'], NAME_PAGE);
        $this->email->to($mess['to']);
        $this->email->subject($mess['subject']);
        $this->email->message($mess['message']);    
        
        if($this->email->send()){
           return true;
        }
        else
        {
        	show_error($this->email->print_debugger());
        	return false;
        }
	}
	
	public function form_email_promote(){
	  
		$this->load->view("form_email_promote");
	}
	
	public function block_email_promote(){
	  
		$this->load->view("block_email_promote");
	}
   
}
 
