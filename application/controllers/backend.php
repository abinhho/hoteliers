<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backend extends MX_Controller {
	
	public $tb_conf = array();
	public $_GET_module = "";
	public $_GET_op = "";
	
	public function __construct(){
      	parent::__construct();
      	$this->template->set_template("backend");
     	$this->load->Model('Backend_Model');
      	$this->load->helper(array('form','backend') );
      	$this->load->library('lib_form');
      	$this->load->library('lib_input');
      	
      
      $this->_GET_module = isset($_GET['module']) ? $_GET['module'] : "";
      $this->_GET_op = isset($_GET['op']) ? $_GET['op'] : "index";
      
      	$this->template->add_css('assets/css/admin.css');
		$this->template->add_css('assets/css/ui.css');
		$this->template->add_css('assets/css/datepicker.css');
		$this->template->add_css('assets/css/promt.css');
		$this->template->add_css('assets/css/lightbox.jquery.css');
		$this->template->add_js('assets/js/jquery.js');
		$this->template->add_js('assets/js/lightbox.jquery.js');
		$this->template->add_js('assets/js/promt.js');
		$this->template->add_js('assets/js/fn.js');
		$this->template->add_js('assets/js/datepicker.js');
       
	}
	public function index()
	{
		/* Loading css and js file */ 
		//$this->tb_conf = $this->Backend_Model->load_conf();
		
		
		if (!$this->lib_auth->is_logged_in_admin())
		{
			redirect('admin/login');
		}
		else {
			$this->template->write("title","Quản trị");
			$this->template->write_view("header","backend_header");
			
			$this->template->write_view("left_menu","backend_left_menu",array('left_menu' => $this->left_menu()));
			$this->template->write("nav_menu", $this->nav_menu());

			if(!empty($this->_GET_module))
			{
                if($this->lib_auth->check_permission_module($this->_GET_module))
				$this->template->write("content",modules::run($this->_GET_module.'/backend_'.$this->_GET_module.'/'.$this->_GET_op));
                else
                $this->template->write("content", "<p class='red'>Access denied. No permission !!!</p>");
			}
			else{
				$this->template->write("content", modules::run('cart/backend_cart/home') );
				$this->template->write("content", modules::run('stat/backend_stat/home') );
				$this->template->write("content", modules::run('feedback/backend_feedback/home') );
				
			}
			
			
			$this->template->render();
		}
	}
	public function login(){
		$this->template->write("title","Login Pannel");
		$data = array();
		$this->load->library('form_validation');
		
		$submit = $this->input->post('submit');
		if($submit){

			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$check_login = modules::run('user/user/check_login',$email,$password);
			if($check_login != 2)
			{
				$data["error_messenger"] = "<div class='text_error'>- Lỗi. Email hoặc mật khẩu không đúng</div>";
			}
			else {
				redirect('admin');
			}
		}
		
		$this->form_validation->set_rules('email', 'Tên đăng nhập', 'trim|required');
		$this->form_validation->set_rules('password', 'Mật khẩu', 'trim|required');
		$this->form_validation->run();
		
		$this->template->write_view("backend_login_form","backend_login_form",$data);
		$this->template->render();
		
	}
	public function left_menu()
	{
		$r="";
		$this->load->library('lib_sort');
		
		$arrs = $this->Backend_Model->active_mods();
		$this->lib_sort->move2top_db_array($arrs, 'alias', @$_GET['module']);
		
		foreach ($arrs as $row) {
		  
            if($this->lib_auth->check_permission_module($row['alias']))
			if (strpos($row['alias'] , "com_") === false || $row['alias'] == $this->_GET_module ) :
			$active = ($this->_GET_module==$row['alias'])? "class='active'" : ''; 
			
			$r .= "<li {$active}><a href='?module={$row['alias']}'>{$row['tieu_de']}</a>";
			if(!empty($active))
			$r .= modules::run($row['alias']."/backend_op_menu/index");
			$r .= "</li>";
			endif;
		}
		return $r;
	}
	public function nav_menu(){
		$r="";
		$r .= "<li><a href='".base_url('admin')."'>Trang chủ quản trị</a></li>";
		foreach ($this->Backend_Model->active_mods() as $row) {
            
            if($this->lib_auth->check_permission_module($row['alias']))
			if (strpos($row['alias'] , "com_") !== false) :
			$active = ($this->_GET_module==$row['alias'])? "class='active'" : ''; 
			
			$r .= "<li {$active}><a href='?module={$row['alias']}'>{$row['tieu_de']}</a>";
			if(!empty($active))
			$r .= modules::run($row['alias']."/backend_".$row['alias']."/op_menu");
			 
			$r .= "</li>";
			endif;
		}
		return $r;
	}
}
