<style type="text/css">
.tree_imenua{ margin:10px;display:block;}
.tree_imenua ul{margin:0;padding:0}
.tree_imenua ul ul{padding-left:20px;}
.tree_imenua li label{cursor:pointer; padding-left:5px;}
.tree_imenua li:hover{background:none;}
.tree_imenua li.parent{font-weight:bold;}
.tree_imenua li.children{font-weight:normal;}
.tree_imenua li{list-style:none;margin:0;padding:2px 0;display:block;}
.tree_imenua li a{display:block;}

.tree_imenu li.active ul{display:block;}
.bold{font-weight:bold;color:#044B91;}
</style>
<div class="tree_imenua">
<?php echo $radio_select_menu; ?>
</div>