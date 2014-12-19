<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Emails_model extends CI_Model{
	var $mod_name =''; 
	private $db_table = "mod_emails";
	public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->mod_name = $this->router->fetch_module(); 
    }
    public function index(){
    	
    }
  
    public function do_email(&$data){
        
        $email = $this->input->post('email');
        
        $this->db->select('*');
        $this->db->limit(1,0);
        $query = $this->db->where('email', $email)->get($this->db_table);
        if($query->num_rows() > 0){
        	$data["error_messenger"] = "Lỗi. Email đã tồn tại";
        }
        else 
        {
        	$this->db->insert($this->db_table, array("email" => $email));
        	$data["error_messenger"] = "Cám ơn bạn, email của bạn đã được cập nhật vào hệ thống, các thông tin khuyến mãi sẽ được gửi đến bạn...";
        }
        
    }
    
    function get_config()
    {
    	$config = $this->db->get('com_configs_email')->row_array();
        /*$config = array(
                'protocol' => 'smtp',
                'email_host' => 'ssl://smtp.googlemail.com',
                'email_port' => '465',
                'email_username' => 'thanhbinhbk88@gmail.com',
                'email_password' => 'Happyvinhphat88',
                'email_from' => "thanhbinhbk88@gmail.com",
                'email_reply_to' => "thanhbinhbk88@gmail.com"
        );*/
        return $config;
    }
    
}