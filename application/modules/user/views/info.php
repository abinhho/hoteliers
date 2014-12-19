<div class="user_form mod_user">
<h1 class="title_view_questions f_font1"><?php echo $full_name; ?>
<?php if($this->lib_auth->check_permission($ID)){ ?>
<a class="right" href="<?php echo base_url('user/edit/'.$ID) ?>"><i class="fa fa-pencil"></i> chỉnh sửa thông tin</a>
<?php } ?>
</h1>
<div class="d2_col_equa after">

<div class="col_1">
    <table width="100%" cellpadding="4">
        <tr>
            <td rowspan="100" width="10px" class="tcenter pd_right_10" valign="top">
            <div  class="full_user_info">
            <?php $hinh_anh = $this->lib_media->show_crop("user" ,$images, 128, 128); ?>
            <img border="0" class="main"  alt="<?php echo $full_name; ?>" src="<?php echo $hinh_anh ; ?>" />
            <br />
            <!--div class="score_info">
                <span class="score_" t_title="Danh tiếng"><i class="sprites score"></i><?php //echo $score ?></span>
                <span class="question_"  t_title="Đã hỏi"><i class="sprites question"></i><?php //echo $n_questions ?></span>
                <span class="answer_"  t_title="Đã trả lời"><i class="sprites answer"></i><?php //echo $n_answers ?></span>
            </div-->
            </div>
            </td>
            <td class="gray" width="100px">Họ tên</td>
            <td><?php echo $full_name; ?></td>
        </tr>
        <?php if($this->lib_auth->check_permission($ID)){ ?>
        <tr>
            <td class="gray">Email</td>
            <td><a href="mailto:<?php echo $email ?>"><?php echo $email ?></a></td>
        </tr>
        <?php } ?>
        <tr>
            <td  class="gray">Học vấn</td>
            <td><?php echo $edu; ?></td>
        </tr>
         <tr>
            <td  class="gray">Nghề nghiệp</td>
            <td><?php echo $job; ?></td>
        </tr>
         <tr>
            <td  class="gray">Sinh nhật</td>
            <td><?php  echo $this->lib_date->re_format($birthday, "d-m-Y"); ?></td>
        </tr>
         <tr >
            <td class="gray">Địa chỉ</td>
            <td><?php echo $address; ?></td>
        </tr>
         <tr >
            <td class="gray">Website</td>
            <td><?php echo $website; ?></td>
        </tr>
         <tr>
            <td class="gray">Điện thoại</td>
            <td><?php echo $phone; ?></td>
        </tr>
    </table>
</div>
<div class="col_2">
    <?php $about = ($about == "") ? "<i class='gray'>Chưa có mô tả nào !</i>" : $about ?>
    <div class="user_description"><?php echo $about; ?></div>
</div>

</div>
<br />

<?php 
$data_filter = array(
'title' => 'Thông tin thành viên'
,'tabs' => 
    array('' => 'tất cả'
    //,'question' => 'câu hỏi'
    ,'topics' => 'Sản phẩm'
    //,'bookmark' => 'đánh dấu'
    )
,'name_order' => 'usertab'
,'hash' => 'user_tab'
); 

if($this->session->userdata('ID')){
    $data_filter['tabs']['notes'] = 'thông báo';
}

$this->load->view('ext_filter/tab_questions', $data_filter);

echo "<br />";

$tab = $this->lib_url->_GET('usertab');
if($tab == "" || $tab == 'all')
$this->load->view('info/info_2_col');
else
$this->load->view('info/info_'.$tab);
?>


 </div>
