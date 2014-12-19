<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ext_templates extends MX_Controller {
	
		public function __construct(){
       	parent::__construct();
       	
       	$this->load->library('lib_files');
       	/*$this->load->Model('Ext_template_model');*/
       	
	}
	function index($module)
	{
		$data = array();

		$deleteds= array();
        $dir_block = APPPATH."modules/".$module."/views/";
        
        $dir_css = APPPATH."modules/".$module."/assets/css/";
		
        $this->template->write('title',"Chỉnh sửa template" , true);
            
	    $files_block = $this->lib_files->load_all_file_dir($dir_block);
	    $files_css = $this->lib_files->load_all_file_dir($dir_css);
	    
	    $files = array_merge($files_css,$files_block);
	    /*print_r ($files);*/
	    
        $data['files'] = $files;
        $data['module'] = $module;
        $this->load->view("backend_show_item",$data);
	}
	
    public function edit_promt(){
        
        
        $data = array();
        $filepath = $this->lib_url->_GET('path');
        
        
        $submit = $this->input->post('submit');
        if($submit)
        {
            
            $f = fopen($filepath, 'w');
			fwrite($f, str_replace("\\","",$_POST['content_template']) );
			fclose($f); 
			
			$this->load->view("iframe/promt_feed" , array("messenger" => "Thành công...") );
            return false;
          
        }
        
        
		$fh = fopen($filepath, "rb");
		$contents = fread($fh, filesize($filepath)+1);
		fclose($fh);
        
		$data['contents'] = $contents;
        $this->load->view("backend_promt",$data);
        
    }
}
