<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Social_plugins extends MX_Controller {
	var $img_folder = "";
	public function __construct(){
       	parent::__construct();
       	 
	}
	public function index($viewid = "")
	{ 
		echo "index_order";
	}
    
    function block_facebook_lightbox()
    {
        $this->load->view("block_facebook_lightbox");
        
    }
   
	
}
 
