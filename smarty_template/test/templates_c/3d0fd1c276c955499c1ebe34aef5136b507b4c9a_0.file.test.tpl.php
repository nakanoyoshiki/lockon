<?php
/* Smarty version 3.1.29, created on 2016-02-24 08:27:32
  from "/Applications/MAMP/htdocs/test.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56cd5b64d72376_07160605',
  'file_dependency' => 
  array (
    '3d0fd1c276c955499c1ebe34aef5136b507b4c9a' => 
    array (
      0 => '/Applications/MAMP/htdocs/test.tpl',
      1 => 1456298848,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56cd5b64d72376_07160605 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/Applications/MAMP/bin/php/php5.6.10/lib/php/Smarty/libs/plugins/modifier.date_format.php';
?>
今日は<?php echo smarty_modifier_date_format(time(),'%Y年%m月%d日');?>
です。
<?php }
}
