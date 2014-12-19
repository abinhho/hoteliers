<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Lib_convert{
	
	var $CI;
	public function __construct(){
		$this->CI = &get_instance();
		
	}
	
	function replace_special_to_null($str)
		{
			$arr=array("!","@","#","$","%","^","&","(",")","{","}","[","]","'","/",">","<",",","?","|","\\",":",";","-","+","\"");
			return str_replace($arr,array(""),$str);
		}
	function create_keysearch($str)
	{
		$temp = $this->replace_special_to_null($str);
		return str_replace(" ","+",$str);
	}
	function formatBytes($size, $precision = 2)
	{
		$base = log($size) / log(1024);
		$suffixes = array(' Bytes', ' KB', ' MB', ' GB', ' TB');   
		return round(pow(1024, $base - floor($base)), $precision) . $suffixes[floor($base)];
	}
}