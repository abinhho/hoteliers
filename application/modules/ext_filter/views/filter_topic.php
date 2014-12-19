<?php
$style_input_small = "style='width:250px'";
$style_input_larger = "style='width:500px'";

$per_page_list = array(
"15" => "15"
,"25" => "25"
,"50" => "50"
,"75" => "75"
,"100" => "100");
$db_col_list=array(
	"ID,DESC" => "Mới nhất"
	,"ID,ASC" => "Cũ nhất"
	,"tieu_de,ASC" => "Theo tên từ A-Z"
	,"tieu_de,DESC" => "Theo tên từ Z-A"
	,"rand," => "Ngẫu nhiên"
	);
$js = "onchange=\"change_urls('".base_url('ext_filter/ext_filter/sort_order/sort')."' , this)\"";

$coma = ($this->lib_url->_GET('order') == "") ? "" : ","; 

$val = $this->lib_url->_GET('sort').$coma.$this->lib_url->_GET('order');

$js1 = "onchange=\"change_urls('".base_url('ext_filter/ext_filter/sort_order/per_page')."' , this)\"";

$lists = array("list"=>"Danh sách","table" => "Bảng" );
      
?>
<div class="filter_topic after">
    
    <?php if(isset($has_display_list)): ?>
    <!--div class="left">
    <label>Hiển thị: </label>
    <?php  
    $get_display = $this->lib_url->_GET('display');
    
    $default = (!isset($default)) ? "list" : $default;
    
    foreach($lists as $val => $text)
    {
         $active = ""; 
         if($get_display == $val || ($get_display == "" && $default == $val) )
         {
         	$active = "class = 'active'";
         }
         echo "<a {$active} rel='nofollow' href='{$this->lib_url->change_url('',array('display'=>$val))}'>{$text}</a>";
    }
    ?>
    </div-->
    <?php endif; ?>
	<div class="right">
		<label >Sắp xếp theo: </label>
		<?php echo form_dropdown('db_col_search', $db_col_list, $val , $js ); ?>
		<!--label class='label_checkbox'>Hiển thị: </label-->
		<?php //echo form_dropdown('per_page', $per_page_list, $this->lib_url->_GET('per_page') , $js1); ?>
	</div>
</div>