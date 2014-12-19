<?php 
echo form_open('products/create_search', 'id=form_search onsubmit=" if(this.q.value == \'\' ) return false; "');
?>
<div class="mod_products block_search">
<?php echo form_input('q', str_replace("+"," ",$this->lib_url->_GET('q')) , "placeholder = 'Từ khóa tìm kiếm...' class='q'"); ?>
<?php echo form_submit('submit','Tìm kiếm', "class='submit btn'")?>
</div>
<?php echo form_close(); ?>