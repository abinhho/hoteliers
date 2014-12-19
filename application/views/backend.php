<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="vi">
<head>
   	<title><?php echo $title; ?> ::.. CMS HDweb.vn v2.1</title>
   	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
   	<?php echo $_styles; ?>
   	<?php echo $_scripts; ?>
   	</head>
<body>
<?php if($backend_login_form == "" ){ ?>
<div class="div_main">
<table class="main_table no_bg" cellspacing="0" cellpadding="0">
		<tr>
			<td colspan="2">
			<?php echo $header; ?>
			<div class="menu_ngang_admin after"><?php echo $nav_menu; ?></div>
			</td>
		</tr>
</table>
	<div class="shadow_bg">
		<table class="main_table" cellspacing="0" cellpadding="0">
		<tr>
			<td class="col_a" valign="top">
				<?php echo $left_menu; ?>
			</td>
			<td class="col_b" valign="top">
				<h1 class="title"><?php echo $title ?></h1>
				<?php 
					if(!is_array($content) )
					echo $content;
					else 
					{
						print ($content);
						echo $content;
					} 

				?>
			</td>
		</tr>
		</table>
	</div>

</div>
<?php } else echo $backend_login_form ?>


<div class="footer_admin" align = "center">
	<h3 class="block">Contact: <b>01.655.177.655</b></h3>
	Email: <a href="#" class="blue">thanhbinhbk88@gmail.com</a>
</div>
<?php
$notice = $this->lib_url->get_notice();
if(!empty($notice)): ?>
<script type="text/javascript">
alert("<?php echo $notice; ?>");
</script>
<?php endif; ?>

<?php $this->load->view("iframe/promt"); ?>

</body>
</html>