<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backend_op_menu extends MX_Controller{
	var $op_menu = array(
		"show_item" =>"Quản lý chung"
		,"edit" =>"Thêm mới"
		,"templates" =>"Templates"
		,"blocks" =>"Blocks"
		,"system_clean" => "Dọn dẹp hệ thống"
	);
	public function __construct(){
		parent::__construct();
	}
	public function index(){
		return $this->lib_menu->op_admin($this->op_menu);
	}
}