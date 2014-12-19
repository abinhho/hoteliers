<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Stat_model extends CI_Model{
	
	private $db_table = "mod_stat";
	public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->mod_name = $this->router->fetch_module(); 
    }
    public function index(){
    	
    }
  
    function increment_viewed_times($module, $view_id)
    {
    	$curr = $this->session->userdata("viewed_data");
    	if(empty($curr)) $curr = array();
    	
    	if(!in_array($module."_".$view_id, $curr) )
    	{  
    	   $this->lib_db->increment_row("mod_".$module, "viewed_times", array("ID"=> $view_id));
           $curr[] = $module."_".$view_id;
    	}  
    	
    	$this->session->set_userdata('viewed_data', $curr);
    	
    }
    
    function create_stat()
    {
        $rip = $_SERVER['REMOTE_ADDR'];
        
        $exist = $this->db->get_where($this->db_table , array('host' => $rip ) )->num_rows();
        
        if($exist == 0)
        {
            $data=array(
            "host" =>$rip
            ,"total" =>1
            ,"total_month" =>1
            );
            $this->db->insert($this->db_table , $data);
        }
        else
        {
            
            $this->db->select("MONTH('date_upd') as month");
            $t = $this->db->where("host", $rip)->get($this->db_table)->row_array();
            $sql_month = $t['month'];
            
            $curr_month=$this->lib_date->get('m');
            
            $curr_time= $this->lib_date->get();
            
            $time =  $this->lib_date->sub("-600 second");
            
            $exist = $this->db->get_where($this->db_table , array('date_upd <' => $time , "host" =>$rip ) )->num_rows();
            
            if($exist > 0) 
            {
            	$this->lib_db->increment_row($this->db_table, "total", array("host" => $rip ) );
            }
            
            
            if($sql_month == $curr_month)
            {
                if($exist != null){
                    
                    $this->lib_db->increment_row($this->db_table, "total_month", array("host" => $rip ) );
                }
            }
            else
            {
                $this->db->where("host", $rip);
                $this->db->update($this->db_table, array("total_month" => 1));
                
            }
            $this->db->where("host", $rip);
            $this->db->update($this->db_table, array("date_upd" => $curr_time));
            
        }
    }
    public function block_stat(){
        
    	$data = array();
        $this->db->select_sum("total");
        $t = $this->db->get($this->db_table)->row_array();
    	$data['total'] = $t['total'];
    	
    	$this->db->select_sum("total_month");
        $t = $this->db->where("MONTH(date_upd) = '{$this->lib_date->get('m')}'")
        ->get($this->db_table)->row_array();
        $data['total_month'] = $t['total_month'];
        
        //$this->db->select_sum("total_month");
        $this->db->from($this->db_table);
        $this->db->where("date_upd >= '{$this->lib_date->sub('-600 seconds')}'");
        $data['online'] = $this->db->count_all_results();
        
    	
        return $data;
    }
    
}