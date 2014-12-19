<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Lib_input{
	var $CI;
	public function __construct(){
		$this->CI = &get_instance();
	}
	public function post_all_lang($lang, $list){
		$data = array();
		$arrs = preg_split('/,/', $list);
		
		$lang = ($lang == "") ? '' : $lang."_";
		
		foreach($arrs as $name){
			
			$data[$name] = $this->CI->input->post($lang.$name);
		}
		return $data;
	}
	public function post_date_picker($name)
	{
		$date = $this->CI->input->post($name);
		$hour = $this->CI->input->post($name."_hour");
		$min = $this->CI->input->post($name."_min");
		$second = $this->CI->input->post($name."_second");
		
		
		$temp = preg_split('/\//',$date);
		
		return $temp[2]."-".$temp[1]."-".$temp[0]." ".$hour.":".$min.":".$second;
	}
}