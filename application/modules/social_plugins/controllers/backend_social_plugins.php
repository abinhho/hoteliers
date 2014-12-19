<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backend_social_plugins extends MX_Controller {
	
	var $_GET_id;
	public $title = "Plugin mạng xã hội";
	public function __construct(){
       	parent::__construct();
      	
      	$this->load->library('lib_pagination');
      	$this->lang->load('static');
      	$this->load->library('form_validation');
      	
      	$this->module = $this->router->fetch_module();
      	
	}
	function index()
	{
		$this->blocks();
	}
	public function templates()
    {
        echo modules::run('ext_templates', $this->module);
    }
    public function blocks()
    {
        echo modules::run('com_blocks/backend_com_blocks/blocks_each_module', $this->module);

    }
}
 
