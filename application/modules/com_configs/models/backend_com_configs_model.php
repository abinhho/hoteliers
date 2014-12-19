<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Backend_com_configs_model extends CI_Model{
	var  $banner_data = array();
	
	var $db_table = "com_configs";
	var $db_table_email = "com_configs_email";
	public function __construct(){
        parent::__construct();
        $this->banner_data = $this->db->get('mod_banner')->row_array();
        
        $this->load->library('lib_upload');
        $this->load->library('lib_input');
    }
    public function index(){
    	
    }
    function get_data_general()
    {
    	$data = array();
    	
    	$data = $this->db->get($this->db_table)->row_array();
    	return $data + $this->lib_db->get_all_backend_table_lang($this->db_table);
    }
 	function do_general(&$data)
    {
    	$db_data = array(
    	"body_layout" => $this->input->post('body_layout')
    	,"google_page" => $this->input->post('google_page')
        ,"page_address" => $this->input->post('page_address')
        ,"twitter_page" => $this->input->post('twitter_page')
        ,"youtube_page" => $this->input->post('youtube_page')
        
        ,"phone" => $this->input->post('phone')
        ,"address" => $this->input->post('address')
        ,"email" => $this->input->post('email')
        ,"slogan" => $this->input->post('slogan')
        
    	,"facebook_page" => $this->input->post('facebook_page')
    	,"google_analytics" => $this->input->post('google_analytics', TRUE)
    	);
    	$this->db->update($this->db_table , $db_data);
    	
    	$this->lib_db->update_or_insert_lang($this->db_table
	    	 ,$id = 1 
	    	 ,"name_page,home_title,description,short_description");
        	
    	$this->lib_url->reload("Cập nhật thành công...");
    }
	function get_data_email()
    {
    	return $this->db->get($this->db_table_email)->row_array();
    }
	function do_email(&$data)
    {
    	$db_data = array(
    	"email_type" => $this->input->post('email_type')
    	,"email_host" => $this->input->post('email_host')
    	,"email_port" => $this->input->post('email_port')
    	,"email_ssl" => $this->input->post('email_ssl')
    	,"email_username" => $this->input->post('email_username')
    	,"email_password" => $this->input->post('email_password')
    	,"email_from" => $this->input->post('email_from')
    	,"email_reply_to" => $this->input->post('email_reply_to')
    	,"email_encoding" => $this->input->post('email_encoding')
    	,"email_frequency" => $this->input->post('email_frequency')
    	);
    	
    	
    	$this->db->update($this->db_table_email , $db_data);
    	$this->lib_url->reload("Cập nhật thành công...");
    }
}