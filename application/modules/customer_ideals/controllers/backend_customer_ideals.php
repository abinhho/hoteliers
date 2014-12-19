<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backend_customer_ideals extends MX_Controller {
	
	var $_GET_id;
	public $title = "Quản lý các customer ideals";
	public function __construct(){
       	parent::__construct();
      	$this->load->Model('Backend_customer_ideals_model');
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
	public function home(){
		
		$data = array();
		$data = $this->Backend_customer_ideals_model->home();
		$this->load->view("backend_home",$data);
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
				$this->Backend_customer_ideals_model->del_multi();
			}		
		}
		$data = $this->Backend_customer_ideals_model->show_item();
		$this->load->view("backend_show_item",$data);
	}
	
	public function view_item(){
		
		$data = $this->Backend_customer_ideals_model->view_item($this->_GET_id);
		$this->template->write('title',$this->title, true);
		
		$this->load->view("backend_view_item",$data);
	}
	
	public function del(){
		
		$this->Backend_customer_ideals_model -> del($this->_GET_id);
		$this->lib_url->redirect_to_back("module");
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
			$this->form_validation->set_rules('full_name', 'Họ tên', 'trim|required');
            $this->form_validation->set_rules('noi_dung', 'Nội dung', 'trim|required');
			if($this->form_validation->run())
			{
				$data_feed = $this->Backend_customer_ideals_model->do_edit_promt($this->_GET_id);
				
    			$this->load->view("iframe/promt_feed" , $data_feed );
				return false;
			}
			else {
				$this->load->view("iframe/promt_feed");
				return false;
			}
			
		}
		
		$data += ($this->_GET_id != "") ? $this->Backend_customer_ideals_model->data_edit_promt($this->_GET_id) : array() ;
		
		$this->load->view("backend_promt",$data);
		
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
 
