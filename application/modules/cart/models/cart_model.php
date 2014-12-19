<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Cart_model extends CI_Model{
	var $mod_name =''; 
	private $db_table = "mod_cart";
	public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->mod_name = $this->router->fetch_module(); 
    }
    public function index(){
    	
    }
  
    public function do_payment(){
        
        if(count($this->cart->contents()) == 0) return;
        
        $db_data = $this->input->post('payment');
        $db_data['total_qty'] = $this->cart->total_items();
        $db_data['total_price'] = $this->cart->total();
        
        
        $this->db->insert($this->db_table.'_customer_info' , $db_data);
        
        $FID = $this->db->insert_id();
        
        foreach($this->cart->contents() as $items) :
        
            $data_cart['name'] = $items['name'];
            $data_cart['qty'] = $items['qty'];
            $data_cart['price'] = $items['price'];
            $data_cart['subtotal'] = $items['subtotal'];
            $data_cart['images'] = $items['images'];            
            $data_cart['FID'] = $FID;
            $data_cart['url'] = $items['url'];
            
            $data_cart['options'] = '';
            if ($this->cart->has_options($items['rowid']) == TRUE):
					foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value):  

						$data_cart['options'] .= $option_name . ' : ' . $option_value;

					endforeach;
            endif;
        
            $this->db->insert($this->db_table , $data_cart);
        endforeach;
		$this->cart->destroy();
        $this->lib_url->reload("Đặt hàng của quý khách đã được ghi nhận. Chúng tôi sẽ liên hệ lại ngay sau khi xác nhận các thông tin.");
    }
    
}