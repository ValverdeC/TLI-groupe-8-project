<?php
/* Smarty version 3.1.30, created on 2018-04-25 07:52:13
  from "C:\wamp64\www\acuponture\src\app\pages\home\home.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ae033ad0ce349_58646603',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b45729f3f04fd175bee7f337f52e95fdab1d5575' => 
    array (
      0 => 'C:\\wamp64\\www\\acuponture\\src\\app\\pages\\home\\home.html',
      1 => 1524642630,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ae033ad0ce349_58646603 (Smarty_Internal_Template $_smarty_tpl) {
?>

        <div class="container-fluid content">
            <form class="form-inline my-2 my-lg-0 w-100 searchbar-form">
                <input class="form-control mr-sm-2 searchbar" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>

        <table>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['code'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['nom'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['element'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['yin'];?>
</td>
                </tr>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        </table><?php }
}
