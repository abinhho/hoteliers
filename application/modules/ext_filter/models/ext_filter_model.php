<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ext_filter_model extends CI_Model{

	
	/*var $db_table = "mod_sitemap";*/
	public function __construct(){
        parent::__construct();
        
        $this->load->library('lib_upload');
        $this->load->library('lib_input');
    }
    public function index(){
    	
    }
}