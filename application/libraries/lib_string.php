<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Lib_string{
	var $CI;
	public function __construct(){
		$this->CI = &get_instance();
	}
	public function push_coma($root, $new, $coma = "," ){
		if($new != ""){
			
			$root = $root.$coma.$new;
			if($coma==substr($root ,0 , strlen($coma)))
				$root=substr($root , strlen($coma));
		}
		return $root;
		
	}
	function random_string($length = 10) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, strlen($characters) - 1)];
	    }
	    return $randomString;
	}
}