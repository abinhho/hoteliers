<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Backend_com_db_backup_model extends CI_Model{
	
	
	public function __construct(){
        parent::__construct();
        
        $this->load->library('lib_upload');
        $this->load->library('lib_input');
    }
    public function index(){
    	
    }
  
}