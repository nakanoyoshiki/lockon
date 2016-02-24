<?php
session_start();
ini_set( 'display_errors', 1 );
require('dbconnect.php');
require_once('Smarty/libs/Smarty.class.php');

$smarty = new Smarty();
$smarty->template_dir = '../../smarty_template/mini_bbs/templates/';
$smarty->compile_dir = '../../smarty_template/mini_bbs/templates_c/';
$smarty->config_dir = '../../smarty_template/mini_bbs/configs/';
$smarty->cache_dir = '../../smarty_template/mini_bbs/cache/';
$smarty->assign("title", "会員登録完了");
$smarty->assign('_SEESION' , $_SESSION);
$smarty->display('regist_complete.tpl')
?>