<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Lib_menu_block{
	public $CI;
	public $sitemap;
	var $level;
	var $db_table = "mod_menu" ;
	public $db_rows = array();
	public function __construct(){
        //echo "TB_asset_a";
        $this->CI = & get_instance();
        $this->CI->load->library('lib_menu');
   	}
	function show_menu($type, $accept_child = true) {
	
		/*$this->CI->db->where('block' , $name);
		$rows = $this->CI->db->get($this->db_table)->result_array();*/
		if($type=='backend')
		{
			return $this->build_menu_back_end($this->db_rows,$parent='', $accept_child);
		}
		if($type=='frontend')
		{
			return $this->build_menu_front_end($this->db_rows,$parent='');
		}
		
	}
	
	function build_menu_back_end($rows , $parent=''   , $accept_child = true)
	{
		$r = "";
		foreach ($rows as $row)
		{
			if ($row['parent_id'] == $parent){
				
				$folder = ($this->CI->lib_menu->has_children($rows,$row['ID'])) ? "class='parent'" : '' ;
				
				$thut_vo = $this->CI->lib_menu->get_thut_vo($rows,$row['ID'], 1,false);
				
				$href = ($row['href']!="") ? "<span style='color:gray'>({$row['href']})</span>" : '';
				
				$this->CI->lib_menu->level=0;
				$class_level= "class= 'level_".$this->CI->lib_menu->get_level($rows,$row['ID'])."'";
				
				$click_edit="return open_promt({title:'Chỉnh sửa menu',url:'".base_url('menu/backend_menu/edit/'.$row['block'].'/edit/'.$row['ID'])."'})";
				$add_new="return open_promt({title:'Thêm danh mục',url:'".base_url('menu/backend_menu/radio_select_menu/'.$row['block'].'/'.$row['ID'])."'})";
				$link_del=base_url('menu/backend_menu/del/'.$row['ID']);
				
				$r .= "<tr {$class_level}><td {$folder}>{$thut_vo}<span>{$row['tieu_de']}</span> {$href}</td>";
				$r .= "<td align='right'><div class='user_action'>";
				
				if($accept_child)
				$r .= "<a onclick=\"{$add_new}\" class='new'>Thêm menu con</a> - ";
				
				
				$r .= "<a onclick=\"{$click_edit}\" class='edit'>Sửa</a> - 
				<a href='{$link_del}' class='del' target='temp_frame'>Xóa</a>
				</div></td></tr>";
				if ($folder == "class='parent'")
				$r .= $this->build_menu_back_end($rows,$row['ID']);
			}
	  }
	  return $r;
	}
	function build_menu_front_end($rows,$parent='')
	{
		$result = "<ul>";
		foreach ($rows as $row)
		{
			if ($row['parent_id'] == $parent){
				$folder="";
				$id_folder="";
				if($this->CI->lib_menu->has_children($rows,$row['ID']))
				{
					$folder="class='parent'";
					$id_folder="id='parent'";
				}
				
				$active="";
				if($this->CI->lib_menu->check_active($rows,$row['FID']))
				$active="class='active'";
				
				$thut_vo = $this->CI->lib_menu->get_thut_vo($rows,$row['ID'], 1,false);
				
				if($row['href'] != ""){
					$href = $row['href'];
					if(!$this->CI->lib_url->valid_url($href) && $href!="#") $href = base_url($href);
				}
				else {

					
					$href = $this->CI->lib_menu->make_link(array($row['FID'] => $row['tieu_de']), $attr_view = array());
					
				}
				$target = ($row['target'] != "") ? "target={$row['target']}" : '';
					
				$result.= "<li {$folder}>{$thut_vo}<a href='{$href}' title='{$row['tieu_de']}' {$target} {$id_folder} {$active}>{$row['tieu_de']}</a>";
				if ($folder == "class='parent'")
					$result.= $this->build_menu_front_end($rows,$row['ID']);
				$result.= "</li>";
			}
	  }
	  $result.= "</ul>";
	
	  return str_replace("<ul></ul>","",$result);
	}
}