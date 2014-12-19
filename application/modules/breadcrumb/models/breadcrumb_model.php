<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Breadcrumb_model extends CI_Model{
	
	private $db_table = "mod_breadcrumb";
	public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->mod_name = $this->router->fetch_module(); 
    }
    public function index(){
    	
    }
    public function block_breadcrumb(){
        
    	$data = array();
        $this->db->select("*");
        return $this->db->get($this->db_table)->row_array();
    }
    function get_items()
    {
        $data = array();
        $this->db->select("*");
        return $this->db->get('mod_sitemap')->result_array();
    }
    
}