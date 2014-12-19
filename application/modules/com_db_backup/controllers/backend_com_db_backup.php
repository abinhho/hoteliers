<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backend_com_db_backup extends MX_Controller {
	
	public $title = "Backup dữ liệu";
	var $media_folder ;
	
	public function __construct(){
       	parent::__construct();
      	$this->load->Model('Backend_com_db_backup_model');
       	$this->media_folder = 'sql';

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
		
		
		$submit = $this->input->post('submit');
		if($submit)
		{
			$this->load->dbutil();
			$file_type = $this->input->post('file_type');
			
			if($file_type == "gzip") $ext = ".gz";
			elseif($file_type == "zip") $ext = ".zip";
			elseif($file_type == "txt") $ext = ".sql";
			
			$file_name = $this->lib_date->get("y-m-d-h-i-s"). '-backup'.$ext;
			
			$prefs = array(
                'format'      => $file_type,         
                'filename'    => $file_name,
                'add_drop'    => TRUE,
                'add_insert'  => $this->input->post('struct_type'),          
                'newline'     => "\n"           
              );
            $backup = $this->dbutil->backup($prefs); 
                       
            if($this->input->post('backup_type') == "save" ){ echo $this->media_folder.'/'.$file_name;
				write_file($this->media_folder.'/'.$file_name, $backup);
            }
            else
            {
				force_download($file_name, $backup);
            }
            $this->lib_url->reload("Thành công...");
		}
		
		
		
		$data['items'] = get_dir_file_info($this->media_folder);		
		$this->load->view("show_item",$data);
	}
	
	public function download($file_name)
	{
		$data = file_get_contents($this->media_folder.'/'.$file_name); 
        force_download($file_name, $data);
	}
	public function del($file_name)
	{
		unlink($this->media_folder.'/'.$file_name);
		$this->lib_url->redirect_to_back();
	}
	
}
 
