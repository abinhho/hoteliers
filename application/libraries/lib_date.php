<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Lib_date{
	var $CI;
	public function __construct(){
		$this->CI = &get_instance();
		date_default_timezone_set('Asia/Ho_Chi_Minh');
	}
	
	public function get($opt="Y-m-d H:i:s")
	{
		$opt=str_replace("h","H",$opt);
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		return gmdate($opt, time() + 3600*(@$timezone+date("+7")));
	}
	
	function sub($time)
	{
		return date ( 'Y-m-d H:i:s' ,strtotime ( $time , strtotime ( $this->get() ) ) );
		
	}
	
	function ago ($time)
	{	
		if(strpos($time , "-") !== false)
		$time = strtotime($this->get()) - strtotime($time);
		else
		$time = strtotime($this->get()) - $time;
		
		$tokens = array (
			31536000 => 'năm',
			2592000 => 'tháng',
			604800 => 'tuần',
			86400 => 'ngày',
			3600 => 'giờ',
			60 => 'phút',
			1 => 'giây'
		);
		foreach ($tokens as $unit => $text) {
			if ($time < $unit) continue;
			$numberOfUnits = floor($time / $unit);
			$r= $numberOfUnits.' '.$text. " trước";
			break;
		}
		if(!isset($r))
		$r = "1 giây trước";
		return $r;
	}
	
	function form_date_picker ($name, $curr , $default = false)
	{
		$r = "";
		
		$zero_date = "0000-00-00 00:00:00";
		
		$curr = ($curr == "") ? $zero_date : $curr;
		
		if($curr == $zero_date && $default ==true)
		$curr = $this->get();
		
		$curr = preg_split("/\-|\:| /",$curr);
		//$date_curr = $curr[2]."/".$curr[1]."/".$curr[0];
		
		$date_curr = (isset($_POST[$name])) ? $_POST[$name] : $curr[2]."/".$curr[1]."/".$curr[0];
		
		$r .= "<div class='bound_datepicker'>";
		
		$r .= "<input type='text' name='{$name}' class='input_fill_datepicker' value='{$date_curr}'/>";
		
		$r .= $this->CI->lib_form->form_dropdown_num($name."_hour", '0,24' , $curr[3] , $more = "")." : ";
		$r .= $this->CI->lib_form->form_dropdown_num($name."_min", '0,60' , $curr[4] , $more = "");
		
		$r .= "<input type='hidden' name='{$name}_second' value='00'>";
		$r .= "</div>";
		return $r;
	}
	public function time2date($time, $format = "Y-m-d H:i:s")
	{
		return date ($format, $time);
	}
	
}