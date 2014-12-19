<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Lib_menu{
	public $CI;
	public $sitemap = array();
	var $level;
	private $arr_children = array();
	public function __construct(){
        //echo "TB_asset_a";
        $this->CI = & get_instance();
        $this->CI->load->library('lib_alias');
   	}
   	
	function has_children($rows , $id) {
	  foreach ($rows as $row) {
		if ($row['parent_id'] == $id)
		  return 1;
	  }
	  return 0;
	}
	
	function before_fid($rows,$curr_fid)
	{
			foreach ($rows as $row)
			{
				if($curr_fid == $row['FID'])
				{// echo "@";
					$parent_id=$row['parent_id'];
					break;
				}
			} //echo $parent_id."-";
			if($parent_id !="")
			{
				foreach ($rows as $row)
				{
					if($parent_id == $row['ID'])
					return $row['FID'];
				}
			}
			return -1;
	}
	function check_active($rows,$FID)
	{
		if(isset($_GET['module']))
		{ 
			if($FID!="" && $FID == CATID)
			return true;
			else
			{
				$x=CATID;
				// echo $this->before_fid($rows,$x);
				$bf=$this->before_fid($rows,$x);
				while($bf !=-1)
				{
					if($bf == $FID)
					return true;
					$x=$bf;
					$bf=$this->before_fid($rows,$x);
				}
			}
			return false;
		}
	}
	
	
	function get_level($rows,$id) {
		
		foreach ($rows as $row) 
		{
			if ($row['ID'] == $id && $id !="" && $row['parent_id'] != "")
			{
				$this->level++;
				$this->get_level($rows,$row['parent_id']); 
			}
		}
		return $this->level;
	}
	function get_thut_vo($rows,$id, $start = 0, $selectbox = true)
	{
		$thut_vo="";
		$this->level = $start;
		$n = $this->get_level($rows,$id);
		for($i=1;$i< $n ;$i++)
		{
			if($selectbox)
			$thut_vo.= "&nbsp;&nbsp;&nbsp;&nbsp;";
			else
			{
				if($i!=$n-1)
				$thut_vo.="<i></i>";
				else
				$thut_vo.="<i class='end_i'></i>";
			}
			
		}
		if($selectbox){
			if($thut_vo!="") $thut_vo.="|-->";
		}
		return $thut_vo;
	}
	
	public function list_catid_children($id, $n = 0)
	{
		if($n == 0)
		$this->arr_children = array();
		
		if(count($this->sitemap) <= 0 )
		{
			$this->get_all_sitemap();
		}
		$result=array();
		
		foreach ($this->sitemap as $row){
			
			$temp=@split(",",$row['parent_id']);
			if ($temp[0] == $id && $row['active']==1){
				
				$this->arr_children[]=$row['ID'];
				if($this->has_children($this->sitemap, $row['ID']))
				$this->list_catid_children($row['ID'], $n = 1);
			}
		 }
		 
		 if($id!="")
		 $this->arr_children[]=$id;
		 
		 $r = $this->arr_children;
		 
		 return $r;
	}
	function build_site_map_back_end($parent = '')
	{
		$r = "";
		foreach ($this->sitemap as $row)
		{
			
			/*$active_mod=1;
			if($row['parent_id']=='' && $TB_user->get('token_admin')!=1)
			$active_mod = $DB->get_data_row('tb_modules','active',array('module'=>$row['module_alias']));*/
			
			if ($row['parent_id'] == $parent){
				$folder = ($this->has_children($this->sitemap, $row['ID'])) ? "class='parent'" : '';
			
				$active_text = ($row['active'] == 0) ? "<span class='red rfloat'>(non active)</span>" : "";
							
				$thut_vo = $this->get_thut_vo($this->sitemap, $row['ID'], 1 ,false);
				
				$this->level=0;
				
				$class_level= "class= 'level_".$this->get_level($this->sitemap,$row['ID'])."'";
				
				$mod = ($row['module_alias']=="") ? "" : " - (<span class='red'>{$row['module_alias']}</span>)";
				
				$click_edit="return open_promt({title:'Chỉnh sửa menu',url:'".base_url('sitemap/backend_sitemap/edit/edit/'.$row['ID'])."'})";
				$add_new="return open_promt({title:'Thêm danh mục',url:'".base_url('sitemap/backend_sitemap/edit/add/'.$row['ID'])."'})";
				$link_del=base_url('sitemap/backend_sitemap/del/'.$row['ID']);
				
				$r .= "<tr {$class_level} ><td {$folder} >{$thut_vo}<span>{$row['tieu_de']}</span>{$mod} {$active_text}</td>";
				$r .= "<td align='right'><div class='user_action'>";
				
				$r .= "<a onclick=\"{$add_new}\" class='new'>Thêm menu con</a> - ";
				$r .= "<a onclick=\"{$click_edit}\" class='edit'>Sửa</a> - 
				<a href='{$link_del}' class='del' target='temp_frame'>Xóa</a>
				</div></td>";
				
				$r .= "</td></tr>";
				if ($folder == "class='parent'")
				$r .= $this->build_site_map_back_end($row['ID']);
			}
	  }
	  return $r;
	}
	
	
	function op_admin($ops){
		
		$_GET_op = isset($_GET['op']) ? $_GET['op'] : '';
		$r = "<ul>";
		$i=0;
		foreach ($ops as $key => $val)
		{
			if($_GET_op=="")
			{
				$active = ($i==0)?"class='active'":'';
			}
			else{ 
				$active = ($_GET_op==$key) ? "class='active'":'';
			}
			
			$url = $this->CI->lib_url->replace_all_ext("","module,op");
			
			$r .= "<li {$active}><a href='".$this->CI->lib_url->change_url($url, array('op'=>$key))."'>{$val}</a></li>";
			$i++;
		}
		$r .= "</ul>";
		return $r;
	}
	
	function radio_select_menu($rows , $exist , $parent='')
	{
		$result = "<ul>";
		foreach ($rows as $row)
		{ 
			if ($row['parent_id'] == $parent){
				
				$folder= ($this->has_children($rows,$row['ID'])) ? "class='parent'" : "class='children'"; 
								
				$disabled = ( in_array($row['ID'], $exist) ) ? "disabled" : '' ; 
								
			  	$result.= "<li {$folder}><input type='radio' {$disabled} value='{$row['ID']}' name='menu'/><label>{$row['tieu_de']}</label>";
			  	if ($folder == "class='parent'")
				$result.= $this->radio_select_menu($rows , $exist , $row['ID']);
			 	
				$result.= "</li>";
			}
	  }
	  $result.= "</ul>";

	  return $result;
	}
	
	
	function make_link($alias, $attr_view = array())
	{
		$t1 = "";
		
		foreach($attr_view as $id => $tieu_de)
		{
			$t1 = "/".$this->CI->lib_alias->convert2Alias($tieu_de)."-".$id;
		}
		$t = "";
		foreach($alias as $id => $tieu_de)
        {
        	$id = preg_split("/,/", $id); $id = $id[0];
        	
        	if(is_numeric($id)){ 
        	    $tieu_de = ($tieu_de == "") ? $this->tieu_de_by_id($id) : $tieu_de;
                $t = $id."/".$this->CI->lib_alias->convert2Alias($tieu_de);
        	}
        	else $t = $id; 
        }
        
		
		$ext = ($this->CI->session->userdata('lang') == "") ? ".html" : ".".$this->CI->session->userdata('lang');
        return base_url($t.$t1.$ext); 
	}
	
	function tieu_de_by_id($catid)
	{
	   if(count($this->sitemap) <= 0 )
       {
            $this->get_all_sitemap();
       }
        foreach ($this->sitemap as $row){
            if ($row['ID'] == $catid)
            { 
               return $row['tieu_de'];             	
            }
        }
	}
	
	public function get_all_sitemap(){
		
        if(count($this->sitemap) > 0 ) return $this->sitemap;
        
		$this->CI->db->select("*");
		$this->sitemap = $this->CI->db->get('mod_sitemap') -> result_array();
		
	}
	
	function module_by_catid($catid)
	{
	   $r = "";
	   if(count($this->sitemap) <= 0 )
       {
            $this->get_all_sitemap();
       }
       
       if(!is_numeric($catid) || empty($catid)) return $catid;
       
	   foreach ($this->sitemap as $row){
            if ($row['ID'] == $catid)
            { 
                if($row['parent_id'] == "")
                {
                    $r = $row['module_alias']; return $r;
                }
                else
                return $this->module_by_catid($row['parent_id']);
                
            }
         }
	}
	
	function meta_by_catid($catid)
	{
	
		$lang = $this->CI->session->userdata('lang');
	
		
		$r = $this->CI->lib_db->get_join_lang("mod_menu", array("mod_menu.FID" => $catid) ,$lang , $select_a = "ID" , $select_b = "tieu_de,description")
		->row_array();
		
		return array(
		"title" => @$r['tieu_de']
		,"description" =>@$r['description']
		);
		
	}
	
	function form_dropdown_menu_by_id_temp($parent = "")
	{

		if(count($this->sitemap) <=0 )
		$this->get_all_sitemap();
		
		$result = "";
		
		foreach ($this->sitemap as $row)
	  	{
			if ($row['parent_id'] == $parent && $row['active']==1){
		
				$thut_vo = $this->get_thut_vo($this->sitemap, $row['ID'], 0 , true);
				
				$selected = ($row['ID'] == $this->CI->lib_url->_GET('catid')) ? "selected" : '' ;
				
				$result .= "<option value='{$row['ID']}' {$selected}>{$thut_vo}{$row['tieu_de']}</option>";
				$result .= $this->form_dropdown_menu_by_id_temp($row['ID']);
			}
		}
		return $result;
	}
    function cata_show_in_home()
    {
        $r = array();
        if(count($this->sitemap) <=0 )
		$this->get_all_sitemap();
        foreach ($this->sitemap as $row)
	  	{
			if ($row['home_display'] ==1 ){
		          $r[] = $row;
			}
		}
        return $r;
    }
	function form_dropdown_menu_by_id($id)
	{
		$r = "";
		$r .= "<select name='catid'>";
		$r .= "<option value='{$id}'>---</option>";
		$r .= $this->form_dropdown_menu_by_id_temp($id);
		$r .= "</select>";
		
		return $r;
	}
	
	function menu_check_box_mod_temp($parent = "" , $selected = "", $start_level = 0)
	{
	  	if(count($this->sitemap) <=0 )
		$this->get_all_sitemap();
		
		$result = "";
		
		$list_selected = preg_split("/,/",$selected);
		
	  	foreach ($this->sitemap as $row)
	  	{

			if ( $row['parent_id'] == $parent && $row['active'] == 1){
		
				$bold = ($this->has_children($this->sitemap,$row['ID'])) ? "class='bold'" : $bold="";
				
				$checked=""; $li_checked ="";
				if(in_array($row['ID'],$list_selected)){
					$checked = TRUE;
					$li_checked="class='checked'";
				}
				
				$thut_vo = $this->get_thut_vo($this->sitemap , $row['ID'],$start_level,false);
				
				$result .= "<tr><td {$li_checked}>{$thut_vo}";
				$result .= form_checkbox('catid[]' , $row['ID'] , set_checkbox('catid', $row['ID'] , $checked) , "id= 'id{$row['ID']}'");
			
				$result .= "<label {$bold} for='id{$row['ID']}' >{$row['tieu_de']}</label></td></tr>";
				$result .=  $this->menu_check_box_mod_temp($row['ID'], $selected , $start_level);
		}
	  }
	  return $result;
	}
	
	
	function menu_check_box_mod($module ,$selected="", $start_level)
	{ 
		$module_id = ($module != "") ? $this->module_id($module) : '';
		return $this->menu_check_box_mod_temp($module_id , $selected , $start_level);
	}
	
	public function module_id($module){
		
		$this->CI->db->select("ID");
		$t = $this->CI->db->where(array(
		"module_alias" => $module
		,"parent_id" => ""
		))->get('mod_sitemap')->row_array();
		
		return (isset($t['ID']) )  ? $t['ID'] : '';
	}
	
}