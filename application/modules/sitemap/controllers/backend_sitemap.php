<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backend_sitemap extends MX_Controller {
	
		public $images;
		public $title = "Quản lý tất cả danh mục và sitemap";
		public function __construct(){
       	parent::__construct();
       	$this->load->helper('form');
       	$this->load->library('lib_menu');
       	
       	$this->module = $this->router->fetch_module();
       	
       	$this->load->Model('Backend_sitemap_model');
       	
       	$this->_GET_id = $this->lib_url->_GET('id');
	}
	public function index()
	{
		$this->show_catagory();
	}
	public function show_catagory(){
		
		$this->template->write('title',$this->title, true);
		
		$this->lib_menu->sitemap =  $this->Backend_sitemap_model->show_catagory();
		$data['all_cata'] = $this->lib_menu->build_site_map_back_end();
		
		$this->load->view('backend_show_catagory', $data);
	}
	public function sitemap()
	{
		$data = array();
		$this->template->write('title',$this->title, true);
		echo modules::run('menu/backend_menu/menu_temp','sitemap', 'sitemap');
		
	}
	public function edit($type ="edit", $id = ""){
		
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
			$this->form_validation->set_rules('tieu_de', 'Tên menu', 'trim|required');
			//$this->form_validation->set_rules('module_alias', 'Module alias', 'trim|required');
			if($this->form_validation->run())
			{
				$this->Backend_sitemap_model->do_edit($type, $this->_GET_id);
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
			$data += ($this->_GET_id != "") ? $this->Backend_sitemap_model->data_edit($this->_GET_id) : array() ;	
		}
		elseif($type == "add") {
			$data['parent_id'] = $id;
		}
		
		
		$this->load->view("backend_cata_promt",$data);
		
	}
	public function del($id){
		
		/*Del iframe*/
		$data = array();
		if(!$this->Backend_sitemap_model -> del($id))
		{
			$data['ok'] = "error";
			$data['messenger'] = "Không thể xóa mục này \n Lổi: có menu con";
		}
		$this->load->view('iframe/promt_feed',$data);
		/*$this->lib_url->redirect_to_back();*/
	}
	
    public function templates()
    {
        echo modules::run('ext_templates', $this->module);
    }
}
