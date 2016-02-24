<?php
/* Smarty version 3.1.29, created on 2016-02-24 15:17:26
  from "/Applications/MAMP/htdocs/smarty_template/mini_bbs/templates/regist_confirm.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56cdbb76d8e022_01772421',
  'file_dependency' => 
  array (
    'b6327aefd4c648f3e8e719444da153abf95fd277' => 
    array (
      0 => '/Applications/MAMP/htdocs/smarty_template/mini_bbs/templates/regist_confirm.tpl',
      1 => 1456323438,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56cdbb76d8e022_01772421 ($_smarty_tpl) {
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
		<form class="form-horizontal"  action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="action" value="=submit" />
			<div class="form-group">
				<label class="col-sm-2 control-label">名前</label>
					<div class="col-sm-8">
						<?php echo $_smarty_tpl->tpl_vars['name']->value;?>

					</div>
			</div>
			<div class="form-group">
    		<label class="col-sm-2 control-label">メールアドレス</label>
    		<div class="col-sm-8">
          <?php echo $_smarty_tpl->tpl_vars['email']->value;?>

    		</div>
  		</div>
  		<div class="form-group">
    		<label  class="col-sm-2 control-label">パスワード</label>
    			<div class="col-sm-8">
						<p>表示することができません</p>
    			</div>
  		</div>
  		<div class="form-group">
    		<div class="col-sm-offset-2 col-sm-8">
					<div><a href="index.php?action=rewrite">&laquo;&nbsp;書き直す</a> |
            <button class="btn btn-default" value ="登録する" type="submit" value="登録する" />登録する</button>
          </div>
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
