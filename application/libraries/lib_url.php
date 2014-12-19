<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Lib_url{
	public $curr_url;
    public $getUrl;
    public $getUrl_nohash;
	public $result_url;
	var $CI;
    var $host;
	public $this_module;
	public function __construct(){
		$this->CI = &get_instance();
		
    }
    public function index(){
    	//echo "Index TB_media";
    }
    function host()
    {
        if($this->host != '') return $this->host; 
    	$protocol = @$_SERVER['HTTPS'] == 'on' ? 'https' : 'http';
        $this->host = $protocol.'://'.$_SERVER['HTTP_HOST'];
        return $this->host;
    }
    function full_base_url($str)
    {
        return $this->host().base_url($str);
    }
    function getUrl($nohash = false)
    {
        if($nohash && $this->getUrl_nohash != '') return $this->getUrl_nohash;    
        else if(!$nohash && $this->getUrl != '') return $this->getUrl; 
        
    	$url = $this->host().$_SERVER['REQUEST_URI'];
        $this->getUrl_nohash =  rawurldecode($url);
        $r = preg_split('/#/', $url); 
		$this->getUrl = $r[0];
        
        return ($nohash) ? $this->getUrl_nohash : $this->getUrl;
    }
    
    function get_param_int($url = "")
    {
        $url = ($url == "") ? $this->getUrl() : $url;
        $t = preg_split('/\//', $url);
        $r = array();
        foreach($t as $val)
        {
            if(is_numeric($val)) $r[] = $val;
        }
        return $r;
    }
    
	function valid_url($url)
	{ 
			if(strpos($url," ") !==false || $url == "")
			return false;
			
			$url = parse_url($url);
			if(count($url) <= 2) return false;
			
			
			if($url['scheme'] != "https" && $url['scheme'] != "http")
			return false;
			return true;
	}
   
	function change_url($url,$arr) {
			
			$url = ($url == "") ? $this->getUrl() : $url;
			foreach($arr as $paramName=>$paramValue)
			{
				if($paramValue!="")
				{
					if (preg_match('/[?&#]'.$paramName.'=[^&]*/', $url)) {
					$url = preg_replace('/([?&#]'.$paramName.')=[^&]*/', '$1='.$paramValue, $url) ;
					} else
					{
						$url .= strpos($url, '?') ? '&' : '?';
						$url .= $paramName . '=' . $paramValue;
					}
				}
				else {
					$url = $this->replace_ext($url , $paramName);
				}
			}
		$this->curr_url = $url;
		return $url ;
	}
	public function getExt($url = "")
	{
		
		$url = ($url == "") ? $this->getUrl() : $url;	
		
		$r = preg_split('/\?/', $url);
		return isset($r[1]) ? $r[1] : '';
	}
	public function replace_all_ext($url, $unless = "module")
	{
			$url = ($url == "") ? $this->getUrl() : $url;
			
			$ext = $this->getExt($url);
			$arrs = preg_split("/\&/",$ext);
			$unless = preg_split("/\,/",$unless);
			
			foreach ($arrs as $i => $temp)
			{
				$temp = preg_split("/\=/",$temp); 
				$paramName = $temp[0];
				
				if(!in_array($paramName,$unless))
				$url = $this->replace_ext($url, $paramName);
			}
			return $url;
	}
	public function replace_ext($url, $paramName)
	{
			$url = ($url == "") ? $this->getUrl() : $url;
			$params = preg_split("/\,/",$paramName);
			
			foreach($params as $param)
			$url =  preg_replace('/([?&#]'.$param.')=[^&]*/','', $url) ;
			
			return $url;
	}
	public function _GET($get)
	{
			$url = $this->getUrl();
			$temp= preg_match('/[?&#]'.$get.'=[^&]*/', $url , $match);
			if(count($match)>0)
			return preg_replace('/([?&#]'.$get.')=/', '', $match[0]);
			return '';
	}
	public function change_order_col($col, $text)
		{
			$curr = $this->_GET("sort");
			$order = $this->_GET("order");
			$arr=array();
			if($curr==$col)
			{
				if($order=="" || $order=="DESC")
				$arr=array("order"=> "ASC");
				else
				$arr=array("order"=> "DESC");
			}
			else
			{
				$arr=array("sort"=>$col ,"order"=> "DESC");
			}
			$href= $this->change_url("",$arr);
			if( isset($_GET['module']) )
			return "<a href='{$href}'>{$text}</a>";
			return $text;
	}
	
	
	public function backend_link_action($id, $op, $text)
	{
		$url = $this->replace_all_ext("","module,op"); 
		
		if($this->this_module == "") $this->this_module = $this->CI->router->fetch_module();
		
		$url = $this->change_url($url, array(
		"module" => $this->this_module
		, "op" => $op
		, "id" => $id
		));
		
		return anchor($url,"$text", "class='$op'");
	}
	
	public function backend_link_del($id){
		return $this->backend_link_action($id, "del", "Xóa");
	}
	public function backend_link_edit($id){
		return $this->backend_link_action($id, "edit", "Sửa");
	}
	public function backend_link_copy($id){
		return $this->backend_link_action($id, "copy", "Copy");
	}
	public function backend_link_view_item($text, $id){
		return $this->backend_link_action($id, "view_item", $text);
	}
	
	public function backend_link_edit_promt($module, $id = "" ){
		
		$attr = 'onclick = "return open_promt({title: \'Thêm, sửa '.$module.'\', url:\''.base_url($module.'/backend_'.$module.'/edit_promt/'.$id.'?'.$this->getExt() ).'\'})"';
		$label = ($id == "") ? "Thêm mới" : "Sửa" ;
		
		return anchor("#", $label, $attr);
	}
	public function link_back()
	{
		return @$_SERVER['HTTP_REFERER'];
	}
	
    function redirect_save_flashdata($uri, $html_mess = "")
	{
	   $this->set_flashdata();
       $this->CI->session->set_userdata(array('html_message'=>$html_mess)) ;
       redirect($uri);
	}
    
	function redirect_flashdata($notice = "")
	{
        $this->CI->session->set_userdata(array('notice'=>$notice)) ;
        
		if($this->CI->session->userdata('flashdata') == "")
		redirect('');
		else
		redirect($this->CI->session->userdata('flashdata'));
	}
	
	function set_flashdata(){
		$this->CI->session->set_userdata('flashdata', $this->getUrl());
	}
	
 	public function reload($notice = ''){
    	$this->CI->session->set_userdata(array('notice'=>$notice)) ;
    	redirect($this->getUrl());
    }
    public function get_notice($note_name = 'notice'){
    	$r = $this->CI->session->userdata($note_name);
    	$this->CI->session->unset_userdata($note_name);
    	return $r;
    }
    
    function redirect($url, $msg)
    {
    	if(!empty($msg))
        $this->CI->session->set_userdata(array('notice'=>$msg)) ;
        redirect($url);
    }
    
	public function redirect_to_back($unless = "", $msg = "")
	{
		if(!empty($msg))
		$this->CI->session->set_userdata(array('notice'=>$msg)) ;
		
		$url = $this->link_back();
		if($unless != "")
		{
			$url = $this->replace_all_ext($url, $unless);
		}
		redirect($url);
	}
}