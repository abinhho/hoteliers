<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ext_csv extends MX_Controller {
	
	var $_GET_id;
	public $title = "Quản lý người dùng";
	public function __construct(){
       	parent::__construct();
      	$this->load->Model('Ext_csv_model');
      	$this->load->helper('csv');
	}
	public function index($db_table = "", $select = "*")
	{
		if($db_table == "") return;  
		$data = array();
		$data = $this->Ext_csv_model->get_data($db_table, $select);
		echo query_to_csv($data, true, $db_table. ".csv");
		//$this->load->view("backend_export_csv",$data);
	}
	
	public function lang($db_table = "", $select = "ID"){

		if($db_table == "") return;  
		
		$select = str_replace("-" , "," , $select);
		$data = array();
		$data = $this->Ext_csv_model->data_lang($db_table, $select);
		echo query_to_csv($data, true, $db_table. ".csv");
		//$this->load->view("backend_export_csv",$data);
		
	}

}
 
