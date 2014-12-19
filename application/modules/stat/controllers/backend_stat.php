<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backend_stat extends MX_Controller {
	
	var $_GET_id;
	public $title = "Quản lý thống kê truy cập site";
	public function __construct(){
       	parent::__construct();
      	$this->load->Model('Backend_stat_model');
      	$this->load->library('lib_pagination');
      	$this->lang->load('static');
      	$this->load->library('form_validation');
      	
      	$this->module = $this->router->fetch_module();
      	
       	$this->lib_media->media_folder = base_url().'images/'.$this->router->fetch_module();
       	
       	$this->_GET_id = $this->lib_url->_GET('id');
	}
	public function index()
	{
		$this->show_item();
	}
	public function home()
	{
		$data = array();
		$this->Backend_stat_model->home($data);
		$this->load->view("backend_home",$data);
	}
	public function to_csv(){
		
		modules::load('ext_csv')->index('mod_stat', "*");
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
				$this->Backend_stat_model->del_multi();
			}		
		}
		$data = $this->Backend_stat_model->show_item();
		$this->load->view("backend_show_item",$data);
	}

	public function del(){
		
		$this->Backend_stat_model -> del($this->_GET_id);
		$this->lib_url->redirect_to_back();
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
 
