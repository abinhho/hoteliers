<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Orders_model extends CI_Model{
	var $mod_name =''; 
	private $db_table = "mod_orders";
	public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->mod_name = $this->router->fetch_module(); 
    }
    public function index(){
    	
    }
  
    public function do_order(){
        
        $db_data = $this->input->post('order');
        
        $db_data['id_location'] = ($this->input->post('order_quan_huyen')) ? 
        $this->input->post('order_quan_huyen') : $this->input->post('order_tinh_thanh');
        
        $this->db->insert($this->db_table , $db_data);
		
        $this->lib_url->reload("Đặt hàng của quý khách đã được ghi nhận. Chúng tôi sẽ liên hệ lại ngay sau khi xác nhận các thông tin.");
    }
    
}