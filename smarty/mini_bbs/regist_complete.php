<?php
session_start();
ini_set( 'display_errors', 1 );
require('dbconnect.php');
require_once('Smarty/libs/Smarty.class.php');
require('smarty.php');
$smarty->assign("title", "会員登録完了");
$smarty->assign('_SEESION' , $_SESSION);
$smarty->display('regist_complete.tpl')
?>