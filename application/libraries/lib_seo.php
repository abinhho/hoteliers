<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Lib_seo{
	var $CI;
	var $url_tag = 'search-products/';
	public function __construct(){
		$this->CI = &get_instance();
	}	
}