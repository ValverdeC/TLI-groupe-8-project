<?php
/* Smarty version 3.1.30, created on 2018-05-02 13:53:25
  from "C:\wamp64\www\acuponture\src\app\pages\symptoms\symptoms.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ae9c2d5818c71_82883187',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ae85fbe414df0d3739c049e8c82843ef9d8e35dc' => 
    array (
      0 => 'C:\\wamp64\\www\\acuponture\\src\\app\\pages\\symptoms\\symptoms.html',
      1 => 1525269201,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ae9c2d5818c71_82883187 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="container-fluid content">
    <h1>Symptômes</h1>
    <div id="accordion">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        Pathologies de méridien
                    </button>
                </h5>
            </div>
            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                    <table>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['symptoms']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                            <?php if ($_smarty_tpl->tpl_vars['item']->value['type'] == 'me' || $_smarty_tpl->tpl_vars['item']->value['type'] == 'mi') {?>
                                <tr>
                                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['symptom'];?>
</td>
                                </tr>
                            <?php }?>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                    </table>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Pathologies d’organe/viscère (tsang/fu)
                    </button>
                </h5>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="card-body">
                    <table>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['symptoms']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                            <?php ob_start();
echo substr($_smarty_tpl->tpl_vars['item']->value['type'],0,2);
$_prefixVariable1=ob_get_clean();
if ($_prefixVariable1 == 'tf') {?>
                                <tr>
                                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['symptom'];?>
</td>
                                </tr>
                            <?php }?>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                    </table>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingThree">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Pathologies des tendino-musculaires (jing jin)
                    </button>
                </h5>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                <div class="card-body">
                    <table>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['symptoms']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                            <?php if ($_smarty_tpl->tpl_vars['item']->value['type'] == 'j') {?>
                                <tr>
                                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['symptom'];?>
</td>
                                </tr>
                            <?php }?>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                    </table>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingFour">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                        Pathologie des branches (voies luo)
                    </button>
                </h5>
            </div>
            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                <div class="card-body">
                    <table>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['symptoms']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                            <?php ob_start();
echo substr($_smarty_tpl->tpl_vars['item']->value['type'],0,1);
$_prefixVariable2=ob_get_clean();
if ($_prefixVariable2 == 'l') {?>
                                <tr>
                                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['symptom'];?>
</td>
                                </tr>
                            <?php }?>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                    </table>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingFive">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseThree">
                        Pathologies des merveilleux vaisseaux
                    </button>
                </h5>
            </div>
            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                <div class="card-body">
                    <table>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['symptoms']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                            <?php ob_start();
echo substr($_smarty_tpl->tpl_vars['item']->value['type'],0,2);
$_prefixVariable3=ob_get_clean();
if ($_prefixVariable3 == 'mv') {?>
                                <tr>
                                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['symptom'];?>
</td>
                                </tr>
                            <?php }?>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div><?php }
}
