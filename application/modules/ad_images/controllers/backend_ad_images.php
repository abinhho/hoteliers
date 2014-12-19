<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backend_ad_images extends MX_Controller {
	
	var $_GET_id;
	var $module;
	public $title = "Quản lý quảng cáo";
	public function __construct(){
       	parent::__construct();
      	$this->load->Model('Backend_ad_images_model');
      	$this->module = $this->router->fetch_module();
       	$this->lib_media->media_folder = base_url().'images/'. $this->module;
       	
       	$this->_GET_id = $this->lib_url->_GET('id');
	}
	public function index()
	{
		$this->show_item();
	}
	public function show_item(){
		
		$data = array();
		
		$this->template->write('title',$this->title, true);
		$data = $this->Backend_ad_images_model->show_item();
		
		$this->load->view("backend_show_item",$data);
	}
	public function del(){
		
		$this->Backend_ad_images_model -> del($this->_GET_id);
		$this->lib_url->redirect_to_back();
	}
	public function edit(){
		$this->template->write('title',$this->title, true);
		$this->load->library('form_validation');
		
		$data = array();
		$submit = $this->input->post('submit');
		if($submit)
		{
			$this->Backend_ad_images_model->do_edit($data, $this->_GET_id);			
		}

		
		$data += ($this->_GET_id != "") ? $this->Backend_ad_images_model->data_edit($this->_GET_id) : array() ;
		
		$this->load->view("backend_form_edit",$data);
		
	}
	
    public function blocks()
    {
        echo modules::run('com_blocks/backend_com_blocks/blocks_each_module', "ad_images");

    }
    
    public function system_clean()
    {
        echo modules::run('ext_system_clean','ad_images');
    }
    
    public function templates()
    {
        echo modules::run('ext_templates', $this->module);
    }
}
 
