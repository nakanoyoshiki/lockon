<?php
/* Smarty version 3.1.29, created on 2016-02-24 11:10:40
  from "/Applications/MAMP/htdocs/smarty_template/mini_bbs/templates/regist_form.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56cd81a017d9c7_39531333',
  'file_dependency' => 
  array (
    '8562f482a62950b5eb243eb6ba1cf4ed8c453980' => 
    array (
      0 => '/Applications/MAMP/htdocs/smarty_template/mini_bbs/templates/regist_form.tpl',
      1 => 1456308366,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56cd81a017d9c7_39531333 ($_smarty_tpl) {
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
		<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label class="col-sm-2 control-label">名前</label>
					<div class="col-sm-8">
						<input type="text" name="name" class="form-control"  placeholder="name" value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" >
					</div>
			</div>
			<div class="form-group">
    		<label class="col-sm-2 control-label">メールアドレス</label>
    		<div class="col-sm-8">
      		<input type="email" name="email" class="form-control"  placeholder="Email" value="<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
">
    		</div>
  		</div>
  		 <div class="form-group">
    		<label class="col-sm-2 control-label">パスワード</label>
    			<div class="col-sm-8">
      			<input type="password" name="password" class="form-control"  placeholder="Password" value="<?php echo $_smarty_tpl->tpl_vars['password']->value;?>
">
    			</div>
  		</div>
  		<div class="form-group">
    		<div class="col-sm-offset-2 col-sm-8">
      		<button type="submit" value="入力内容を確認する" class="btn btn-default">確認</button>
    		</div>
  		</div>
		</form>
    <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="js/bootstrap.min.js"><?php echo '</script'; ?>
>
  </body>
</html><?php }
}
