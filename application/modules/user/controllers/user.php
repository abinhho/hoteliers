<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MX_Controller {
	var $img_folder = "";
	public function __construct(){
       	parent::__construct();
       	$this->load->Model('User_model');
       	$this->img_folder = base_url().'media/'.$this->router->fetch_module();
        
        $this->load->helper('myform');
        $this->load->library('lib_form');
        $this->load->library('lib_pagination');
        
	}
	public function index($viewid = "")
	{ 
		$this->config->set_item("body_layout" , "body");
		if($this->lib_auth->check_permission($viewid))
		$this->edit($viewid);
		else $this->info($viewid);
	}
    function ajax_check()
    {
        $data = array(
        'ok' => $this->session->userdata('ID')
        ,'message' => ''
        );
        if($this->lib_auth->check_permission())
        {
            $data['ok'] = -1;
        }
        echo json_encode($data);
        
    }
    function ajax_tooltip_info()
    {
        $data = $this->User_model->ajax_tooltip_info();
        if(!count($data)) return '';
        $this->load->view('ajax/tooltip_info', $data);
        
    }
    function ajax_user_notes()
    {
        $user_id = $this->session->userdata('ID');
        if(empty($user_id)) return ;
        
        $rows = $this->User_model->ajax_user_notes($user_id);
        $html = '';
        $p_ID = array();
        if(count($rows))
        foreach($rows as $row)
        {
            $p_ID[] = $row['p_ID'];
            $html .= '<li>';
            $html .= anchor('user/'.$row['user_id_from'], $row['full_name']). ' – ' . $row['action_name'].' '
            . anchor($row['link'], $row['tieu_de'])
            . ' – '. $this->lib_date->ago($row['date_upd']);
            
            $html .= '</li>';
        }
        else $html .= '<span class="no_result">Không có thông báo nào.</span>';
        $html .= '<input type="hidden" name="user_notes" value="'.implode(',',$p_ID).'">';
        $data = array(
        'numof_notes' => count($rows)
        ,'html' => $html
        );
        echo json_encode($data);
        
    }
    function ajax_set_viewed_user_notes()
    {
        $this->User_model->ajax_set_viewed_user_notes();
    }
    function ajax_del_user_notes()
    {
        $this->User_model->ajax_del_user_notes();
    }
    function ajax_form_login()
    {
         
       $this->facebook_login();
	   $this->google_login();
        
	   $data = array();
	  
	   $this->load->view("ajax/login_form", $data);
    }
    
    
	function show_item()
    {
        $this->config->set_item("body_layout" , "body");
        $this->config->set_item("active_menu", "user");
        $data = array();
        $data['title'] = 'Danh sách các thành viên';
        $this->template->write('title',$data['title'], true);
        $data['description'] = $data['title'];  
        
        $data += $this->User_model->show_item();
        $this->load->view("show_item",$data);
    }
    function change_lang($lang = "")
    {
        if($lang == $this->config->item('default_lang') ) $lang = "";
        $this->session->set_userdata(array('lang'=>$lang));
        //echo $this->session->userdata('lang');
        $this->lib_url->redirect_to_back();
    }
	public function info($id)
	{ 
	   $this->config->set_item("body_layout" , "body");
	   $this->session->set_userdata('user_id_topic',$id);
        $this->config->set_item("active_menu", "user");
        $data = array();
        $data = $this->User_model->data_edit($id);
        
        $data['user_id_topic'] = $id;
        
        $this->template->write('title', $data['full_name'] , true);
        $this->load->view("info",$data);
        
	}
	public function edit($id){
		$this->config->set_item("body_layout" , "body");
        $this->session->set_userdata('user_id_topic',$id);
        
        if(!$this->lib_auth->check_permission($id))
        redirect('user/'.$id);
        
        $this->config->set_item("active_menu", "user");
        $this->template->write('title',"Chỉnh sửa thông tin cá nhân", true);
        $this->load->library('form_validation');
        
        $data = array();
        $submit = $this->input->post('submit_user_info');
        $submit_back = $this->input->post('submit_user_info_back');  
        if($submit || $submit_back)
        {
            $this->form_validation->set_rules('user[full_name]', 'Họ tên', 'trim|min_length[6]|required');
            //$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('password', 'Mật khẩu', 'trim|required|min_length[6]');
            $this->form_validation->set_rules('re_password', 'Xác nhận mật khẩu', 'trim|matches[password]');
            if($this->form_validation->run())
            {
                $this->User_model->do_edit($data, $id);
				if(!$submit_back) 
				$this->lib_url->reload("Cập nhật thành công...");
				else
				$this->lib_url->redirect('user/'.$id, "Cập nhật thành công...");
            }
        }

        
        $data += ($id != "") ? $this->User_model->data_edit($id) : array() ;
        
        $this->load->view("edit_form",$data);
        
    }
	
	public function check_login($email, $password){
		return $this->User_model->check_login($email, $password);		
	}
	public function logout(){
		
		$this->lib_auth->logout();
		if ($this->agent->is_referral())
		{ 
		   redirect($this->agent->referrer());
		}
		else
		redirect();
	}
	public function login(){
	   $this->config->set_item("body_layout" , "body");
       $this->config->set_item("active_menu", "user");
	   if($this->lib_auth->is_logged()){
	       $this->lib_url->redirect_flashdata();
	   }
       
       
       $this->template->write('title', "Đăng nhập/ đăng ký tài khoản", true);
       
       
	   //$this->google_login();
       //$this->facebook_login();
        
	   $data = array();
	   $submit_login = $this->input->post('submit_login');
        if($submit_login)
        {
            $this->do_login($data);
        }
	   $submit_register = $this->input->post('submit_register');
        if($submit_register)
        {
            $this->do_register($data);
        }
		
		$this->load->view("user_form", $data);
	}
	function do_login(&$data)
	{
		$this->template->write("title","Login");
        $data = array();
        $this->load->library('form_validation');
        
        	$this->form_validation->set_rules('email', 'Username', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            
            if($this->form_validation->run()){
	            
            	$email = $this->input->post('email');
	            $password = $this->input->post('password');
	            
	            $check_login = $this->check_login($email,$password);
	            //echo $check_login;
	            if(!$check_login)
	            {
	                $data["error_messenger"] = "<div class='error_messenger'>- Error. Username or password is not correct</div>";
	            }
	            else {
	                $this->lib_url->redirect_flashdata();
	            }	
            }        
	}
    function do_register(&$data)
    {
        $this->load->library('form_validation');
        
        $data = array();
        $this->form_validation->set_rules('full_name', 'Họ tên', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Mật khẩu', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('re_password', 'Xác nhận mật khẩu', 'trim|matches[password]');
        if($this->form_validation->run())
        {
            $this->User_model->do_register($data);
        }
    }
    
    function forgot(){
    	
        $this->config->set_item("active_menu", "user");
        $this->config->set_item("body_layout" , "body");
    	$this->load->library('form_validation');
    	$this->template->write('title',__("Forgot password"), true);
        
       if($this->lib_auth->is_logged())
       $this->lib_url->redirect_flashdata();
        
       $data = array();
       $submit_forgot = $this->input->post('submit_forgot');
        if($submit_forgot)
        {
        	$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        	if($this->form_validation->run())
            {
                $this->User_model->do_forgot($data);
            }
        }
        
        $this->load->view("forgot", $data);
    }
    
    function resetpss(){
        $this->config->set_item("body_layout" , "body");
        $this->load->library('form_validation');
        $this->template->write('title',__("Reset your password"), true);
        
       if($this->lib_auth->is_logged())
       $this->lib_url->redirect_flashdata();
       
       if(!$this->User_model->check_forgot_code()){
       redirect('/');
       return '';
       }
              
       $data = array();
       $submit_reset_password = $this->input->post('submit_reset_password');
       
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('re_password', 'Re-password', 'trim|required|matches[password]');
       
        if($submit_reset_password)
        {
            if($this->form_validation->run())
            {
                $this->User_model->do_reset_password($data);
            }
           
        }
    
        $this->load->view("reset_password", $data);
    }
    
    function facebook_login()
    { 
        if($this->lib_url->host() == 'http://localhost') return;
        $this->load->library('facebook');
        
        $facebook = new Facebook();
        
        //$facebook->setAccessToken(@$initMe["accessToken"]); 
        $user = @$this->facebook->getUser();
        //print_r ($user);

        if ($user) {
    
            $user_profile = @$facebook->api('/me');
    	
    	    $email = @$user_profile['email'];
    	
            $sex = $user_profile['gender'];($sex=="male")?$sex="Nữ":$sex="Nam";
    		$ngay_sinh=@split("/",$user_profile['birthday']); 
    		
    		$user_profile['picture']="https://graph.facebook.com/".$user. "/picture?type=large";
    		
    		$data=array(
    		"full_name" => $user_profile['name']
    		,"sex" => $sex
    		,"birthday" => $ngay_sinh[1]."-".$ngay_sinh[0]."-".$ngay_sinh[2]
    		,"email" => $user_profile['email']
    		,"images" => $user_profile['picture']
            ,"utm_source" => 'facebook'
            
    		); 
            $facebook->destroySession();   		
            $this->User_model->update_login_social($data);
    	}
        else {
    	   $login_facebook_url = @$facebook->getLoginUrl( array('scope' => 'email,read_stream,user_birthday' ));
    	   $this->session->set_userdata(array('login_facebook_url' => $login_facebook_url) );
        }
    
    }
    function google_login()
    {
        if($this->lib_url->host() == 'http://localhost') return;
        require_once ("application/libraries/LightOpenID.php");
        //$this->load->library('LightOpenID');
        $openid = new LightOpenID($this->lib_url->host().base_url('user/login')); 
        if ($openid->mode) { 
            
            if ($openid->mode == 'cancel') {
                //echo "User has canceled authentication !";
            }
        	else{
        	
                $data = $openid->getAttributes();
                $email = $data['contact/email'];
                $first = $data['namePerson/first'];
                $last = $data['namePerson/last'];
        		
                $data=array(
        			"full_name" => $first." ".$last
        			,"email" => $email
        			,"images" => ''
                    ,"utm_source" => 'google'
                    
        		);
         	$this->User_model->update_login_social($data); return;
            } 
        } else {
           // echo "Go to index page to log in.";
        }
        $openid->identity = 'https://www.google.com/accounts/o8/id';
        $openid->required = array(
        	'namePerson/first',
        	'namePerson/last',
        	'contact/email',
        	'namePerson/friendly',
            'contact/email',
            'namePerson',
            'birthDate',
            'person/gender',
            'contact/postalCode/home',
            'contact/country/home',
            'pref/language',
            'pref/timezone'
        ); 
        $openid->returnUrl = $this->lib_url->host().base_url('user/login'); //echo $openid->authUrl(); exit;
        $this->session->set_userdata(array('login_google_url' => $openid->authUrl() ) ); 
    }
    function ajax_block_login_small()
    {
        if($this->lib_auth->check_permission() ) return;
        $this->facebook_login();
        $this->google_login();
        $this->load->view('ajax/block_login_small');
    }
    function block_user_login_small()
    {
        $this->load->view('block_user_login_small');
    }
}
 
