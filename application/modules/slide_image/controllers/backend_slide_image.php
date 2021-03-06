<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backend_slide_image extends MX_Controller {
	
	var $_GET_id;
	public $title = "Quản lý slide ảnh";
	public function __construct(){
       	parent::__construct();
      	$this->load->Model('Backend_slide_image_model');
      	$this->load->library('lib_pagination');
      	$this->lang->load('static');
      	
      	$this->module = $this->router->fetch_module();
      	
       	$this->lib_media->media_folder = base_url().'images/'.$this->router->fetch_module();
       	
       	$this->_GET_id = $this->lib_url->_GET('id');
	}
	public function index()
	{
		$this->show_item();
	}
	public function show_item(){
		
		$data = array();
		
		$this->template->write('title',$this->title, true);
		$data = $this->Backend_slide_image_model->show_item();
		
		$this->load->view("backend_show_item",$data);
	}
	public function del(){
		
		$this->Backend_slide_image_model -> del($this->_GET_id);
		$this->lib_url->redirect_to_back();
	}
	public function edit(){
		$this->template->write('title',$this->title, true);
		$this->load->library('form_validation');
		
		$data = array();
		$submit = $this->input->post('submit');
		if($submit)
		{
			$this->Backend_slide_image_model->do_edit($data, $this->_GET_id);			
		}

		
		$data += ($this->_GET_id != "") ? $this->Backend_slide_image_model->data_edit($this->_GET_id) : array() ;
		
		$this->load->view("backend_form_edit",$data);
		
	}
	
    public function blocks()
    {
        echo modules::run('com_blocks/backend_com_blocks/blocks_each_module', "slide_image");

    }
    
    public function system_clean()
    {
        echo modules::run('ext_system_clean','slide_image');
    }
    
    public function templates()
    {
        echo modules::run('ext_templates', $this->module);
    }
}
 
