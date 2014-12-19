<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Lib_sort {

	public function move2top_db_array(&$arrs,$key,$val)
	{
		foreach($arrs as $i=>$row)
		{
			if($row[$key]==$val)
			{
				$temp = $arrs[$i];
				unset($arrs[$i]);
				array_unshift($arrs,$temp);
				array_values($arrs);
				return;
			}
		}
	}
}
?>