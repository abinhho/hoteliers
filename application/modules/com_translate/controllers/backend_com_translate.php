<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backend_com_translate extends MX_Controller {
	
	var $_GET_id;
	public $title = "Quản lý bảng dịch các ngôn ngữ";
	public function __construct(){
       	parent::__construct();
      	$this->load->Model('Backend_com_translate_model');
      	$this->load->library('lib_pagination');
      	$this->lang->load('static');
      	
       	$this->lib_media->media_folder = base_url().'images/'.$this->router->fetch_module();
       	
       	$this->_GET_id = $this->lib_url->_GET('id');
       	
       	$temp = array();
       	foreach($this->config->item('site_lang') as $lang => $text)
       	{
       		if($lang == "") $lang = "vi";
       		$temp[] = $lang;
       	}
       	$this->Backend_com_translate_model->langs = $temp;
      
       	
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
			$this->Backend_com_translate_model->do_del_multi($data);
		}
		$data = $this->Backend_com_translate_model->show_item();
		$data['arr_langs'] = $this->Backend_com_translate_model->langs;
		$this->load->view("backend_show_item",$data);
	}
	
	public function to_csv(){
		
		$select = implode(",", $this->Backend_com_translate_model->langs);
		modules::load('ext_csv')->index('com_translate', $select);
	}
	public function del(){
		
		$this->Backend_com_translate_model -> del($this->_GET_id);
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
			$this->form_validation->set_rules('vi', 'vi', 'trim|required');
			if($this->form_validation->run())
			{
				$data_feed = $this->Backend_com_translate_model->do_edit_promt($this->_GET_id);
				
    			$this->load->view("iframe/promt_feed" , $data_feed );
				return false;
			}
			else {
				$this->load->view("iframe/promt_feed");
				return false;
			}
			
		}
		$data['arr_langs'] = $this->Backend_com_translate_model->langs;
		
		$data += ($this->_GET_id != "") ? $this->Backend_com_translate_model->data_edit_promt($this->_GET_id) : array() ;
		
		$this->load->view("backend_promt",$data);
		
	}
}
 
