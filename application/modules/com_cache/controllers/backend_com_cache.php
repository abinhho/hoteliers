<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backend_com_cache extends MX_Controller {
	
	public $title = "Dữ liệu cached";
	var $media_folder ;
	
	public function __construct(){
       	parent::__construct();
      	
       	$this->media_folder = 'application/cache';
		
       	$this->load->helper('directory');
       	$this->load->helper('file');
       	$this->load->helper('download');
       	$this->load->library('lib_convert');
       	
    }
	public function index()
	{ 
		$this->show_item();
	}
	public function show_item(){
		
		$data = array();
		$this->template->write('title',$this->title, true);
	
		$data['items'] = get_dir_file_info($this->media_folder);		
		$this->load->view("show_item",$data);
	}
	public function del($file_name)
	{
		unlink($this->media_folder.'/'.$file_name);
		$this->lib_url->redirect_to_back();
	}
	public function del_all()
	{
		foreach ( get_dir_file_info($this->media_folder) as $file_name => $info)
		{ 
			if($file_name == "index.html" || $file_name == ".htaccess") continue;
			unlink($this->media_folder.'/'.$file_name);
		} 
		$this->lib_url->redirect_to_back();
	}
	
}
 
