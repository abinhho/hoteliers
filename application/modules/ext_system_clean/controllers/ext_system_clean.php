<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ext_system_clean extends MX_Controller {
	
		public function __construct(){
       	parent::__construct();
       	
       	$this->load->library('lib_files');
       	$this->load->Model('Ext_system_clean_model');
       	
	}
	function index($module)
	{
		$data = array();

		$deleteds= array();
        $dir = "images/".$module;
		
        $this->template->write('title',"Dọn dẹp hệ thống" , true);
        $submit = $this->input->post('submit');
        if($submit)
        {
            $list_images = $this->Ext_system_clean_model->get_data($module);
             
	    $files = $this->lib_files->load_all_file_dir($dir);
	    /*print_r ($files);*/
	    foreach ($files as $file)
	    {
	        if(!in_array($file,$list_images))
	        {
	            $ready_del = $dir.'/'.$file;
	            if(file_exists($ready_del) && $file!="noimage.jpg"){
	                unlink($ready_del);
	                $deleteds[] = $file;
	            }
	        }
	    }
            
        }
        $data['folder'] = $module;
        $data['deleteds'] = $deleteds;
        $this->load->view("backend_form",$data);
	}
}
