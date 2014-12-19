<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends MX_Controller {
	
	var $layout_right;
	public function __construct(){
       	parent::__construct();
      	$this->load->Model('Products_model');
      	$this->load->library('lib_pagination');
        $this->load->library('lib_convert');
      	$this->lang->load('static');
        $this->module = $this->router->fetch_module();
       	//$this->lib_media->media_folder = base_url().'images/'.$this->router->fetch_module();
        $this->load->library('lib_comments');
        
	}
	public function index($catid, $viewid)
	{ 
		$this->session->set_userdata('flashdata', $this->lib_url->getUrl());
		if(empty($viewid))
		$this->show_item($catid);
		else {
			$this->view_item($viewid);
		}
	}
	
	public function show_item($catid){
		
        $url = $this->lib_url->getUrl();
        
		$this->config->set_item('body_layout', 'body');
		
		$data = array();
		$type = '';
        if(strpos($url, 'khuyen-mai.html')){
            $data['title'] = "Các sản phẩm đang khuyến mãi";
            $data['description'] = "Xem tất cả các sản phẩm đang khuyến mãi";    
            $type = 'promotion';
        }
        elseif(strpos($url, 'noi-bat.html')){
            $data['title'] = "Các sản phẩm nổi bật";
            $data['description'] = "Xem tất cả các sản phẩm nổi bật";    
            $type = 'hot';
        }
        else{
            $data = $this->lib_menu->meta_by_catid($catid);    
        }
		
        if($data['title'] == '')
        {
            $data['title'] = "Các sản phẩm đang bán";
            $data['description'] = "Danh sách các sản phẩm mới đang bán.";
        }
        
        $this->template->write("title",$data['title'], true);
        $this->template->write("description",$data['description'], true);
                    
		$data += $this->Products_model->show_item($catid, $type);
		//$data['form_filter_seach'] =  modules::load('ext_filter');
		
		//echo Modules::run('ad_images/ad_images_body', 'body_1');
		
		$this->load->view('ad_images/ad_images_body', array('items' => 
		$this->load->model('ad_images/Ad_images_model')->get_data('body_1',1)
		));
		
		$this->load->view("show_item",$data);
		
		$this->load->view('ad_images/ad_images_body', array('items' => 
        $this->load->model('ad_images/Ad_images_model')->get_data('body_2',1)
        ));
		
	}
	
    public function show_item_noi_bat($catid){
        
        $data = array();
        $data['title'] = "Địa điểm nổi bật";
        $data += $this->Products_model->show_item_noi_bat($catid);
        
        if(count($data['items']) > 0)
        $this->load->view("show_item_noi_bat",$data);
        
    }
	
	
	
    
    public function noi_bat_in_home(){
       
        $data = array();
                        
        $data += $this->Products_model->noi_bat_in_home(3);
        $data['title'] = "Sản phẩm nam nữ nổi bật nhất";
        $data['title_link_more'] = 'Xem thêm các sản phẩm nổi bật';
        $data['link_more'] = base_url('61/san-pham-noi-bat.html');
        $data['four_col'] = false;
        $this->load->view("show_item_in_home",$data);
        return '';
    }
    
    public function newest_in_home(){
        
        
        $data = array();
                        
        $data += $this->Products_model->newest_in_home();
        $data['title'] = "Sản phẩm mới cập nhật";
        $data['four_col'] = true;
        $data['title_link_more'] = 'Xem thêm các sản phẩm mới nhất';
        $data['link_more'] = base_url('61/danh-muc-san-pham.html');
        $this->load->view("show_item_in_home",$data);
        return '';
    }
    public function each_in_home($catid){
        
        $data = array();
                        
        $data += $this->Products_model->in_home($catid);
        
        $this->load->view("show_item_in_home",$data);
        
        return '';
    }
    
    public function block_products_in_slider_image(){
        
        $data = array();
                        
        $data += $this->Products_model->noi_bat_in_home($limit = 8);
        
        $this->load->view("other/block_products_in_slider_image",$data);
        
    }
    
    public function in_home(){
        
    	    	
        $this->noi_bat_in_home();
    	
    	$this->newest_in_home();
    	
    }
    
	
	   
	function view_item($catid)
	{
		$data = array();
		
		$data += $this->Products_model->view_item($catid);
		
        $this->template->write("title",$data['tieu_de'], true);
        $this->template->write("description",$data['description'], true);
        
        
        $data['full_name'] = $this->lib_auth->info_by_id($data['user_id'])->full_name;
        
        $data['items_same_topic'] = $this->Products_model->same_topic($catid);
        
        $data['module'] = $this->module;
        
        $this->load->view("view_item",$data);
        
        $this->load->model('stat/stat_model')->increment_viewed_times($this->module, $catid);
        
        
        
	}
    public function block_products_noi_bat_1_column(){
        
        $data = array();
                
        $data += $this->Products_model->block_products_noi_bat_1_column();
        $data['cata_text'] = "Sản phẩm nổi bật";
        $this->load->view("block_products_noi_bat_1_column",$data);
    }

    function search()
    {
        $this->session->set_userdata('flashdata', $this->lib_url->getUrl());
    	$this->config->set_item('body_layout', 'left_body');
    	
    	$this->template->write("title", str_replace('+',' ', $this->lib_url->_GET('q')), true);
        $data = array();       
        $data += $this->Products_model->search();
        //$data['form_filter_seach'] =  modules::load('ext_filter');
        $data['title'] = "Tìm kiếm : ". str_replace("+"," ", $this->lib_url->_GET('q'));
        $this->load->view("show_item",$data);
    }
    
    function create_search()
    {
    	$this->load->library('lib_convert');
    	
    	$url = 'search-products/';
    	$q = $this->input->post('q');
    	$catid = $this->input->post('catid');
    	//$tinh_thanh = $this->input->post('tinh_thanh');
    	//$quan_huyen = $this->input->post('quan_huyen');
    	//$sid_location = ($quan_huyen == "") ? $tinh_thanh : $quan_huyen;
    	$arr = array(
    	   //,"sid_location" => $sid_location
    	   //,"catid" => $catid
    	   "q" => $this->lib_convert -> create_keysearch($q)
    	); 
    	$url = $this->lib_url->change_url($url, $arr);
    	redirect($url);
    }
	
}
 
