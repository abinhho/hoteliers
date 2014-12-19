<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Breadcrumb extends MX_Controller {
	var $img_folder = "";
	var $breadcrumb = array();
	public function __construct(){
       	parent::__construct();
       	$this->load->Model('Breadcrumb_model');
               
	}
	public function index($viewid = "")
	{
		echo "index_order";
	}
    
    function block_breadcrumb()
    {
        $data = array();
        //$items = $this->load->model('menu/Menu_model')->get_items('menu_ngang');
        $items = $this->lib_menu->get_all_sitemap();
        //$items = $this->Breadcrumb_model->get_items();
        $data['contents_breadcrumb'] = array_reverse($this->show_type_sitemap($items, CATID)) ;
        $data += $this->Breadcrumb_model->block_breadcrumb();
        $this->load->view("block_breadcrumb", $data);
        
        
    }
    
    private function show_type_sitemap($items, $catid, $parent_id = "")
    {
    	if(!is_numeric($catid) && $catid != "")
    	return $this->breadcrumb;
    	foreach ($items as $row)
    	{
            if($row['ID'] != 2)
    		if($row['ID'] == $catid || ($row['ID'] == $parent_id && $catid == "" ) )
    		{
    			
    			$href = $this->lib_menu->make_link( array( $row['ID'] => $row['tieu_de'] ) );
    			
    			$this->breadcrumb[] = array(
    			"tieu_de" => $row['tieu_de']
    			,"href" => $href
    			);
    			if($row['parent_id'] != "")
    			{ 
    				$this->show_type_sitemap($items, '', $row['parent_id']);
    			}
    		}
    	}
    	return $this->breadcrumb;
    }
    
    private function show($items, $catid, $parent_id = "")
    {
    	if(!is_numeric($catid) && $catid != "")
    	return $this->breadcrumb;
    	foreach ($items as $row)
    	{
    		if($row['FID'] == $catid || ($row['ID'] == $parent_id && $catid == "" ) )
    		{
    			
    			$href = ($row['href'] == "#") ? "#" 
    			: $this->lib_menu->make_link( array( $row['FID'] => $row['tieu_de'] ) );
    			
    			$this->breadcrumb[] = array(
    			"tieu_de" => $row['tieu_de']
    			,"href" => $href
    			);
    			if($row['parent_id'] != "")
    			{ 
    				$this->show($items, '', $row['parent_id']);
    			}
    		}
    	}
    	return $this->breadcrumb;
    }
    
    
   
	
}
 
