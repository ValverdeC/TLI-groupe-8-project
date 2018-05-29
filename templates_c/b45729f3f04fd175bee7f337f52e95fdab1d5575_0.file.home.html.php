<?php
/* Smarty version 3.1.30, created on 2018-05-29 11:09:50
  from "C:\wamp64\www\acuponture\src\app\pages\home\home.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5b0d34fea97af8_97898485',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b45729f3f04fd175bee7f337f52e95fdab1d5575' => 
    array (
      0 => 'C:\\wamp64\\www\\acuponture\\src\\app\\pages\\home\\home.html',
      1 => 1527592188,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b0d34fea97af8_97898485 (Smarty_Internal_Template $_smarty_tpl) {
?>

        <div id="home-img">
            <div class="container-fluid home-content">
                <?php if (empty($_smarty_tpl->tpl_vars['userSession']->value)) {?>
                    <div id="connexionBox" class="card connexion">
                        <h5 class="card-header">Connexion</h5>
                        <div class="card-body">
                                <form id="connexionForm" class="px-4 py-3">
                                    <div class="form-group">
                                        <label for="connexionEmail">Adresse Email</label>
                                        <input type="email" class="form-control" id="connexionEmail" placeholder="email@exemple.com">
                                    </div>
                                    <div class="form-group">
                                        <label for="connexionPwd">Mot de passe</label>
                                        <input type="password" class="form-control" id="connexionPwd" placeholder="Mot de passe">
                                    </div>
                                </form>
                                <div class="text-right">
                                    <button id="sendCredentials" type="button" class="btn btn-primary">Envoyer</button>
                                </div>
                                <div class="dropdown-divider"></div>
                                <button type="button" class="new-account-btn btn btn-outline-primary w-100" data-toggle="modal" data-target="#modalInscription">Nouveau ici ? Créez vous un compte !</button>
                        </div>
                    </div>
                    <div class="modal fade" id="modalInscription" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Inscription</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="userForm">
                                        <div class="form-group">
                                            <label for="pseudonyme" class="col-form-label">Pseudonyme</label>
                                            <input type="text" class="form-control" id="pseudonyme" placeholder="Pseudonyme">
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="col-form-label">Adresse Email</label>
                                            <input type="text" class="form-control" id="email" placeholder="email@exemple.com">
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="col-form-label">Mot de passe</label>
                                            <input type="password" class="form-control" id="password" placeholder="Mot de passe">
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                    <button id="createUserBtn" type="button" class="btn btn-primary">Créer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <div id="member-card" class="card border-primary mb-3">
                        <div class="card-header">Espace Membre de PathoFinder</div>
                        <div class="card-body text-primary">
                            <h5 class="card-title">Bienvenue <?php echo $_smarty_tpl->tpl_vars['userSession']->value->getName();?>
 !</h5>
                            <p class="card-text">Vous avez désormais accès à la recherche de pathologie par saisie de symptôme(s)</p>
                        </div>
                    </div>
                    <div id="presentation-card" class="card text-white bg-secondary mb-3">
                        <div class="card-header">Qu'est-ce que PathoFinder ?</div>
                        <div class="card-body">
                                <p class="card-text">Vous avez accès sur ce site à une base de données d'un grand nombre de pathologies en acuponcture. À chacune d'entre elles est associé une liste des symptômes connu.</p>
                                <p class="card-text">Il est possible de filtrer cette liste par Méridien, Type ou Caractéristique. En vous créant un compte, vous avez la possibilité de filtrer en saisisant un ou plusieurs symptômes</p>
                            <div class="text-right">
                                <a href="pathologies" class="btn btn-primary">Trouver une pathologie !</a>
                            </div>
                        </div>
                    </div>
                <?php }?>
            </div>
        </div>
        

        <div id="alert-placeholder"></div>

        <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.1.1.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src="src/app/pages/home/home.js"><?php echo '</script'; ?>
>        <?php }
}
