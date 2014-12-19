<ul class="head_account">
<?php if($this->session->userdata("email")=="")
{
?>

<li><a href="<?php echo base_url("user/login") ?>" >Đăng ký</a></li>

<li><a href="<?php echo base_url("user/login") ?>" >Đăng nhập</a></li>

<?php }
else
{
 ?>
<li><b><a href="<?php echo base_url("user/".$this->session->userdata("ID")); ?>"><?php echo $this->session->userdata("full_name");?></a></b></li>

 <?php if($this->session->userdata("level") == 2){ ?>
<li><a href="<?php echo base_url("admin"); ?>" target="_blank">Manage</a></li>
<?php } ?>

<li><a href="<?php echo base_url("user/logout"); ?>"><?php echo __('Thoát')?></a></li> 
 <?php } // print_r ($this->cart->contents()) ; ?>
</ul>
<?php echo frontend_select_lang() ?>