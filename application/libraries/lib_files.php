<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Lib_files{
    var $CI;
    public function __construct(){
        $this->CI = &get_instance();
    }
    function load_all_file_dir($fol)
    {
        $handle = '';
        $file = '';
        $lists=array();
            if (file_exists($fol)) { 
                $handle = opendir($fol); 
                
                while (false !== ($file = readdir($handle))) {
                
                    if (is_file($fol. '/' . $file) ) {
                        $lists[] = $file;
                    }
                }
                closedir($handle);
            }
            return $lists;
    }
}
