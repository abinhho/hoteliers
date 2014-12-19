<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class MY_Form_validation extends CI_Form_validation {
 
	protected $CI;
 	function __construct($rules = array('fraction'))
	{
		parent::__construct($rules);
 		$this->CI =& get_instance(); 
	}
	
}