<?php $js_add = 'onclick="return open_promt({title:\'Thêm danh mục\', url:\''.base_url('menu/backend_menu/radio_select_menu/'.$block).'\'})"'; ?>
<table class='tbl_tree_menu'>			
	<caption> <?php echo $caption;  echo anchor("#", "+ Thêm mới", $js_add); ?></caption>		
	<?php echo $all_menu; ?>	
</table>