<?php
/* Smarty version 3.1.29, created on 2016-02-24 12:01:39
  from "/Applications/MAMP/htdocs/smarty_template/mini_bbs/templates/regist_complete.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56cd8d930831f2_21799541',
  'file_dependency' => 
  array (
    '215d9834d39c4038f8ca23dbfdb0bedad38b6604' => 
    array (
      0 => '/Applications/MAMP/htdocs/smarty_template/mini_bbs/templates/regist_complete.tpl',
      1 => 1456311697,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56cd8d930831f2_21799541 ($_smarty_tpl) {
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
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-8">
        <p>登録できました。ありがとうございます。</p>
      </div>
    </div>
  	<div class="form-group">
    	<div class="col-sm-offset-2 col-sm-8">
      	<button type="submit"  class="btn btn-default"><a href="login.php">ログインする</a></button>
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
