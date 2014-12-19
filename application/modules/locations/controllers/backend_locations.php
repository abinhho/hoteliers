<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backend_locations extends MX_Controller {
	
	var $_GET_id;
	public $title = "Quản lý các tỉnh thành phố";
	public function __construct(){
       	parent::__construct();
      	$this->load->Model('Backend_locations_model');
      	
      	$this->module = $this->router->fetch_module();
      	
      	$this->load->library(array(
        'form_validation'
        ,'lib_form'
        )
        );
      	
      	$this->lang->load('static');
      	
       	
       	$this->_GET_id = $this->lib_url->_GET('id');
	}
	public function index()
	{
		$this->show_item();
	}
	public function dropdown_parent_locations($id, $name = 'tinh_thanh')
	{
		$data = array();
		$id = ($id == "") ? 1 : $id;
        $data += $this->Backend_locations_model->parent_items($id);
        $data['name'] = $name;
        
        $this->load->view("backend_form_dropdown",$data);
	}
	
    public function dropdown_child_locations($id = "", $name = 'quan_huyen')
    {
        $data = array();
        $id = ($id == "") ? 1 : $id;
        $data += $this->Backend_locations_model->child_items($id);
        $data['name'] = $name;
        
        $this->load->view("backend_form_dropdown",$data);
    }
	
	public function show_item(){
		
		$data = array();
		
		$this->template->write('title',$this->title, true);
	
		$data['items'] = $this->Backend_locations_model->items($this->lib_url->_GET('parent_id'));
		
		$this->load->view("backend_show_item",$data);
		
	}
	public function del(){
		
		$this->Backend_locations_model -> del($this->_GET_id);
		$this->lib_url->redirect_to_back();
	}
	public function edit_promt($id = ""){
		
		
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
			$this->form_validation->set_rules('tieu_de', 'Vị trí', 'trim|required');
			if($this->form_validation->run())
			{
				$this->Backend_locations_model->do_edit($this->_GET_id);
				$this->load->view("iframe/promt_feed" , array("messenger" => "Thành công"));
				
				return 0;
			}
			else {
				$this->load->view("iframe/promt_feed");
				return 0;
			}
			
		}

		
		$data += ($this->_GET_id != "") ? $this->Backend_locations_model->data_edit($this->_GET_id) : array() ;
		$data['parent_id'] = $this->lib_url->_GET('parent_id');
		
		$this->load->view("backend_promt",$data);
		
	}
	
    public function templates()
    {
        echo modules::run('ext_templates', $this->module);
    }
}
 
