<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backend_comments extends MX_Controller {
	
	var $_GET_id;
	public $title = "Quản lý các bình luận";
	public function __construct(){
       	parent::__construct();
      	$this->load->Model('Backend_comments_model');
      	$this->load->library('lib_pagination');
      	$this->lang->load('static');
      	$this->load->library('form_validation');
       	
      	$this->module = $this->router->fetch_module();
       	
       	$this->_GET_id = $this->lib_url->_GET('id');
	}
	public function index()
	{
		$this->show_item();
	}
	public function show_item(){
		
		$data = array();
		
		$this->template->write('title',$this->title, true);
		$submit = $this->input->post('submit');
		if($submit)
		{
			$this->form_validation->set_message('required', 'Bạn phải chọn ít nhất một mục');
			$this->form_validation->set_rules('multi_select[]', '', 'required');
			
			if($this->form_validation->run())
			{
				$this->Backend_comments_model->del_multi();
			}		
		}
		$data = $this->Backend_comments_model->show_item();
		$this->load->view("backend_show_item",$data);
	}
	public function edit()
	{
		$this->view_item();
	}
	public function view_item(){
		
		$data = $this->Backend_comments_model->view_item($this->_GET_id);
		$this->template->write('title',$this->title, true);
		
		$submit = $this->input->post('submit');
		if($submit)
		{
			$this->Backend_comments_model->do_active($this->_GET_id);		
		}
		
		$this->load->view("backend_view_item",$data);
	}
	
	public function del(){
		
		$this->Backend_comments_model -> del($this->_GET_id);
		$this->lib_url->redirect_to_back("module");
	}
    
	public function templates()
    {
        echo modules::run('ext_templates', $this->module);
    }
}
 
