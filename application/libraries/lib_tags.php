<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Lib_tags{
	var $CI;
	public function __construct(){
		$this->CI = &get_instance();
	}
	
	public function show_tags($ids, $inline = false)
	{
	   
	   if(empty($ids)) return '';
        $query = $this->CI->db->query("
         SELECT a.ID,a.FID,a.tieu_de,a.alias,a.n_used,b.alias as b_alias
            FROM mod_tags a
            JOIN mod_sitemap b ON a.FID = b.ID AND b.alias <> ''                        
            WHERE a.ID IN(".$ids.")
            ");
     	$tags_info = $query -> result_array(); 
	   
	   if(!is_array($tags_info) || count($tags_info) == 0) return '';
	   $r = "";
		foreach($tags_info as $i => $row)
		{
			$r .= (!$inline) ? "<div class='li'>" : '';
			$r .= "<a class='each_tag' title='".$row['tieu_de']."' href='". base_url('tags/'.$row['b_alias'].'/'.$row['alias']) ."/'>". $row['tieu_de'] ."</a>";
			$r .= (!$inline) ? "<span class='count'> x ".$row['n_used']."</span></div>" : '';
		}
        return $r;
	}
    public function show_tags_in_form($ids)
	{
	   
	   if(empty($ids)) return '';
        $query = $this->CI->db->query('
         SELECT ID,FID,tieu_de,alias,n_used
            FROM mod_tags                         
            WHERE ID IN('.$ids.')
            ');
     	$tags_info = $query -> result_array();
	   
	   if(!is_array($tags_info) || count($tags_info) == 0) return '';
	   $r = "";
		foreach($tags_info as $i => $row)
		{
			$r .= '<span class="each_tag" tag_id="'.$row['ID'].'">'.$row['tieu_de'].'<i class="remove_me"></i></span>';
			
			
		}
        return $r;
	}
    
    public function show_checkbox_tags($catid, $ids)
	{
	   
        if(trim($catid) == "") return "<span class='gray'>Vui lòng chọn 1 danh mục để chọn tag</span>";
       
        $query = $this->CI->db->query("
         SELECT ID,FID,tieu_de,alias,n_used
            FROM mod_tags                         
            WHERE FID = '".$catid."'
            ");
     	$rows = $query -> result_array();
        
        $list_ids = preg_split('/,/',$ids);
        
        $r = "";
		foreach($rows as $i => $row)
		{
            $checked = (in_array($row['ID'], $list_ids )) ? 'checked' : '';
			$r .= '<div class="each"><input id="for'.$row['ID'].'" autocomplete="off" data_tieu_de = "'.$row['tieu_de'].'" type="checkbox" '.$checked.' name="checkbox_tags_id" value="'.$row['ID'].'">
            <label for="for'.$row['ID'].'">'.$row['tieu_de'].'</label>
            </div>';
			
			
		}
        return $r;
	}
	
	function show_hot_tags($catid = "", $inline = false)
	{
		
		$where = ($catid == "" || $catid == 65) ? '' : ' WHERE a.FID = '.$catid.' ';
		
        $query = $this->CI->db->query('
         SELECT a.ID,a.FID,a.tieu_de,a.alias,a.n_used,b.alias as cata_alias
            FROM mod_tags a
            JOIN mod_sitemap b ON a.FID = b.ID      
			'.$where.'
            ORDER BY a.n_used DESC LIMIT 15
            ');
     	$tags_info = $query -> result_array();
	   
	    if(!is_array($tags_info) || count($tags_info) == 0) return '';
	    $r = "";
		foreach($tags_info as $i => $row)
		{	if(empty($row['tieu_de'])) continue;
			$r .= (!$inline) ? "<div class='li'>" : '';
			$r .= "<a class='each_tag' title='".$row['tieu_de']."' href='". base_url('tags/'.$row['cata_alias'].'/'.$row['alias']) ."/'>". $row['tieu_de'] ."</a>";
			$r .= (!$inline) ? "<span class='count'> x ".$row['n_used']."</span></div>" : '';
		}
        return $r;
	}
	
	function tag_info_by_alias($alias)
    {
        if(empty($alias)) return array();
        $query = $this->CI->db->query("
         SELECT a.ID,a.FID,a.tieu_de,a.alias,a.noi_dung, b.tieu_de as cata_tieu_de
            FROM mod_tags a 
            JOIN mod_sitemap b ON b.ID = a.FID                         
            WHERE a.alias ='".$alias."' 
            LIMIT 1");
            //echo $this->db->last_query(); exit; 
     	return $query -> row_array();
        
    }
  
	
}