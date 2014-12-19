<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backend_user extends MX_Controller {
	
	var $_GET_id;
	public $title = "Quản lý người dùng";
	public function __construct(){
       	parent::__construct();
      	$this->load->Model('Backend_user_model');
      	$this->load->library('lib_pagination');
        $this->load->library('lib_modules');
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
		$submit = $this->input->post('submit');
		if($submit)
		{
			$this->Backend_user_model->do_del_multi($data);
		}
		$data = $this->Backend_user_model->show_item();
		$this->load->view("backend_show_item",$data);
	}
	public function del(){
		
		$this->Backend_user_model -> del_user($this->_GET_id);
		$this->lib_url->redirect_to_back();
	}
	public function edit(){
		$this->template->write('title',$this->title, true);
		$this->load->library('form_validation');
		
        $this->lib_modules->modules = $this->Backend_user_model->get_all_module();
        
		$data = array();
		$submit = $this->input->post('submit');
		if($submit)
		{
			$this->form_validation->set_rules('full_name', 'Họ tên', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('password', 'Mật khẩu', 'trim|required|min_length[6]');
			$this->form_validation->set_rules('re_password', 'Xác nhận mật khẩu', 'trim|required|matches[password]');
			if($this->form_validation->run())
			{
				$this->Backend_user_model->do_edit($data, $this->_GET_id);
			}
			
		}

		
		$data += ($this->_GET_id != "") ? $this->Backend_user_model->data_edit($this->_GET_id) : array() ;
		
		$this->load->view("backend_form_user",$data);
		
	}
	public function to_csv(){
		
		modules::load('ext_csv')->index('mod_user', "ID,email,full_name,location,phone,date_add");
	}
    public function system_clean()
    {
        echo modules::run('ext_system_clean','user');
    }
    public function blocks()
    {
        echo modules::run('com_blocks/backend_com_blocks/blocks_each_module', $this->module);

    }
    
    public function templates()
    {
        echo modules::run('ext_templates', $this->module);
    }
}
 
