<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backend_op_menu extends MX_Controller{
		var $op_menu = array(
		"menu_top" =>"Menu top"
		,"menu_ngang" =>"Menu ngang"
        ,"menu_ngang_01" =>"Menu ngang 01"
		,"menu_doc" =>"Menu dọc"
        ,"menu_footer" =>"Menu footer"
		,"templates" =>"Templates"
		,"blocks" =>"Blocks"
	);
	public function __construct(){
		parent::__construct();
	}
	public function index(){
		return $this->lib_menu->op_admin($this->op_menu);
	}
}