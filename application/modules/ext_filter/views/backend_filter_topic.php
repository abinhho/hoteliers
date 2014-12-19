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
	"" => "---"
	,"the_code" => "Mã số"
	,"tieu_de" => "Tiêu đề"
	,"noi_dung" => "Nội dung"
	,"keywords" => "Từ khóa (keywords)"
	);
?>
<?php echo form_open('ext_filter') ;?>
<label >Chọn chuyên mục: </label>
<?php echo $form_dropdown_by_module; ?>

<label class='label_checkbox'>Tìm kiếm theo: </label>
<?php echo form_dropdown('db_col_search', $db_col_list, $this->lib_url->_GET('db_col_search') ); ?>

<label class='label_checkbox'>Số bài viết hiển thị: </label>
<?php echo form_dropdown('per_page', $per_page_list, $this->lib_url->_GET('per_page') ); ?>

<p class='mg_top_10'><label>Từ khóa tìm kiếm: </label>
<?php echo form_input('q', $this->lib_url->_GET('q'), $style_input_small); ?>

<?php echo form_submit('submit_filter', "Tìm kiếm", "class='mg_left_10'"); ?>

<i>Từ khóa có thể để trống.</i></p>

<?php echo form_close(); ?>