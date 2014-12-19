<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Footer extends MX_Controller {
	
	public function __construct(){
       	parent::__construct();
       	$this->load->Model('Footer_Model');  	
	}
	public function index()
	{
		
	}
	public function block_footer(){
		
		$data = array();
		$data += $this->Footer_Model->block_footer();
		$data['email'] = $this->load->module('emails'); 
		$this->load->view("block_footer", $data);
	}
}
 