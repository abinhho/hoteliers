<?php

if ( ! function_exists('get_db_lang'))
{
    function get_db_lang()
    {
        $CI = &get_instance();
        if($CI->session->userdata('lang') != ""  )
        {
            $CI->db->select("");
            $CI->config->set_item('db_lang',  $CI->db->get("com_translate")->result_array());
        }   
    }
}
        
if ( ! function_exists('__'))
{
    function __($text)
    {
        $CI = &get_instance();
        $lang =  $CI->session->userdata('lang');
        if($lang != "")
        {
        	if(count($CI->config->item('db_lang')) == 0 || $CI->config->item('db_lang') == "")
        	get_db_lang();
	    	foreach ($CI->config->item('db_lang') as $ts)
	            {
	                if( mb_strtoupper($ts['vi'],'UTF-8') == mb_strtoupper($text ,'UTF-8')  && $ts[$lang]!="")
	                {
	                    $r= $ts[$lang];
	                    break;
	                }
	                $r=$text;
	            }
	            /*print_r ($CI->config->item('db_lang'));*/
	            return $r;
        }
        return $text;
    }
}


if ( ! function_exists('frontend_select_lang'))
{
    function frontend_select_lang()
    {
        $CI = &get_instance();
        $list_lang = $CI->config->item('site_lang');
        
		$r = "<div class='select_language'>";
		foreach($list_lang as $key => $value)
        {
            $key = ($key == '') ? 'vi' : $key;
            $r .= "<a href = '".$CI->lib_url->change_url('', array('lang' => $key ))."' title = '{$value}' class='$key'></a>";    
        }
		
		
		$r .= "</div>";
		return $r; 
    }
}
 
