<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Slide_image extends MX_Controller {
	var $img_folder = "";
	public function __construct(){
       	parent::__construct();
       	$this->load->Model('Slide_image_model');
       
        $this->lib_media->media_folder = base_url("images/ad_images");
        $this->load->helper('myform');
        $this->load->library('lib_form');
       
        
	}
	public function index($viewid = "")
	{ 
		echo "index_order";
	}
	
    function block_nivo_slide_image()
    {
        $data = array();
        $data['items'] = $this->Slide_image_model->block_nivo_slide_image();
        $this->load->view("block_nivo_slide_image", $data);
    }
    function block_slide_jcycle_images()
    {
        $data = array();
        $data['items'] = $this->Slide_image_model->block_nivo_slide_image();
        $this->load->view("block_slide_jcycle_images", $data);
    }
	
}
 
