<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Frontend extends MX_Controller {
	
	public $tb_conf = array();
	var $curr_module;
	public function __construct(){
       	parent::__construct();
		$this->set_language();
       	$this->load->Model('Frontend_model');
       	$this->lang->load('static', $this->config->item('language'));
       	//$this->session->set_userdata("lang", "en");
	}
	public function index($catid = "", $viewid = "", $param = "")
	{ 
		Modules::run('stat/create_stat');
		/* Loading css and js file */ 
		$this->tb_conf = $this->Frontend_model->load_conf();
		$this->lib_assets->active_mods = $this->Frontend_model->active_mods();
		$this->lib_assets->combind_css();
		
		$this->config->set_item("body_layout", $this->tb_conf['body_layout'] );  
		
		$this->curr_module = $this->lib_menu->module_by_catid($catid);
		
		define("CATID", $catid); //echo CATID;
		define("VIEWID", $viewid);
		define("NAME_PAGE",$this->tb_conf['name_page']);
        
        define("PAGE_ADDRESS",$this->tb_conf['page_address']);
        
		define("SHORT_DESCRIPTION",$this->tb_conf['short_description']);
        
        define("_PHONE",$this->tb_conf['phone']);
        define("_EMAIL",$this->tb_conf['email']);
        define("_SLOGAN",$this->tb_conf['slogan']);
        define("_ADDRESS",$this->tb_conf['address']);
		
		define("FACEBOOK_PAGE",$this->tb_conf['facebook_page']);
        define("TWITTER_PAGE",$this->tb_conf['twitter_page']);
        define("YOUTUBE_PAGE",$this->tb_conf['youtube_page']);
		define("GOOGLE_PAGE",$this->tb_conf['google_page']);
		define("GA_CODE",$this->tb_conf['google_analytics']);
		
		
		$this->template->add_css('assets/css/main.css');
		$this->template->add_css('assets/css/ui.css');
		$this->template->add_css('assets/css/datepicker.css');
		$this->template->add_css('assets/css/promt.css');
		$this->template->add_css('assets/css/lightbox.jquery.css');
		$this->template->add_css('assets/css/mods.css');
		$this->template->add_css('assets/css/tool.tip.css');
		
		$this->template->add_js('assets/js/jquery.js');
		$this->template->add_js('assets/js/jeffect.js');
		$this->template->add_js('assets/js/lightbox.jquery.js');
		$this->template->add_js('assets/js/promt.js');
		$this->template->add_js('assets/js/fn.js');
		$this->template->add_js('assets/js/datepicker.js');
		$this->template->add_js('assets/js/jquery.lazyload.js');
		$this->template->add_js('assets/js/tool.tip.js');
		
		$this->lib_assets->module_js();
		
		/* Assign to variable */		
		
		$this->template->write("title",$this->tb_conf['home_title']);
		$this->template->write("description",$this->tb_conf['description']);
		$this->template->write("keywords",$this->tb_conf['keywords']);
		
		
		$this->template->write("mainfile",$this->mainfile($catid, $viewid, $param));
		
		$this->template->write("header",$this->header());
		
		$this->template->write("left_right_page",$this->left_right_page("left_page")
        .$this->left_right_page("right_page")
		);
		
		$this->template->write("footer",$this->footer());
		
		
		$this->template->render();
		
	}
	function set_language()
    {
		$a = $this->session->userdata('lang');
        $lang = $this->lib_url->_GET('lang'); 
        if($lang == 'vi' || (empty($a) && $lang == ''))
        {
            $this->session->set_userdata('lang', '');
        }
        elseif($lang != '')
        {
            $this->session->set_userdata('lang', $lang);
        }
        
        if($this->session->userdata('lang') == '')
        {
            $this->config->set_item('language', 'vietnamese');
        }
        else
        {
            $this->config->set_item('language', 'english');
        }
       
    }
	function left_right_page($pos)
	{
		$this_blocks = $this->Frontend_model->get_blocks($this->curr_module, $pos);
		$r = "";
	    foreach ($this_blocks as $temp)
	    {
	        $r .= $this->show_each_block($temp);
	    }
	    return $r;
	}
	
	public function header(){
		$this_blocks = $this->Frontend_model->get_blocks($this->curr_module,'header');
		$r = "";		
		foreach ($this_blocks as $temp)
		{
			$r .= $this->show_each_block($temp);
		}
		return $r;
	}
	public function footer(){
		$this_blocks = $this->Frontend_model->get_blocks($this->curr_module ,'footer');
		$r = "";
		foreach ($this_blocks as $temp)
		{
			$r .= $this->show_each_block($temp);
		}
		return $r;
	}
	public function mainfile($catid, $viewid = "", $param = ""){ 
		
		if(!is_numeric($catid))
		{
		   
		  if(is_numeric($viewid)) 
		  {
		  	$method = "index";
		  	$temp_param = $viewid;
		  }  
		  else {
		  	$method = $viewid;
		  	$temp_param = $param;
		  }
		  
		  $content = (!empty($this->curr_module)) ?   Modules::run($this->curr_module."/".$catid."/". $method , $temp_param) : 
		  Modules::run('in_home/index');
		}
		else
		$content = (!empty($this->curr_module)) ?	Modules::run($this->curr_module, $catid, $viewid) : '';
		
		$left = ''; $right = '';
		if(!empty($this->curr_module)){
			$re_define_left = Modules::run($this->curr_module."/layout_left");
			if(is_array($re_define_left))
			{
				foreach ($re_define_left as $m)
				{
					$left .= Modules::run($m);
				}
			}
		    $re_define_right = Modules::run($this->curr_module."/layout_right");
		   
            if(is_array($re_define_right))
            {
                foreach ($re_define_right as $m)
                {
                    $right .= Modules::run($m);
                }
            }
		}
		
		/*$right = (!empty($this->curr_module)) ?  Modules::run($this->curr_module."/layout_right") : '';*/
		
		
		$arr_layouts = preg_split("/[-_]+/" , $this->config->item("body_layout")) ;
		
		$r = "";
		foreach ($arr_layouts as $layout)
		{//echo "___+".$this->curr_module."+__";
			$r .= "<div class='{$layout}_page'>";
			if ($layout == 'left')
			{
				if($left == "")
				{
					$this_blocks = $this->Frontend_model->get_blocks($this->curr_module, $layout."_col"); 
					foreach ($this_blocks as $temp)
					{
						$r .= $this->show_each_block($temp);
					}
				}
				else $r .= $left;
			}
			elseif ($layout == 'body')
			{
				$this_blocks = $this->Frontend_model->get_blocks($this->curr_module, $layout."_top");
				foreach ($this_blocks as $temp)
				{
					$r .= $this->show_each_block($temp);
				}
				//$r .= "This is content page";
				
				$r .= $content;
				
				$this_blocks = $this->Frontend_model->get_blocks($this->curr_module, $layout."_bottom");
				foreach ($this_blocks as $temp)
				{
					$r .= $this->show_each_block($temp);
				}
			}
			elseif ($layout == 'right')
			{
				if($right == "")
                {
					$this_blocks = $this->Frontend_model->get_blocks($this->curr_module, $layout."_col");
					foreach ($this_blocks as $temp)
					{
						$r .= $this->show_each_block($temp);
					}
                }
                else $r .= $right;
			}
			$r .= "</div>";
		}
		return $r;
	}
	public function show_each_block($arrs)
	{
        unset(Modules::$registry[$arrs['module']]);
		return Modules::run($arrs['module'].'/'.$arrs['block_name']);
			
	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */