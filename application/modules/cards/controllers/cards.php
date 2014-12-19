<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cards extends MX_Controller {
	var $img_folder = "";
	var $layout_right = array();
	public function __construct(){
       	parent::__construct();
       	$this->load->Model('Cards_model');
       	$this->img_folder = base_url().'media/'.$this->router->fetch_module();
        $this->config->set_item("body_layout" , "body");
        $this->load->helper('myform');
        $this->load->library('lib_form');
        $this->config->set_item('body_layout', 'body_right');
        
	}
	public function index($viewid = "")
	{ 
		echo "index_order";
	}
	
	public function check(){
	   
		$data = array();
		$the_code = $this->lib_url->_GET('the_code');
		if($the_code != "")
		$this->Cards_model->do_check($data);
		
	  
	   $submit = $this->input->post('submit_check_card');
        if($submit)
        {
            $this->load->library('form_validation');
        
	        $data = array();
	        $this->form_validation->set_rules('the_code', 'Mã số thẻ', 'trim|required');
	        
	        
	        if($this->form_validation->run())
	        {
	            $this->Cards_model->do_check($data);
	        }
        }
	   
        $this->layout_right = array('emails/block_email_promote','ad_images/block_ad_images_right_col' ); 
       
        
		$this->load->view("user_form", $data);
	}
   
    public function active(){
       
       $data = array();
       $submit = $this->input->post('submit_active_card');
        if($submit)
        {
            $this->load->library('form_validation');
        
            $data = array();
            
            $this->form_validation->set_rules('card[the_code]', 'Mã số thẻ', 'trim|required');
            $this->form_validation->set_rules('card[full_name]', 'Họ tên', 'trim|required');
            $this->form_validation->set_rules('card[email]', 'Email', 'trim|required');
            
            
            if($this->form_validation->run())
            {
                $this->Cards_model->do_active($data);
            }
        }
       
        $this->load->view("user_form_active", $data);
    }
	
	
    function layout_right()
    {
        return $this->layout_right;
        
    }
}
 
