<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Backend_news_model extends CI_Model{
	
	var $db_table = "mod_news";
	var $upload_folder = "images/news";
	public function __construct(){
        parent::__construct();
               
        $this->load->library("lib_upload");
        $this->lib_upload->config_image['upload_path'] = $this->upload_folder;
                       
    }
    public function index(){
    	
    }
    public function show_item(){
    	
    	$select_a = "ID,date_upd,active,user_id";
    	$select_b = "tieu_de";
    	
    	$this->lib_db->get_find_in_set();
    	$this->lib_db->create_query_search();
    	    	
    	$this->lib_db->order_by();
    	$this->lib_pagination->db_limit();
    	$r['items'] = $this->lib_db->get_join_lang($this->db_table, $id = "" ,$lang = "" , $select_a , $select_b)
    	->result_array();
    	
    	$this->lib_db->get_find_in_set();
		$this->lib_db->create_query_search();
    	
    	$conf['nRow'] = $this->lib_db->get_join_lang($this->db_table, $id = "" ,$lang = "" , $select_a , $select_b)
    	->num_rows();
    	$r['split_page'] = $this->lib_pagination->split_page($conf);
    	
    	
   		/*echo $this->db->last_query();*/
   		
    	
   		
   		
    	//$this->db->stop_cache();
    	/*$this->lib_db->get_find_in_set();*/
    	
    	
    	return $r;
    }
    public function data_edit($id){
    	
    	$data = array();
    	
    	$this->db->where(array("ID" =>$id ));
    	$data = $this->db->get($this->db_table)->row_array();
    	
    	$this->db->where(array("FID" =>$id ));
    	return $data + $this->lib_db->get_all_backend_table_lang($this->db_table);
    }
    public function list_catagory(){
    	
    	$this->db->distinct();
    	$this->db->select('catagory');
    	$temps = $this->db->get($this->db_table)->result_array();
    	
    	$temp = array();
    	foreach ($temps as $r)
    	{
    		$temp[$r['catagory']] = $r['catagory'];
    	}
    	
    	return $temp;
    	
    }
    public function do_edit(&$data , $id){
    	
    	$db_data = array
    	(
	    	"the_code" => $this->input->post('the_code')
    		,"user_id" => $this->session->userdata('ID')
            ,"mod_noi_bat" => $this->input->post('mod_noi_bat')
    		,"active" => $this->input->post('active')
    		,"active_comment" => $this->input->post('active_comment')
    		,"active_vote" => $this->input->post('active_vote')
    		,"images" => $this->input->post('images')
    	);
    	
    	
    	$db_data['date_add'] = $this->lib_input->post_date_picker('date_add');
    	$db_data['date_end'] = $this->lib_input->post_date_picker('date_end');
    	
    	$db_data['catid'] = implode(",", $this->input->post('catid'));
    	
    	$images  = $this->input->post('images');
    	$db_data['images'] =  $this->lib_media->remove_file_not_exist_in_list($this->db_table,$images);
    	
    	if($id)
    	{
    		$this->db->where("ID",$id);	
    		$this->db->update($this->db_table , $db_data);
    		
       	}
    	else {
    		$this->db->insert($this->db_table , $db_data);
    		$id = $this->db->insert_id();	
    	}
    	
    	$this->lib_db->update_or_insert_lang($this->db_table
    		, $id = $id 
    		, "tieu_de,noi_dung,keywords,description");
    	
    	$this->lib_url->reload("Cập nhật thành công...");
    	
    }
    
    public function copy($id)
    {
    	$newid= $this->lib_db->dup($this->db_table, $id);
    	$this->lib_db->dup_lang($this->db_table, $id, $newid);
    	
    	$this->db->select("images");
    	$r = $this->db->where("ID", $newid ) -> get($this->db_table) ->row_array();
    	$img = $r['images'];
    	
    	if($img != "")
    	{
			$newimg = array(); 
			$imgs =preg_split("/,/" , $img);
			{
				foreach($imgs as $file)
				{
					$newfile = time()*rand()."-".$file;
	
					if (copy($this->upload_folder.'/'.$file, $this->upload_folder.'/'.$newfile) ) {
	                        $newimg[] = $newfile;
	                 }
	                    else echo "failed to copy $file...\n";
	 
				}
			}
			
			$db_data =array( "images" => implode("," , $newimg) );
			
			$this->db->where("ID", $newid);
			$this->db->update($this->db_table, $db_data);
    	}
    	
    }
    
    
	public function del_multi()
    {
    	$list = $this->input->post('multi_select');
    	foreach ($list as $id)
    	{
    		$this->del($id);
    	}
    }
    public function del($id)
    {
    	$this->lib_db->del_images($this->db_table, $id);
    	$this->lib_db->del_data_lang($this->db_table, $id);
    	
    	$this->db->where("ID",$id);
    	$this->db->delete($this->db_table);
    }
}