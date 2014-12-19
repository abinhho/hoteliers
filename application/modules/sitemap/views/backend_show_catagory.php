<?php $js_add = 'onclick="return open_promt({title:\'Thêm danh mục\', url:\''.base_url('sitemap/backend_sitemap/edit/add').'\'})"'; ?>
<table class='tbl_tree_menu'>			
	<caption>Tất cả các danh mục trong site <?php echo anchor("#", "+ Thêm mới", $js_add); ?></caption>		
	<?php echo $all_cata;  ?>	
</table>