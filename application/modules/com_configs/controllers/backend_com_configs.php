<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backend_com_configs extends MX_Controller {
	
	public $title = "Cấu hình site";
	
	public function __construct(){
       	parent::__construct();
      	$this->load->Model('Backend_com_configs_model');
       	$this->lib_media->media_folder = base_url().'images/'.$this->router->fetch_module(); 
	}
	public function index()
	{
		$this->general();
	}
	public function general(){
		
		$data = array();
				
		$this->template->write('title',$this->title, true);
		$submit = $this->input->post('submit');
		if($submit)
		{
			$this->Backend_com_configs_model->do_general($data);
		}
		$data += $this->Backend_com_configs_model->get_data_general() ;
		
		$this->load->view("general_form",$data);
	}
	public function email(){
		
		$data = array();
		
		$this->template->write('title',$this->title, true);
		$submit = $this->input->post('submit');
		if($submit)
		{
			$this->Backend_com_configs_model->do_email($data);
		}
		$data += $this->Backend_com_configs_model->get_data_email() ;
		$this->load->view("email_form",$data);
	}
}
 
