<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vote_ideals extends MX_Controller {
	var $img_folder = "";
	public function __construct(){
       	parent::__construct();
       	$this->load->Model('Vote_ideals_model');
       
        $this->lib_media->media_folder = base_url("images/ad_images");
        $this->load->helper('myform');
        $this->load->library('lib_form');
       
        
	}
	public function index($viewid = "")
	{ 
		
	}
    
    function view_result()
    {
        $data = array();
        $data += $this->Vote_ideals_model->block_vote_ideals();
        $this->load->view("view_result", $data);
        
    }
    
    function do_vote()
    {
    	$data = array();
    	$submit = $this->input->post('submit');
    	if($submit)
    	{
    		$data += $this->Vote_ideals_model->do_vote();
    		$this->load->view('iframe/promt_feed', $data);
    	}
        
        
    }
    
    
    function block_vote_ideals()
    {
        $data = array();
        $data += $this->Vote_ideals_model->block_vote_ideals();
        $this->load->view("block_vote_ideals", $data);
        
    }
   
	
}
 
