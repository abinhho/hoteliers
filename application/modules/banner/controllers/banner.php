<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Banner extends MX_Controller {
	
	public $img_folder;
	var $menu;
	
	public function __construct(){
       	parent::__construct();
       	$this->load->Model('Banner_Model');
       	$this->lib_media->media_folder = base_url().'images/'.$this->router->fetch_module();
       //	$this->load->library("lib_menu");  	
        $this->menu = $this->load->module('menu');
	}
	public function index()
	{
		//echo "Index baner";
	}
	public function block_banner(){
		$data = $this->Banner_Model->index();
		
		$data['menu'] = $this->menu;
		define("BODY_STYLE", "style = \"background:url('".base_url()."images/banner/".$data['background']."')". $data['background_css'] . " \"") ;
	
		$this->load->view('block_banner',$data);
		
	}
}
 
