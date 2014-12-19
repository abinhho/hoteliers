<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backend_cart extends MX_Controller {
	
	var $_GET_id;
	public $title = "Quản lý các đặt hàng";
	public function __construct(){
       	parent::__construct();
      	$this->load->Model('Backend_cart_model');
      	$this->load->library('lib_pagination');
      	$this->lang->load('static');
      	$this->load->library('form_validation');
      	
      	$this->module = $this->router->fetch_module();
      	
       	$this->lib_media->media_folder = base_url().'images/'.$this->router->fetch_module();
       	
       	$this->_GET_id = $this->lib_url->_GET('id');
	}
	public function index()
	{
	   if($this->_GET_id == '')
	   $this->show_item();
       else $this->view_item();
	}
	public function home(){
		
		$data = array();
		$data = $this->Backend_cart_model->home();
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
				$this->Backend_cart_model->del_multi();
			}		
		}
		$data += $this->Backend_cart_model->show_item();
		$this->load->view("backend_show_item",$data);
	}
	
	public function view_item(){
		
		$data = $this->Backend_cart_model->view_item($this->_GET_id);
		$this->template->write('title',$this->title, true);
		
		$submit = $this->input->post('submit');
        if($submit)
        {
        	$this->Backend_cart_model->do_status();
        }
		
		$this->load->view("backend_view_item",$data);
	}
	
	public function del(){
		
		$this->Backend_cart_model -> del($this->_GET_id);
		$this->lib_url->redirect_to_back("module");
	}
	
    public function templates()
    {
        echo modules::run('ext_templates', $this->module);
    }
}
 
