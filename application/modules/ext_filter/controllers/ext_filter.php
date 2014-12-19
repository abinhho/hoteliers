<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ext_filter extends MX_Controller {
	
		public function __construct(){
       	parent::__construct();
       	$this->load->library('lib_menu');
       	$this->load->library('lib_convert');
       	
       	$this->load->Model('Ext_filter_model');
       	
       	$this->_GET_id = $this->lib_url->_GET('id');
	}
	function index()
	{
		$this->backend_filter_product();
	}
	public function backend_filter_product($module = ""){
		
		$submit = $this->input->post('submit_filter');
		
		if($submit)
		{
			$catid=$this->input->post('catid');
			$db_col_search = $this->input->post('db_col_search');
			$per_page=$this->input->post('per_page');
			
			$q = $this->lib_convert -> create_keysearch($this->input->post('q'));
			
			$url = $this->lib_url->link_back();
			
			$url = $this->lib_url->replace_all_ext($url , "module,op");
			
			$url = $this->lib_url->change_url($url,array(
			"catid" => $catid
			,"db_col_search" => $db_col_search
			,"per_page" => $per_page
			,"q" => $q
			));
			
			redirect($url);
		}
		
		$topic_id = $this->lib_menu->module_id($module);
		//echo $topic_id['ID'];
		
		$data['form_dropdown_by_module'] = $this->lib_menu->form_dropdown_menu_by_id(@$topic_id['ID']);
		$this->load->view('backend_filter_topic', $data);
	}
	public function sort_order($get){
		$url = $this->session->userdata('flashdata');
		
		if($get == "sort")
		{
		     $sorts = preg_split('/,/', $this->lib_url->_GET('sort'));
             redirect($this->lib_url->change_url($url, array('sort' => $sorts[0], 'order' => $sorts[1]  )));	
		}
		else
		{
			redirect($this->lib_url->change_url($url, array($get => $this->lib_url->_GET('sort')  )));
		}
	}
}
