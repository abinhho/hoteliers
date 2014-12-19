<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Lib_comments{
	var $active_mods = array(); 
	var $CI;
	public function __construct(){
        //echo "TB_asset_a";
        $this->CI = &get_instance();
  	}
    public function index(){
    	//echo "Index TB_media";
    }
    function show_star($n, $mod ,$id)   
    {
    	 
        $mod_rate = (!$this->check_rated($mod, $id)) ? "" : $mod_rate = "mod_on";     
    
	    echo "<input type='hidden' name='url_do' value='".base_url('comments/do_rate')."'>";       
	    echo "<input type='hidden' name='mod_rate' value='{$mod}'>";    
	    echo "<input type='hidden' name='id_topic' value='{$id}'>";     
	    echo "<div class='stars {$mod_rate}'>";     
	    for($i=1; $i<=5; $i++)      
	    {           
		    $active = ($i<=$n)? "active" : '';      
		    echo "<span class='each {$active} '></span>";       
	    }
	    echo "</div>";  
    }
    
    function check_rated($mod,$id)  
    {
    	$arrs = $this->CI->session->userdata('rating');
    	$arrs = (is_array($arrs)) ? $arrs : array();
    	
    	if(in_array($mod."_".$id, $arrs ))
    	return false;
    	return true;
    }   
    
    function add2rate($mod,$id) {
        
    	$arrs = $this->CI->session->userdata('rating');
	    if(!@in_array($id,$arrs))       
	    {       
		    $arrs[] = $mod."_".$id;
		    $arrs = $this->CI->session->set_userdata('rating', $arrs);     
	        return true;        
        }   
        else return false;  
    }
}