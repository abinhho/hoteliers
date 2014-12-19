<?php 
echo form_open('news/create_search', 'id=form_search onsubmit=" if(this.q.value == \'\' ) return false; "');
?>
<div class="mod_news block_search">
<?php echo form_input('q', str_replace("+"," ",$this->lib_url->_GET('q')) , "placeholder = '".__('Từ khóa tìm kiếm')."...' class='q'"); ?>
<?php echo form_submit('submit', __('Tìm kiếm'), "class='submit btn'")?>
</div>
<?php echo form_close(); ?>