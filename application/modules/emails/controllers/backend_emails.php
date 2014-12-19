<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backend_emails extends MX_Controller {
	
	var $_GET_id;
	public $title = "Quản lý người dùng";
	public function __construct(){
       	parent::__construct();
      	$this->load->Model('Backend_emails_model');
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
		$submit = $this->input->post('submit');
		if($submit)
		{
			$this->Backend_emails_model->do_del_multi($data);
		}
		$data = $this->Backend_emails_model->show_item();
		$this->load->view("backend_show_item",$data);
	}
	
	public function to_csv(){
		
		modules::load('ext_csv')->index('mod_emails', "*");
	}
	public function del(){
		
		$this->Backend_emails_model -> del($this->_GET_id);
		$this->lib_url->redirect_to_back();
	}
	public function edit_promt($id = ""){
		
		$this->template->write('title',$this->title, true);
		
		$this->_GET_id = $id;
		
		$this->load->library(array(
		'form_validation'
		,'lib_form'
		)
		);
		
		$data = array();
		
		$submit = $this->input->post('submit');
		if($submit)
		{
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			if($this->form_validation->run())
			{
				$data_feed = $this->Backend_emails_model->do_edit_promt($this->_GET_id);
				
    			$this->load->view("iframe/promt_feed" , $data_feed );
				return false;
			}
			else {
				$this->load->view("iframe/promt_feed");
				return false;
			}
			
		}
		
		$data += ($this->_GET_id != "") ? $this->Backend_emails_model->data_edit_promt($this->_GET_id) : array() ;
		
		$this->load->view("backend_promt",$data);
		
	}
    public function blocks()
    {
        echo modules::run('com_blocks/backend_com_blocks/blocks_each_module', "emails");
    
    }
    
    public function templates()
    {
        echo modules::run('ext_templates', $this->module);
    }
}
 
