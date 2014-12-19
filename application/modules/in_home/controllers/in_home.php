<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class In_home extends MX_Controller {
	public function __construct(){
       	parent::__construct();
      	
	}
	public function index()
	{
		
		/* $data = array(
            'slide_image' => $this->load->module('slide_image')
            ,'menu' => $this->load->module('menu')
			,"spage" => $this->load->module('spage')
			,"news" => $this->load->module('news')
			,"albums" => $this->load->module('albums')
            ,"social_plugins" => $this->load->module('social_plugins')
            ,"ad_images" => $this->load->module('ad_images')
		); */
		
		$this->load->view("in_home");
	}
}
 
