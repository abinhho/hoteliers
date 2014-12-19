<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comments extends MX_Controller {
	var $img_folder = "";
	public function __construct(){
       	parent::__construct();
       	$this->load->Model('Comments_model');
       
        $this->lib_media->media_folder = base_url("images/ad_images");
        $this->load->helper('myform');
        $this->load->library('lib_form');
        $this->load->library('lib_comments');
       
        
	}
	public function index($viewid = "")
	{ 
		
	}
    
  
    function do_rate()
    {
    	$rate = $this->lib_url->_GET('rate');
    	$module = $this->lib_url->_GET('mod');
    	$ID = $this->lib_url->_GET('id');
    	
    	$data = array(
    	"rate" =>$rate
    	,"module" =>$module
    	,"ID" => $ID
    	);
    	
    	$this->Comments_model->do_rate($data);
    	$this->load->view('rating_topic' ,$data);
        
    }
    
}
 
