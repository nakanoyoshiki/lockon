<?php
/* Smarty version 3.1.29, created on 2016-02-24 14:41:53
  from "/Applications/MAMP/htdocs/smarty_template/mini_bbs/templates/index.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56cdb32160d562_52626438',
  'file_dependency' => 
  array (
    'c2aadfad4dc2ff10b681e2876e248abd6f5a977d' => 
    array (
      0 => '/Applications/MAMP/htdocs/smarty_template/mini_bbs/templates/index.tpl',
      1 => 1456321312,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56cdb32160d562_52626438 ($_smarty_tpl) {
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
			<?php ob_start();
echo $_SESSION['id'];
$_tmp1=ob_get_clean();
if ((!isset($_tmp1))) {?>
				<div class="pull-right"><a href ="login.php">ログイン</a></div>
			<?php }?>
			<div class="pull-right"><button type="button" class="btn pull-right">
				<a href ="logout.php">ログアウト</a></button></div>
			</div>
			<form class="form-horizontal" id="frmInput" action="index.php" method="post" enctype="multipart/form-data">
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
								<?php echo $_smarty_tpl->tpl_vars['error']->value;?>

							<?php
$_smarty_tpl->tpl_vars['error'] = $__foreach_error_0_saved_local_item;
}
if ($__foreach_error_0_saved_item) {
$_smarty_tpl->tpl_vars['error'] = $__foreach_error_0_saved_item;
}
?>
			      </ul>
			    	<?php }?>
						<?php if ((!empty($_smarty_tpl->tpl_vars['member']->value['name']))) {?>
							<h3><?php echo $_smarty_tpl->tpl_vars['member']->value['name'];?>
さん、今どうしてる？</h3>
						<?php }?>
						<textarea type="text" rows="5" name="message" class="form-control" id="message" ></textarea>
					</div>
				</div>
	  		<div class="form-group">
	    		<div class="col-sm-offset-2 col-sm-8">
	      		<input type="submit" value="投稿" class="btn btn-primary">
	    		</div>
	  		</div>
			</form>
			<div class="col-sm-offset-2 col-sm-8">
				<?php
$_from = $_smarty_tpl->tpl_vars['posts']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_post_1_saved_item = isset($_smarty_tpl->tpl_vars['post']) ? $_smarty_tpl->tpl_vars['post'] : false;
$_smarty_tpl->tpl_vars['post'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['post']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['post']->value) {
$_smarty_tpl->tpl_vars['post']->_loop = true;
$__foreach_post_1_saved_local_item = $_smarty_tpl->tpl_vars['post'];
?>
			 	<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">
							<p> <?php echo $_smarty_tpl->tpl_vars['post']->value['name'];?>
 </p>
							<small class="pull-right"><p> <?php echo $_smarty_tpl->tpl_vars['post']->value['created'];?>
 </p></small>
						</h3>
					</div>
					<div class="panel-body">
						<?php ob_start();
echo $_smarty_tpl->tpl_vars['post']->value['member_id'];
$_tmp2=ob_get_clean();
if ($_smarty_tpl->tpl_vars['member']->value['id'] == $_tmp2) {?>
							<button type="button" class="btn btn-danger btn-xs pull-right">
								<a href="delete.php?id=<?php echo $_smarty_tpl->tpl_vars['post']->value['id'];?>
" onclick="return confirm('削除していいですか？');">削除</a>
							</button>
							<button type="button" class="btn btn-warning btn-xs pull-right">
								<a href="update.php?id=<?php echo $_smarty_tpl->tpl_vars['post']->value['id'];?>
">編集</a>
							</button>
						<?php }?>
						<p> <?php echo $_smarty_tpl->tpl_vars['post']->value['message'];?>
 </p>
					</div>
				</div>
				<?php
$_smarty_tpl->tpl_vars['post'] = $__foreach_post_1_saved_local_item;
}
if ($__foreach_post_1_saved_item) {
$_smarty_tpl->tpl_vars['post'] = $__foreach_post_1_saved_item;
}
?>
				</div>
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
