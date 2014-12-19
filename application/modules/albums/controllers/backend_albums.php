<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backend_albums extends MX_Controller {
	
	var $_GET_id;
	public $title = "Quản lý bài viết";
	public function __construct(){
       	parent::__construct();
      	$this->load->Model('Backend_albums_model');
      	$this->load->library('lib_pagination');
      	$this->lang->load('static');
      	
      	$this->module = $this->router->fetch_module();
      	
       	//$this->lib_media->media_folder = base_url().'images/'.$this->router->fetch_module();
       	
       	$this->_GET_id = $this->lib_url->_GET('id');
	}
	public function index()
	{
		$this->show_item();
	}
	public function show_item(){
		
		$data = array();
		
		$this->template->write('title',$this->title, true);
		$data = $this->Backend_albums_model->show_item();
		
		$this->load->view("backend_show_item",$data);
	}
	public function del(){
		
		$this->Backend_albums_model -> del($this->_GET_id);
		$this->lib_url->redirect_to_back();
	}
	public function edit(){
		$this->template->write('title',$this->title, true);
		$this->load->library('form_validation');
		
		$data = array();
		
		$data += ($this->_GET_id != "") ? $this->Backend_albums_model->data_edit($this->_GET_id) : array() ;
		$data['list_catagory'] = $this->Backend_albums_model->list_catagory();
		
		$submit = $this->input->post('submit');
		if($submit)
		{
			$this->form_validation->set_rules('tieu_de', 'Tiêu đề', 'trim|required');

			if($this->form_validation->run())
			{
				$this->Backend_albums_model->do_edit($data, $this->_GET_id);
			}
			$data['images'] = $this->input->post('images');		
		}
		
		$this->load->view("backend_form_edit",$data);
		
	}
	
	public function system_clean()
	{
		echo modules::run('ext_system_clean','albums');
	}
	
    public function templates()
    {
        echo modules::run('ext_templates', $this->module);
    }
	public function blocks()
    {
        echo modules::run('com_blocks/backend_com_blocks/blocks_each_module', "albums");

    }
}
 
