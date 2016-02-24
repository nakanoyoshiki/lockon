<?php
/* Smarty version 3.1.29, created on 2016-02-24 08:32:00
  from "/Applications/MAMP/htdocs/smarty/templates/test.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56cd5c70d28892_21173376',
  'file_dependency' => 
  array (
    'e3b396d40aee592d9e2279bca77bc178d3c0c599' => 
    array (
      0 => '/Applications/MAMP/htdocs/smarty/templates/test.tpl',
      1 => 1456298829,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56cd5c70d28892_21173376 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/Applications/MAMP/bin/php/php5.6.10/lib/php/Smarty/libs/plugins/modifier.date_format.php';
?>
今日は<?php echo smarty_modifier_date_format(time(),'%Y年%m月%d日');?>
です。
<?php }
}
