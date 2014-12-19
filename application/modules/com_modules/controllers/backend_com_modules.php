<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backend_com_modules extends MX_Controller {
	
	var $_GET_id;
	public $title = "Quản lý các module";
	public function __construct(){
       	parent::__construct();
      	$this->load->Model('Backend_com_modules_model');
      	$this->load->library('lib_pagination');
      	$this->lang->load('static');
      	
       	
       	$this->_GET_id = $this->lib_url->_GET('id');
	}
	public function index()
	{
		$this->show_item();
	}
	public function show_item(){
		
		$data = array();
		
		$this->template->write('title',$this->title, true);
		/*$submit = $this->input->post('submit');
		if($submit)
		{
			$this->Backend_com_modules_model->do_del_multi($data);
		}*/
		$data = $this->Backend_com_modules_model->show_item();
		$this->load->view("backend_show_item",$data);
	}
	public function del(){
		
		$this->Backend_com_modules_model -> del($this->_GET_id);
		$this->lib_url->redirect_to_back();
	}
	public function edit($id = ""){
		
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
			$this->form_validation->set_rules('tieu_de', 'Tên module', 'trim|required');
			$this->form_validation->set_rules('alias', 'Alias', 'trim|required');
			if($this->form_validation->run())
			{
				$this->Backend_com_modules_model->do_edit($data, $this->_GET_id);
				$this->load->view("iframe/promt_feed" , array("messenger" => "Thành công"));
				
				return 0;
			}
			else {
				$this->load->view("iframe/promt_feed");
				return 0;
			}
			
		}

		
		$data += ($this->_GET_id != "") ? $this->Backend_com_modules_model->data_edit($this->_GET_id) : array() ;
		
		$this->load->view("backend_promt",$data);
		
	}
}
 
