<?php
/* Smarty version 3.1.29, created on 2016-02-24 09:04:10
  from "/Applications/MAMP/htdocs/smarty_template/test/templates/test.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56cd63facb8c35_34633410',
  'file_dependency' => 
  array (
    '9f2e7e54004b22bc84da357233652bae0f8e5ea3' => 
    array (
      0 => '/Applications/MAMP/htdocs/smarty_template/test/templates/test.tpl',
      1 => 1456300822,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56cd63facb8c35_34633410 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/Applications/MAMP/bin/php/php5.6.10/lib/php/Smarty/libs/plugins/modifier.date_format.php';
?>
<html>
<meta charset="utf-8">
今日は<?php echo smarty_modifier_date_format(time(),'%Y年%m月%d日');?>
です。
</html><?php }
}
