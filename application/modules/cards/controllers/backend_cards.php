<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backend_cards extends MX_Controller {
	
	var $_GET_id;
	public $title = "Quản lý thẻ";
	public function __construct(){
       	parent::__construct();
      	$this->load->Model('Backend_cards_model');
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
		$data = $this->Backend_cards_model->home();
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
				$this->Backend_cards_model->del_multi();
			}		
		}
		$data = $this->Backend_cards_model->show_item();
		$this->load->view("backend_show_item",$data);
	}
	
    public function edit(){
        $this->template->write('title',$this->title, true);
        $this->load->library('form_validation');
        
        $data = array();
        $submit = $this->input->post('submit');
        if($submit)
        {
            $this->form_validation->set_rules('the_code', 'Mã số thẻ', 'trim|required');
        	$this->form_validation->set_rules('full_name', 'Họ tên', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|valid_email');
            if($this->form_validation->run())
            {
                $this->Backend_cards_model->do_edit($data, $this->_GET_id);
            }
            
        }

        
        $data += ($this->_GET_id != "") ? $this->Backend_cards_model->data_edit($this->_GET_id) : array() ;
        
        $this->load->view("backend_edit_form",$data);
        
    }
	
	public function del(){
		
		$this->Backend_cards_model -> del($this->_GET_id);
		$this->lib_url->redirect_to_back("module");
	}
	
    public function templates()
    { 
        echo modules::run('ext_templates', $this->module);
    }
}
 
