<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Spage extends MX_Controller {
    
    
    public function __construct(){
        parent::__construct();
        $this->load->Model('Spage_model');
        $this->load->library('lib_pagination');
        $this->lang->load('static');
        //$this->lib_media->media_folder = base_url().'images/'.$this->router->fetch_module();
    
    }
    public function index($catid, $viewid)
    {
       
    }
    function get_by_catagories($cata)
    {
        return $this->Spage_model->get_by_catagories($cata);
    }
    
    function show_content_by_catagory($cata)
    {
        $data = $this->Spage_model->get_by_catagories($cata);
        if(count($data))
        $this->load->view('view_item_content_only', $data[0]);
    }
       
    function view_item($catid)
    {
    	
        $data = array();
        
        $data += $this->Spage_model->view_item($catid);
        
		$this->config->set_item('body_layout', $data['body_layout']);
		
        $this->template->write("title",$data['tieu_de'], true);
        $this->template->write("description",$data['description'], true);
        
       /* $data['items_same_topic'] = $this->Spage_model->same_topic($catid);*/
        
        $this->load->view("view_item",$data);
    }
    
    function in_home()
    {
    	$data = array();
		$data['items'] = $this->Spage_model->in_home();
		$this->load->view("in_home",$data);
    }
	
	function block_spage_html_1()
	{
		$data = array();
		$data += $this->Spage_model->get_block('block_spage_html_1');
		$this->load->view("block_spage_html_1",$data);
	}
	function block_spage_html_2()
	{
		$data = array();
		$data += $this->Spage_model->get_block('block_spage_html_2');
		$this->load->view("block_spage_html_2",$data);
	}
	function block_spage_html_3()
	{
		$data = array();
		$data += $this->Spage_model->get_block('block_spage_html_3');
		$this->load->view("block_spage_html_3",$data);
	}
	function block_trang_chu_cot_phai()
	{
		$data = array();
		$data['items'] = $this->Spage_model->get_by_catagories('trang_chu_cot_phai');
		$this->load->view("block_trang_chu_cot_phai",$data);
	}
    
}
 
