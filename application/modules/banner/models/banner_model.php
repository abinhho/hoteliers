<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Banner_model extends CI_Model{
	var  $banner_data = array();
	public function __construct(){
        parent::__construct();
        $this->load->database();
              
    }
    public function index(){
    	return $this->db->get('mod_banner')->row_array();
    }
}