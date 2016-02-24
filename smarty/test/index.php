<?php
ini_set( 'display_errors', 1 );
require_once('Smarty/libs/Smarty.class.php');
$smarty = new Smarty();
$smarty->template_dir = '../../smarty_template/test/templates/';
$smarty->compile_dir = '../../smarty_template/test/templates_c/';
$smarty->config_dir = '../../smarty_template/test/configs/';
$smarty->cache_dir = '../../smarty_template/test/cache/';
$smarty->display('test.tpl');
?>