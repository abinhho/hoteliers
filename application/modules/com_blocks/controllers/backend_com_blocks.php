<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backend_com_blocks extends MX_Controller {
	
	public $title = "Backup dữ liệu";
	var $_GET_id;
	public function __construct(){
       	parent::__construct();
      	
      	$this->load->Model('Backend_com_blocks_model');
       	$this->load->helper('directory');
       	$this->load->helper('file');
       	$this->_GET_id = $this->lib_url->_GET('id');
       	$this->load->library('lib_convert');
       	$this->load->library('lib_modules');
              	
	}
	public function index()
	{
		$this->show_item();
	}
	
	public function show_item()
	{
		$data['items'] = $this->Backend_com_blocks_model->show_item();
		$this->load->view("show_item",$data);
	}
	
	public function blocks_each_module($module){
		
		$data = array();
		
		$submit = $this->input->post('submit');
		if($submit)
		{
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('block_name', 'Block', 'trim|required');
			if($this->form_validation->run())
			{
				$data_feed = $this->Backend_com_blocks_model->do_add($module);
				$this->lib_url->reload('');
			}
			
		}
		
		$data['items'] = $this->Backend_com_blocks_model->show_item_each_module($module);
		$this->load->view("show_item",$data);
		
		$this->template->write('title',"Quản lý blocks", true);
		$folder = APPPATH. "modules/".$module."/views";
		
		$data['folder_blocks'] = get_dir_file_info($folder);		
		$this->load->view("blocks_each_module",$data);
	}
	public function del(){
		
		$this->Backend_com_blocks_model -> del($this->_GET_id);
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
			/*$this->form_validation->set_rules('vi', 'vi', 'trim|required');*/
			/*if($this->form_validation->run())
			{*/
				$data_feed = $this->Backend_com_blocks_model->do_edit_promt($this->_GET_id);
				
    			$this->load->view("iframe/promt_feed" , $data_feed );
				return false;
			/*}
			else {
				$this->load->view("iframe/promt_feed");
				return false;
			}
*/			
		}
		
		$data += ($this->_GET_id != "") ? $this->Backend_com_blocks_model->data_edit_promt($this->_GET_id) : array() ;
		
		$this->load->view("backend_promt",$data);
		
	}
	
}
 
