<?php
require_once 'Smarty/libs/Smarty.class.php';
$smarty = new Smarty();
$smarty->template_dir = '../../smarty_template/test/templates/';
$smarty->compile_dir = '../../smarty_template/test/templates_c/';
$smarty->config_dir = '../../smarty_template/test/configs/';
$smarty->cache_dir = '../../smarty_template/test/cache/';
$smarty->assign("Name", "果物屋");
$smarty->assign("Fruits", array("みかん", "りんご", "バナナ"));
$smarty->display('hello.tpl');
?>