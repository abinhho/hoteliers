<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends MX_Controller {
	
		public function __construct(){
       	parent::__construct();
       	$this->load->helper('form');
       	       	
       	$this->load->Model('Menu_model');
       
	}
	public function index()
	{
		
	}
	public function block_menu_ngang(){
		
		$data = array();
		$this->lib_menu_block->db_rows = $this->Menu_model->get_items("menu_ngang");
		$data['html_menu'] = $this->lib_menu_block->show_menu('frontend', $accept_child = true);
		$this->load->view('block_menu_ngang', $data);
	}
    public function block_menu_ngang_01(){
		
		$data = array();
		$this->lib_menu_block->db_rows = $this->Menu_model->get_items("menu_ngang_01");
		$data['html_menu'] = $this->lib_menu_block->show_menu('frontend', $accept_child = true);
		$this->load->view('block_menu_ngang_01', $data);
	}
	
	public function block_menu_doc(){
		
		$data = array();
		$this->lib_menu_block->db_rows = $this->Menu_model->get_items("menu_doc");
		$data['html_menu'] = $this->lib_menu_block->show_menu('frontend', $accept_child = true);
		$data['info_block'] = $this->lib_blocks->info_block('block_menu_doc');
		$this->load->view('block_menu_doc', $data);
	}
	public function block_menu_top(){
		
		$data = array();
		$this->lib_menu_block->db_rows = $this->Menu_model->get_items("menu_top");
		$data['html_menu'] = $this->lib_menu_block->show_menu('frontend', $accept_child = true);
		$this->load->view('block_menu_top', $data);
	}
	public function block_menu_footer(){
		
		$data = array();
		$this->lib_menu_block->db_rows = $this->Menu_model->get_items("menu_footer");
		$data['html_menu'] = $this->lib_menu_block->show_menu('frontend', $accept_child = true);
		$this->load->view('block_menu_footer', $data);
	}
}
