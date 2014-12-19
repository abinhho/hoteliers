<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backend_vote_ideals extends MX_Controller {
	
	var $_GET_id;
	public $title = "Quản lý bảng thăm dò ý kiến";
	public function __construct(){
       	parent::__construct();
      	$this->load->Model('Backend_vote_ideals_model');
      	$this->load->library('lib_pagination');
      	$this->lang->load('static');
      	
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
			$this->Backend_vote_ideals_model->do_del_multi($data);
		}
		$data = $this->Backend_vote_ideals_model->show_item();
		$this->load->view("backend_show_item",$data);
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
			$this->form_validation->set_rules('tieu_de', 'Nội dung thăm dò', 'trim|required');
			if($this->form_validation->run())
			{
				$data_feed = $this->Backend_vote_ideals_model->do_edit_promt($this->_GET_id);
				
    			$this->load->view("iframe/promt_feed" , $data_feed );
				return false;
			}
			else {
				$this->load->view("iframe/promt_feed");
				return false;
			}
			
		}
		
		$data += ($this->_GET_id != "") ? $this->Backend_vote_ideals_model->data_edit_promt($this->_GET_id) : array() ;
		
		$this->load->view("backend_promt",$data);
		
	}
	
	public function del(){
		
		$this->Backend_vote_ideals_model -> del($this->_GET_id);
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
 
