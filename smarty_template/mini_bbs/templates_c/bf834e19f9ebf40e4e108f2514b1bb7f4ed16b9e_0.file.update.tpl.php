<?php
/* Smarty version 3.1.29, created on 2016-02-24 14:59:37
  from "/Applications/MAMP/htdocs/smarty_template/mini_bbs/templates/update.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56cdb7490cb725_76112270',
  'file_dependency' => 
  array (
    'bf834e19f9ebf40e4e108f2514b1bb7f4ed16b9e' => 
    array (
      0 => '/Applications/MAMP/htdocs/smarty_template/mini_bbs/templates/update.tpl',
      1 => 1456322375,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56cdb7490cb725_76112270 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
		<div class="page-header">
	  	<h1><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h1>
		</div>
		<form class="form-horizontal" id="frmInput" action="" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<div class="col-sm-8 col-sm-offset-2">
					<?php if (count($_smarty_tpl->tpl_vars['errors']->value) > 0) {?>
			      <ul>
							<?php
$_from = $_smarty_tpl->tpl_vars['errors']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_error_0_saved_item = isset($_smarty_tpl->tpl_vars['error']) ? $_smarty_tpl->tpl_vars['error'] : false;
$_smarty_tpl->tpl_vars['error'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['error']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['error']->value) {
$_smarty_tpl->tpl_vars['error']->_loop = true;
$__foreach_error_0_saved_local_item = $_smarty_tpl->tpl_vars['error'];
?>
								<p><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</p>
							<?php
$_smarty_tpl->tpl_vars['error'] = $__foreach_error_0_saved_local_item;
}
if ($__foreach_error_0_saved_item) {
$_smarty_tpl->tpl_vars['error'] = $__foreach_error_0_saved_item;
}
?>
			      </ul>
			    <?php }?>
					<input type="text" rows="5" name="message" class="form-control" id="message" value="<?php echo $_smarty_tpl->tpl_vars['message']->value['message'];?>
">
				</div>
			</div>
	  	<div class="form-group">
	    	<div class="col-sm-offset-2 col-sm-8">
	      	<input type="submit" value="変更" class="btn btn-primary">
	    	</div>
	  	</div>
		</form>
		<br>
	</div>
    <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="js/bootstrap.min.js"><?php echo '</script'; ?>
>
  </body>
</html><?php }
}
