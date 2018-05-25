<?php
/* Smarty version 3.1.30, created on 2018-05-25 19:39:29
  from "C:\wamp64\www\acuponture\src\app\pages\home\home.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5b086671cee0d8_77749278',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b45729f3f04fd175bee7f337f52e95fdab1d5575' => 
    array (
      0 => 'C:\\wamp64\\www\\acuponture\\src\\app\\pages\\home\\home.html',
      1 => 1527277162,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b086671cee0d8_77749278 (Smarty_Internal_Template $_smarty_tpl) {
?>

        <div class="container-fluid content">
            <div id="connexionBox" class="card connexion">
                <h5 class="card-header">Connexion</h5>
                <div class="card-body">
                        <form class="px-4 py-3">
                            <div class="form-group">
                                <label for="exampleDropdownFormEmail1">Adresse Email</label>
                                <input type="email" class="form-control" id="exampleDropdownFormEmail1" placeholder="email@exemple.com">
                            </div>
                            <div class="form-group">
                                <label for="exampleDropdownFormPassword1">Mot de passe</label>
                                <input type="password" class="form-control" id="exampleDropdownFormPassword1" placeholder="Mot de passe">
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Envoyer</button>
                            </div>
                        </form>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Nouveau ici ? Créez vous un compte !</a>
                </div>
            </div>
        </div>

        <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.1.1.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src="src/app/pages/home/home.js"><?php echo '</script'; ?>
>

        <!--table>
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

        </table-->

        <?php }
}
