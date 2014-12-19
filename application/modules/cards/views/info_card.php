<div class="like_tr after"><label>Họ tên : </label>
<div class="td"><span class="text"><?php echo $full_name?></span></div>
</div>

<div class="like_tr after"><label>Email : </label>
<div class="td"><span class="text"><?php echo $email?></span></div>
</div>


<div class="like_tr after"><label>Điện thoại : </label>
<div class="td"><span class="text"><?php echo $phone?></span></div>
</div>


<div class="like_tr after"><label>Địa chỉ : </label>
<div class="td"><span class="text"><?php echo $address?></span></div>
</div>


<div class="like_tr after"><label>Số CMND : </label>
<div class="td"><span class="text"><?php echo $cmnd?></span></div>
</div>


<div class="like_tr after"><label>Ngày hết hạn : </label>
<div class="td"><span class="text"><?php echo date('d/m/Y', strtotime($expiry_date)); ?></span></div>
</div>

