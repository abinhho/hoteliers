<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends MX_Controller {
	var $img_folder = "";
	public function __construct(){
       	parent::__construct();
       	$this->load->Model('Cart_model');
       	$this->img_folder = base_url().'media/'.$this->router->fetch_module();
        $this->config->set_item("body_layout" , "body");
        $this->load->helper('myform');
        $this->load->library('lib_form');
        $this->cart->product_name_rules = '\d\D';
	}
	public function index($viewid = "")
	{ 
		echo "index_order";
	}
	
    public function add2cart()
    {
        $data =  array('type' => 'add2cart');
        
        $id = $this->input->post('id');
        $qty = $this->input->post('qty');    
        $cart = $this->cart->contents();
        $exists = false;            
        $rowid = '';

        foreach($cart as $item){
            if($item['id'] == $id)  
            {
                $exists = true;
                $rowid = $item['rowid'];
                $qty = $item['qty'] + $qty;
            }       
        }

        if($exists)
        {
            $this->cart->update(
                array('rowid' => $rowid, 'qty' => $qty)
            );                   
                      
        }
        else
        {
                $data_cart = array(
                'id' => $id
                ,'name' => $this->input->post('name')
                ,'qty' => $qty
                ,'price' => $this->input->post('price')
                ,'options' => array('option' => $this->input->post('options') )
                ,'images' => $this->input->post('images')
                ,'url' => $this->input->post('url')
                );
                
                $this->cart->insert($data_cart);
        }   
        
        
        
        $data['total'] = $this->cart->total_items();
        
        $this->load->view("ajax_cart",$data);
    }
    
    public function view(){
	   
	   $data = array();
	   $submit_update_cart = $this->input->post('submit_update_cart');
       
       $submit_payment = $this->input->post('submit_payment');
       
        if($submit_update_cart)
        {
            $i = 1;
            foreach ($this->cart->contents() as $items)
            {
                $data = $this->input->post('c'.$i);
                $this->cart->update($data);
                $i++;
            }
        }
        else
        if($submit_payment)
        {
            $this->load->library('form_validation');
        
	        $data = array();
	        $this->form_validation->set_rules('payment[full_name]', 'Họ tên', 'trim|required');
	        $this->form_validation->set_rules('payment[email]', 'Email', 'trim|required|valid_email');
	        $this->form_validation->set_rules('payment[phone]', 'Điện thoại', 'trim|required');
	        $this->form_validation->set_rules('payment[address]', 'Địa chỉ', 'trim|required');
	        $this->form_validation->set_rules('payment[payment_method]', '', 'trim');
            $this->form_validation->set_rules('payment[noi_dung]', '', 'trim');
	        
	        if($this->form_validation->run())
	        {
	            $this->Cart_model->do_payment($data);
	        }
        }
        
        
	   
		$this->load->view("view_cart", $data);
	}
    
    public function del($rowid){
	   $this->cart->update(array(
       'rowid' => $rowid
       ,'qty' => 0
       ));
	   $this->lib_url->redirect_to_back();
	}
    
	public function order(){
	   
	   $data = array();
	   $submit = $this->input->post('submit');
        if($submit)
        {
            $this->load->library('form_validation');
        
	        $data = array();
	        $this->form_validation->set_rules('order[full_name]', 'Họ tên', 'trim|required');
	        $this->form_validation->set_rules('order[email]', 'Email', 'trim|required|valid_email');
	        $this->form_validation->set_rules('order[phone]', 'Điện thoại', 'trim|required');
	        $this->form_validation->set_rules('order[address]', 'Địa chỉ', 'trim');
	        $this->form_validation->set_rules('order[bank]', 'Ngân hàng', 'trim');
	        
	        if($this->form_validation->run())
	        {
	            $this->Cart_model->do_order($data);
	        }
        }
	   
		$this->load->view("user_form", $data);
	}
   
}
 
