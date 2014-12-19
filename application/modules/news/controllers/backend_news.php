<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backend_news extends MX_Controller {
	
	var $_GET_id;
	var $module_alias = "news";
	public $title = "Quản lý bài viết";
	public function __construct(){
       	parent::__construct();
      	$this->load->Model('Backend_news_model');
      	$this->load->library('lib_pagination');
      	$this->lang->load('static');
      	$this->load->library('form_validation');
      	
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
		
		$submit = $this->input->post('submit');
		if($submit)
		{
			$this->form_validation->set_message('required', 'Bạn phải chọn ít nhất một mục');
			$this->form_validation->set_rules('multi_select[]', '', 'required');
			
			if($this->form_validation->run())
			{
				$this->Backend_news_model->del_multi();
			}		
		}
				
		$data = $this->Backend_news_model->show_item();
		$data['form_filter_seach'] =  modules::load('ext_filter');
		
		$this->load->view("backend_show_item",$data);
	}
	public function del(){
		
		$this->Backend_news_model -> del($this->_GET_id);
		$this->lib_url->redirect_to_back();
	}
	public function edit(){
		$this->template->write('title',$this->title, true);
				
		$data = array();
		
		$data['active'] = 1;
		$data['active_comment'] = 1;
		$data['active_vote'] = 1;
		
		$data_model = ($this->_GET_id != "") ? $this->Backend_news_model->data_edit($this->_GET_id) : array() ;
		
		$data = array_merge($data, $data_model);
		$submit = $this->input->post('submit');
		
		if($submit)
		{
			$this->form_validation->set_rules('tieu_de', 'Tiêu đề', 'trim|required');
			$this->form_validation->set_rules('catid', 'Danh mục', 'required');
			$this->form_validation->set_rules('active', '', '');
			$this->form_validation->set_rules('active_comment', '', '');
			$this->form_validation->set_rules('active_vote', '', '');

			if($this->form_validation->run())
			{
				$this->Backend_news_model->do_edit($data, $this->_GET_id);
			}
			$data['images'] = $this->input->post('images');		
		}
		
		$data['module_alias'] = $this->module_alias;
		
		$this->load->view("backend_form_edit",$data);
		
	}
	public function copy(){
		
		$this->Backend_news_model->copy($this->_GET_id);
		$this->lib_url->redirect_to_back();
	}
	
    public function system_clean()
    {
        echo modules::run('ext_system_clean','news');
    }
    
    public function templates()
    {
        echo modules::run('ext_templates', $this->module);
    }
    public function blocks()
    {
        echo modules::run('com_blocks/backend_com_blocks/blocks_each_module', "news");

    }
    
  
}
 
