<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Orders extends MX_Controller {
	var $img_folder = "";
	public function __construct(){
       	parent::__construct();
       	$this->load->Model('Orders_model');
       	$this->img_folder = base_url().'media/'.$this->router->fetch_module();
        $this->config->set_item("body_layout" , "body");
        $this->load->helper('myform');
        $this->load->library('lib_form');
        
	}
	public function index($viewid = "")
	{ 
		echo "index_order";
	}
	
	public function order(){
	   
	   $data = array();
	   $submit = $this->input->post('submit');
        if($submit)
        {
            $this->load->library('form_validation');
        
	        $data = array();
	        $this->form_validation->set_rules('order[full_name]', 'Họ tên', 'trim|required');
	        $this->form_validation->set_rules('order[email]', 'Email', 'trim|required|valid_email');
	        $this->form_validation->set_rules('order[phone]', 'Điện thoại', 'trim|required');
	        $this->form_validation->set_rules('order[address]', 'Địa chỉ', 'trim');
	        $this->form_validation->set_rules('order[bank]', 'Ngân hàng', 'trim');
	        
	        if($this->form_validation->run())
	        {
	            $this->Orders_model->do_order($data);
	        }
        }
	   
		$this->load->view("user_form", $data);
	}
   
}
 
