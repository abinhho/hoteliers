<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stat extends MX_Controller {
	var $img_folder = "";
	public function __construct(){
       	parent::__construct();
       	$this->load->Model('Stat_model');
       
        $this->lib_media->media_folder = base_url("images/ad_images");
        $this->load->helper('myform');
        $this->load->library('lib_form');
       
        
	}
	public function index($viewid = "")
	{ 
		echo "index_order";
	}
    function create_stat()
    {
        $this->Stat_model->create_stat();
    }
   
	
    function block_stat()
    {
        $data = array();
        $data += $this->Stat_model->block_stat();
        $this->load->view("block_stat", $data);
        
    }
   
	
}
 
