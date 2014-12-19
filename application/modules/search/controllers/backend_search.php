<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backend_search extends MX_Controller {
	
	public $title = "Cấu hình search";
	
	public function __construct(){
       	parent::__construct();
      	$this->load->Model('Backend_search_model');
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
			$this->Backend_search_model->save($data);
		}
		$data += $this->Backend_search_model->data_edit() ;
		
		$this->load->view("general_form",$data);
	}
	
    public function templates()
    {
        echo modules::run('ext_templates', $this->module);
    }
}
 
