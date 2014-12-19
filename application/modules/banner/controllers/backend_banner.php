<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backend_banner extends MX_Controller {
	
	public $title = "Quản lý module banner, background";
	var $module;
	public function __construct(){
       	parent::__construct();
      	$this->load->Model('Backend_banner_model');
       	$this->module = $this->router->fetch_module();
       	$this->lib_media->media_folder = base_url().'images/'.$this->router->fetch_module();
	}
	public function index()
	{
		$this->banner();
	}
	public function banner(){
		
		$data = array();
				
		$this->template->write('title',$this->title, true);
		$submit = $this->input->post('submit');
		if($submit)
		{
			$this->Backend_banner_model->do_banner($data);
		}
		$data += $this->Backend_banner_model->get_data() ;
		$this->load->view("backend_banner_form",$data);
	}
	public function background(){
		
		$data = array();
		
		$this->template->write('title',$this->title, true);
		$submit = $this->input->post('submit');
		if($submit)
		{
			$this->Backend_banner_model->do_background($data);
		}
		$data += $this->Backend_banner_model->get_data() ;
		$this->load->view("backend_background_form",$data);
	}
	
	public function blocks()
	{
		echo modules::run('com_blocks/backend_com_blocks/blocks_each_module', "banner");
	}
    public function templates()
    {
        echo modules::run('ext_templates', $this->module);
    }
}
 
