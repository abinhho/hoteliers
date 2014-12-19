<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ad_images_model extends CI_Model{
	
	private $db_table = "mod_ad_images";
	public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->mod_name = $this->router->fetch_module(); 
    }
    public function index(){
    	
    }
  
    public function get_data($pos, $n = 1){
        
        $this->db->select('*');
        $this->db->limit($n,0);
        
        if($n == 1 ) $this->db->order_by("rand()");
        
        return $this->db->where('position', $pos)->get($this->db_table)->result_array();
        
    }
    
}