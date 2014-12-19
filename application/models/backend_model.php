<?php
class Backend_model extends CI_Model{
	public function __construct(){
        parent::__construct();
        $this->load->database();
    }
	public function active_mods(){
		$this->db->where(array('active'=>'1'));
		return $this->db->get('com_modules')->result_array();
    }
}