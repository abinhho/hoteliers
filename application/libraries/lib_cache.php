<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Lib_cache{
	public $CI;
    var $cachetime = 3600;
    var $method = '';
    var $cache_file = '';
	public function __construct(){
       $this->CI = & get_instance();
       $this->cache_dir = APPPATH.'cache/';
        
   	}
	function check_cache_json($method = 'method', $id , &$data) 
    {
        $this->method = $method;
        if(empty($this->method)) return false;
        $cache_file = $this->cache_dir . $id.'-'. md5($this->method);
        $this->cache_file = $cache_file;
        
        if (file_exists($cache_file) && time() - $this->cachetime < filemtime($cache_file)) {
                $data = unserialize(file_get_contents($cache_file));
                return true;
        }
        return false;   
	}
    function cache_json($data)
    {
        if(empty($this->method)) return false;
        file_put_contents($this->cache_file, @serialize($data) );
    }
    function clear_cache_json($method,$id)
    { 
        if(empty($id)) return;
        $cache_file = $this->cache_dir . trim($id).'-'.md5(trim($method));
        @unlink($cache_file);
    }

	
}