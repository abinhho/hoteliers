<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Support extends MX_Controller {
	var $img_folder = "";
	public function __construct(){
       	parent::__construct();
       	$this->load->Model('Support_model');
       
        $this->lib_media->media_folder = base_url("images/ad_images");
        $this->load->helper('myform');
        $this->load->library('lib_form');
       
        
	}
	public function index($viewid = "")
	{ 
		echo "index_order";
	}
    
	
    function block_support()
    {
        $data = array();
        $data['items'] = $this->Support_model->block_support();
        $this->load->view("block_support", $data);
        
    }
   
	
}
 
