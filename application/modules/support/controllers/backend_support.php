<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backend_support extends MX_Controller {
	
	var $_GET_id;
	public $title = "Quản lý hổ trợ trực tuyến";
	public function __construct(){
       	parent::__construct();
      	$this->load->Model('Backend_support_model');
      	$this->module = $this->router->fetch_module();
      	/*$this->load->library('lib_pagination');
      	$this->lang->load('static');
      	
       	$this->lib_media->media_folder = base_url().'images/'.$this->router->fetch_module();*/
       	
       	$this->_GET_id = $this->lib_url->_GET('id');
	}
	public function index()
	{
		$this->show_item();
	}
	public function show_item(){
		
		$data = array();
		
		$this->template->write('title',$this->title, true);
		$data = $this->Backend_support_model->show_item();
		
		$this->load->view("backend_show_item",$data);
	}
	
	public function edit_promt($id = ""){
		/*$this->template->write('title',$this->title, true);*/
		$this->load->library('form_validation');
		$this->load->library('lib_form');
		
		$this->_GET_id = $id;
		
		$data = array();
		$submit = $this->input->post('submit');
		
		if($submit)
		{
			$this->form_validation->set_rules('name', 'Tên menu', 'trim|required');
			//$this->form_validation->set_rules('module_alias', 'Module alias', 'trim|required');
			if($this->form_validation->run())
			{
				$this->Backend_support_model->do_edit_promt($data, $this->_GET_id);	
				$this->load->view("iframe/promt_feed" , array("messenger" => "Thành công"));
				
				return 0;
			}
			else {
				$this->load->view("iframe/promt_feed");
				return 0;
			}		
		}

		$data += ($this->_GET_id != "") ? $this->Backend_support_model->data_edit_promt($this->_GET_id) : array() ;
		$data['list_phong_ban'] = $this->Backend_support_model->list_phong_ban();
		$this->load->view("backend_form_edit_promt",$data);
		
	}
	public function del(){
		
		$this->Backend_support_model -> del($this->_GET_id);
		$this->lib_url->redirect_to_back();
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
 
