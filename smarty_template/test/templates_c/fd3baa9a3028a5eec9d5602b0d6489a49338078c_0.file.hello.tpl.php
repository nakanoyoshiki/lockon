<?php
/* Smarty version 3.1.29, created on 2016-02-24 08:40:58
  from "/Applications/MAMP/htdocs/smarty_template/test/templates/hello.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56cd5e8a46dfe6_73791067',
  'file_dependency' => 
  array (
    'fd3baa9a3028a5eec9d5602b0d6489a49338078c' => 
    array (
      0 => '/Applications/MAMP/htdocs/smarty_template/test/templates/hello.tpl',
      1 => 1456290402,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56cd5e8a46dfe6_73791067 ($_smarty_tpl) {
?>
<html>
<meta charset="utf-8">
こんにちは、<?php echo $_smarty_tpl->tpl_vars['Name']->value;?>
さん。
<ul>
<?php
$_from = $_smarty_tpl->tpl_vars['Fruits']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_item_0_saved_item = isset($_smarty_tpl->tpl_vars['item']) ? $_smarty_tpl->tpl_vars['item'] : false;
$__foreach_item_0_saved_key = isset($_smarty_tpl->tpl_vars['key']) ? $_smarty_tpl->tpl_vars['key'] : false;
$_smarty_tpl->tpl_vars['item'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['item']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
$__foreach_item_0_saved_local_item = $_smarty_tpl->tpl_vars['item'];
?>
    <li><?php echo $_smarty_tpl->tpl_vars['key']->value;?>
: <b><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</b></li>
<?php
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_0_saved_local_item;
}
if ($__foreach_item_0_saved_item) {
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_0_saved_item;
}
if ($__foreach_item_0_saved_key) {
$_smarty_tpl->tpl_vars['key'] = $__foreach_item_0_saved_key;
}
?>
</ul>
</html><?php }
}
