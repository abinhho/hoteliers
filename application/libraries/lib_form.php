<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Lib_form{
	var $CI;
	var $site_lang;
	var $input_tr_inline = false;
	public function __construct(){
		$this->CI = &get_instance();
		$this->site_lang = $this->CI->config->item('site_lang');
		$this->CI->load->helper('myform');
	}
	public function change_lang_field($id){
		$r = "<div class='admin_form_lang'>";
		$i = 0;
		foreach ($this->site_lang as $lang => $text)
		{
			$active = ($i == 0) ? "active" : '';
			$name = ($lang != "") ? $lang."_".$id : $id;
			$r .= "<img title = '{$text}' diff = '{$name}' same = '{$id}' class='{$id} {$active}' src = '".base_url()."assets/images/bg/".$lang."_lang_flag.png'>";
			$i++;
		}
		return $r . "</div>";
	}
	public function form_input_tr($name, $value = "", $attr = "", $label = ""){
		$r="";
		$r .= "<tr><td><label class='label_1'>{$label}</label></td>";
		$r .= ($this->input_tr_inline) ? '' : "</tr><tr>";
		$r .= "<td>".form_input($name,$value,$attr)."</td></tr>";
		return $r;
	}
	
    public function form_input_td($name, $value = "", $attr = "", $label = ""){
        $r="";
        $r .= "<td><label class='label_1'>{$label}</label>";
        $r .= form_input($name,$value,$attr)."</td>";
        return $r;
    }
	
	public function form_password_tr($name, $value = "", $attr = "", $label = ""){
		$r="";
		$r .= "<tr><td><label class='label_1'>{$label}</label></td>";
		$r .= ($this->input_tr_inline) ? '' : "</tr><tr>";
		$r .= "<td>".form_password($name,$value,$attr)."</td></tr>";
		return $r;
	}
	public function form_textarea_tr($name, $value = "", $attr = "", $label = ""){
		$r="";
		$r .= "<tr><td><label class='label_1'>{$label}</label></td>";
		$r .= ($this->input_tr_inline) ? '' : "</tr><tr>";
		$r .= "<td>".form_textarea($name,$value,$attr)."</td></tr>";
		return $r;
	}
	
	public function form_tr_lang($type, $id , $attr ="" , $label = ""){
		$r="";
		$r .= "<tr><td><label class='label_1 lfloat'>{$label}</label>
		".$this->change_lang_field($id)."
		</td></tr><tr><td>";
		
		$i=0;
		foreach($this->site_lang as $lang => $text)
		{
			$hidden = ($i != 0) ? "style = 'display:none'" : '';
			$name = ($lang != "") ? $lang."_".$id : $id;
			//$value = @$this->CI->load->_ci_cached_vars[$name]; 
			
			$value = (isset($_POST[$name])) ? $_POST[$name] : @$this->CI->load->_ci_cached_vars[$name]; 
			
			if($type == "textarea")
			$r .= "<div {$hidden} diff='{$name}' class='{$id}'>".form_textarea($name, set_value($name, $value), $attr )."</div>";
			
			elseif ($type == "input")
			$r .= "<div {$hidden} diff='{$name}' class='{$id}'>".form_input($name, set_value($name, $value), $attr )."</div>";
			
			elseif ($type == "ckeditor")
			$r .= "<div {$hidden} diff='{$name}' class='{$id}'>".form_ckeditor($name )."</div>";
			
			$i++;
		}
		return $r."</td></tr>";
	}
	public function form_dropdown_tr($name, $options = array() , $selected = "", $attr = "" , $label = ""){
		
		$selected = (isset($_POST[$name])) ? $_POST[$name] : $selected;
		$r="";
		$r .= "<tr><td><label class='label_1'>{$label}</label></td>";
		$r .= ($this->input_tr_inline) ? '' : "</tr><tr>";
		$r .= "<td>".form_dropdown($name, $options, $selected, $attr)."</td></tr>";
		return $r;
	}
    public function form_dropdown($name, $options = array() , $selected = "", $attr = "" ){
		
		$selected = (isset($_POST[$name])) ? $_POST[$name] : $selected;
		$r="";
		$r .= form_dropdown($name, $options, $selected, $attr);
		return $r;
	}
	public function multi_radio($name,$checked_val,$arrs)
	{
		foreach($arrs as $val =>$text)
		{
			$checked = ($checked_val==$val) ? "checked" : '';
			echo "<input type='radio' {$checked} value='{$val}' name='{$name}'/><label class='label_checkbox mg_right_10'>{$text}</label>";
		}
	}
	public function form_dropdown_num($name, $value, $selected = "", $more = "")
	{
		$arr = preg_split('/\,/', $value);
		$temp = array();
		if($arr[0] < $arr[1]){
			for ($i = $arr[0]; $i <= $arr[1] ; $i++)
			$temp[$i] = $i;
		}
		else{
			for ($i = $arr[0]; $i >= $arr[1] ; $i--)
			$temp[$i] = $i;
		} 
		
		$selected = (isset($_POST[$name])) ? $_POST[$name] : $selected;
		return form_dropdown($name, $temp, set_value($name, $selected ) , $more );
	}
	public function birthday($param){
		
		$r = "";
		
		$arr = preg_split('/-/', $param);
		
		$r .= $this->form_dropdown_num('date', "1,31"  , @$arr[2])." / ";
		$r .= $this->form_dropdown_num('month', "1,12"  , @$arr[1])." / ";
		$r .= $this->form_dropdown_num('year', "2013,1920"  , @$arr[0]);
		return $r;
		
	}
}