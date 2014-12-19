<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer_ideals extends MX_Controller {
    
    
    public function __construct(){
        parent::__construct();
        $this->load->Model('Customer_ideals_model');
        $this->load->helper('myform');
        //$this->config->set_item("body_layout", "body_right"); 
    }
    public function index()
    {
       echo "index feedback";
    }
    
       
    function block_customer_ideals()
    {
        $data = array();
        $data += $this->Customer_ideals_model->block_customer_ideals();
        $this->load->view("block_customer_ideals", $data);
        
    }
    
}
 
