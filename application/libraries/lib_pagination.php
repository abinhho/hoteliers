<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Lib_pagination
{
	var $CI;
	var $nRow=0;
	var $per_page;
	var $seeing;
	public  $show_page_detail = true;
	public $nshow = 7;
	public function __construct()
	{
		$this->CI = &get_instance();
		$per_page = $this->CI->lib_url->_GET('per_page');
		$this->per_page = ($per_page =="" ) ? $this->CI->config->item('pagination_length') : $per_page;

		$this->seeing = $this->CI->lib_url->_GET('page');
		if($this->seeing =="" || $this->seeing ==0 ) $this->seeing = 1;
	}
	public function db_limit(){
		$this->CI->db->limit($this->per_page ,($this->seeing - 1) * $this->per_page);
	}
	public function split_page($conf , $class="")
	{
		$r = "";
		if(isset($conf['nRow'])) $this->nRow = $conf['nRow'];
		if(isset($conf['per_page'])) $this->per_page = $conf['per_page'];
		
		$n = $this->nRow/$this->per_page; 
		
		($n>(int)$n)? $n= (int)$n+1 : $n=(int)$n;
		
		$seeing = $this->seeing;
		
		if($this->nRow>0){
		
			$r .= "<div class='split_page {$class} after'><div class='bound_page'>";
			if($n<=7){ $i_left = 1;$i_right= $n; }
			else
			{
				$i_left = $seeing - (int)($this->nshow/2); 
				if($i_left<=0){
					$i_left = 1;
					$i_right = $this->nshow;
				}
				elseif($seeing+(int)($this->nshow/2)>=$n)
				{
					$i_right = $n;
					$i_left = $n-$this->nshow + 1; 
				}
				else {
					$i_right = $seeing+(int)($this->nshow/2);
					$i_left  = $i_right - (int)($this->nshow) + 1;
				}
			}
			if($seeing>1){
				$link = $this->CI->lib_url->change_url("", array("page"=>$seeing-1));
				$r .= "<a href='{$link}'><< Trước</a>";
			}
			
			if($i_left != $i_right)
			for($i = $i_left;$i<=$i_right;$i++)
			{
				$link = $this->CI->lib_url->change_url("", array("page"=>$i));
				
				$active = ($seeing == $i) ? "class='active'" : '';
				$r .= "<a href='{$link}' {$active}>{$i}</a>";
			}
			
			
			if($seeing<$n && $n>1){
				$link = $this->CI->lib_url->change_url("", array("page"=>$seeing+1));
				$r .= "<a href='{$link}'>Tiếp theo >></a>";
			}
			$r .= "</div>";
			if($this->show_page_detail)
			$r .= $this->page_detail($seeing);
			$r .= "</div>";
			
	
		}
		elseif($class!="top") {
			$r .= "<span class='no_result'>".lang('no_result')."...</span>";
		}
		return $r;
	}
	function page_detail($seeing)
	{
		$seeing=$this->CI->lib_url->_GET('page');
		$r = "";
		if($this->nRow>0){
			
			$a=1;
			$r.= "<span class='npage_of'>";
			
			$seeing = ($seeing == "") ? 1 : $seeing;
			
			if($seeing>1)
			{
				$a = ($seeing-1) * $this->per_page+1;
			}
			$b=$seeing * $this->per_page;
			
			if($b > $this->nRow) $b = $this->nRow;
			
			$r .= lang('display_from')." ".$a." - ".$b." ".lang('of')." " .$this->nRow." ". lang('result')."</span>";
		}
		return $r;
	}
}