<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backend_breadcrumb extends MX_Controller {
	
	public $title = "Cấu hình breadcrumb";
	var $module;
	public function __construct(){
       	parent::__construct();
      	$this->load->Model('Backend_breadcrumb_model');
      	$this->module = $this->router->fetch_module();
       
	}
	public function index()
	{
		$this->edit();
	}
	public function edit(){
		
		$data = array();
				
		$this->template->write('title',$this->title, true);
		$submit = $this->input->post('submit');
		if($submit)
		{
			$this->Backend_breadcrumb_model->save($data);
		}
		$data += $this->Backend_breadcrumb_model->data_edit() ;
		
		$this->load->view("backend_general_form",$data);
	}
    
	public function templates()
    { 
        echo modules::run('ext_templates', $this->module);
    }
    public function blocks()
    {
        echo modules::run('com_blocks/backend_com_blocks/blocks_each_module', $this->module);

    }
}
 
