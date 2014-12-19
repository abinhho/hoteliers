<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backend_footer extends MX_Controller {
	
	public $title = "Quản lý footer";

	public function __construct(){
       	parent::__construct();
      	$this->load->Model('Backend_footer_model');
       
      	$this->module = $this->router->fetch_module();
      	
       	$this->lib_media->media_folder = base_url().'images/'.$this->router->fetch_module();
	}
	public function index()
	{
		$this->footer();
	}
	public function footer(){
		
		$data = array();
				
		$this->template->write('title',$this->title, true);
		$submit = $this->input->post('submit');
		if($submit)
		{
			$this->Backend_footer_model->do_footer($data);
		}
		$data += $this->Backend_footer_model->get_data() ;
		
		$this->load->view("backend_footer_form",$data);
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
 
