<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ad_images extends MX_Controller {
	var $img_folder = "";
	public function __construct(){
       	parent::__construct();
       	$this->load->Model('Ad_images_model');
       
        $this->lib_media->media_folder = base_url("images/ad_images");
        $this->load->helper('myform');
        $this->load->library('lib_form');
       
        
	}
	public function index($viewid = "")
	{ 
		echo "index_order";
	}
	function ad_images_body($pos)
    {
       $data['items'] = $this->Ad_images_model->get_data($pos, 1);
       $this->load->view("ad_images_body", $data);
    }
	
    function block_ad_images_left_page()
    {
       $data['items'] = $this->Ad_images_model->get_data('left_page', 1);
       $this->load->view("block_ad_images_left_page", $data);
    }
    
   function block_ad_images_right_page()
    {
       $data['items'] = $this->Ad_images_model->get_data('right_page', 1);
       $this->load->view("block_ad_images_right_page", $data);
    }
    
	function block_ad_images_left_col()
	{
	   $data['items'] = $this->Ad_images_model->get_data('left_col', 10);
	   $this->load->view("block_ad_images_left_col", $data);
	}
	
    function block_ad_images_right_col()
    {
       $data['items'] = $this->Ad_images_model->get_data('right_col', 10);
       $this->load->view("block_ad_images_right_col", $data);
    }
    function block_scroll_image()
    {
       $data['items'] = $this->Ad_images_model->get_data('scroll_image', 10);
       $this->load->view("block_scroll_image", $data);
    }
	function block_ad_images_header()
    {
       $data['items'] = $this->Ad_images_model->get_data('header', 10);
       $this->load->view("block_ad_images_header", $data);
    }
	function block_ad_images_footer()
    {
       $data['items'] = $this->Ad_images_model->get_data('footer', 10);
       $this->load->view("block_ad_images_footer", $data);
    }
	
}
 
