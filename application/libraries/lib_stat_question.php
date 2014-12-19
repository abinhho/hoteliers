<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Lib_stat_question{
	var $CI;
	public function __construct(){
		$this->CI = &get_instance();
	}
	
    function up_stat_tags($tags_id)
    {
        if(empty($tags_id)) return;
        $this->CI->db->set('n_used', '`n_used`+ 1', FALSE);
        $this->CI->db->where('ID in('.$tags_id.')');
        $this->CI->db->update('mod_tags'); 
               
    }
    function down_stat_tags($tags_id)
    {
        if(empty($tags_id)) return;
        $this->CI->db->set('n_used', '`n_used`- 1', FALSE);
        $this->CI->db->where('ID in('.$tags_id.')');
        $this->CI->db->update('mod_tags');        
    }
    function re_stat_catagory($cata_id)
    {
        if(empty($cata_id)) return;
        
            $query = $this->CI->db->query("
            SELECT ID
                FROM mod_questions
                WHERE catid = '".$cata_id."'   
                ");
            $n = $query->num_rows();
            $this->CI->db->update('mod_sitemap', array('n_used' => $n), array('ID'=> $cata_id)); 
               
    }
   
    function re_stat_answer($question_id)
    {
        if(empty($question_id)) return;
        
            $query = $this->CI->db->query("
            SELECT ID
                FROM mod_questions_answer
                WHERE FID = '".$question_id."'   
                ");
            $n = $query->num_rows();
            $this->CI->db->update('mod_questions', array('n_answers' => $n), array('ID'=> $question_id));  
               
    }
    function re_stat_n_answers_user($user_id)
    {
        if(empty($user_id)) return;
        
            $query = $this->CI->db->query("
            SELECT ID
                FROM mod_questions_answer
                WHERE user_id = '".$user_id."'   
                ");
            $n = $query->num_rows();
            $this->CI->db->update('mod_user', array('n_answers' => $n), array('ID'=> $user_id));  
               
    }
    function re_stat_n_questions_user($user_id)
    {
        if(empty($user_id)) return;
        
            $query = $this->CI->db->query("
            SELECT ID
                FROM mod_questions
                WHERE user_id = '".$user_id."'   
                ");
            $n = $query->num_rows();
            $this->CI->db->update('mod_user', array('n_questions' => $n), array('ID'=> $user_id));  
               
    }
    function re_stat_user_score($user_id = ''){
        if($user_id == '')
        $user_id = $this->CI->session->userdata('ID');
        if($user_id  == '') return ;
        $this->CI->db->select_sum('n_votes');
        $r = $this->CI->db->where(array('user_id'=> $user_id )) -> get('mod_questions') -> row_array(); 
      
        $this->CI->db->select_sum('n_votes');
        $r1 =  $this->CI->db->where(array('user_id'=> $user_id)) -> get('mod_questions_answer') -> row_array();
        
        $count =$r['n_votes'] + $r1['n_votes'] + 5 ;
        $this->CI->db->update('mod_user', array('score' => $count), array('ID'=> $user_id));  
    }
	
}