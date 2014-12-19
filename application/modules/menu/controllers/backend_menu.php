<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backend_menu extends MX_Controller {

	public $title = "Quản lý các menu";

	public function __construct(){
		parent::__construct();
		$this->load->helper('form');

		$this->module = $this->router->fetch_module();
		
		$this->load->library(array(
		'form_validation'
		,'lib_form'
		,'lib_menu'
		,'lib_menu_block'
		)
		);

		$this->load->Model('Backend_menu_model');

		$this->_GET_id = $this->lib_url->_GET('id');
	}
	public function index()
	{
		$this->menu_top();
	}

	public function menu_temp($block, $title)
	{
		$this->template->write('title',$this->title, true);

		$data = array("caption" => "Quản lý ". $title);

		$this->lib_menu_block->db_rows = $this->Backend_menu_model->get_items($block);

		$data['all_menu'] = $this->lib_menu_block->show_menu('backend', $accept_child = true);
		$data['block'] = $block;
		$this->load->view('backend_show_menu', $data);
	}

	public function menu_ngang(){

		$this->menu_temp('menu_ngang', "menu ngang");
	}
    public function menu_ngang_01(){

		$this->menu_temp('menu_ngang_01', "menu ngang 01");
	}
	public function menu_top(){

		$this->menu_temp('menu_top', "menu top");
	}
	public function menu_doc(){

		$this->menu_temp('menu_doc', "menu dọc");
	}
    public function menu_footer(){

		$this->menu_temp('menu_footer', "menu Footer");
	}

	public function edit($block, $type ="edit", $id = ""){

		$this->_GET_id = $id;

		$data = array();
		$submit = $this->input->post('submit');
		if($submit)
		{
			$this->form_validation->set_rules('tieu_de', 'Tên menu', 'trim|required');
			//$this->form_validation->set_rules('module_alias', 'Module alias', 'trim|required');
			if($this->form_validation->run())
			{
				$this->Backend_menu_model->do_edit($block, $type, $this->_GET_id);
				$this->load->view("iframe/promt_feed" , array("messenger" => "Thành công"));

				return 0;
			}
			else {
				$this->load->view("iframe/promt_feed");
				return 0;
			}
				
		}

		if($type == "edit")
		{
			$data += ($this->_GET_id != "") ? $this->Backend_menu_model->data_edit($this->_GET_id) : array() ;
		}
		elseif($type == "add") {
			$data['parent_id'] = $id;
		}
		/*print_r ($data);*/

		$this->load->view("backend_promt",$data);

	}

	public function radio_select_menu($block, $id = "")
	{
		$data = array();
		$submit = $this->input->post('submit');
		if($submit)
		{
			$this->form_validation->set_rules('menu', 'Menu', 'trim|required');
			//$this->form_validation->set_rules('module_alias', 'Module alias', 'trim|required');
			if($this->form_validation->run())
			{
				$this->Backend_menu_model->do_radio_select_menu($block, $id);
				$this->load->view("iframe/promt_feed" , array("messenger" => "Thành công"));

				return 0;
			}
			else {
				$this->load->view("iframe/promt_feed");
				return 0;
			}
				
		}

		$data['radio_select_menu'] = $this->Backend_menu_model->radio_select_menu($block);
		$this->load->view("backend_radio_select_menu",$data);
	}

	public function del($id){

		/*Del iframe*/
		$data = array();
		if(!$this->Backend_menu_model -> del($id))
		{
			$data['ok'] = "error";
			$data['messenger'] = "Không thể xóa mục này \n Lổi: có menu con";
		}
		$this->load->view('iframe/promt_feed',$data);
		/*$this->lib_url->redirect_to_back();*/
	}

    public function blocks()
    {
        echo modules::run('com_blocks/backend_com_blocks/blocks_each_module', "menu");

    }
    
    public function templates()
    {
        echo modules::run('ext_templates', $this->module);
    }
	
}
