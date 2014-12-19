<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rss extends MX_Controller {
	
	var $layout_right;
	public function __construct(){
       	parent::__construct();
      	$this->load->Model('Rss_model');
      	
      	$this->lang->load('static');
	}
	public function index($m = 'products')
	{ 
		$data = array();
		$data['config'] = $this->Rss_model->load_conf();
        $data += $this->Rss_model->show_item();
		$this->load->view("show_item",$data);		
	}	
}
 
