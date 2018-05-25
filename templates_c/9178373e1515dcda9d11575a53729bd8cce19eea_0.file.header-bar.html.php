<?php
/* Smarty version 3.1.30, created on 2018-05-25 22:33:19
  from "C:\wamp64\www\acuponture\src\app\pages\header-bar\header-bar.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5b088f2fba0f37_62224710',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9178373e1515dcda9d11575a53729bd8cce19eea' => 
    array (
      0 => 'C:\\wamp64\\www\\acuponture\\src\\app\\pages\\header-bar\\header-bar.html',
      1 => 1527287596,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b088f2fba0f37_62224710 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html lang="fr">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <link rel="stylesheet" href="src/app/pages/header-bar/header-bar.css">
        <link rel="stylesheet" href="src/app/pages/home/home.css">
        <link rel="stylesheet" href="src/app/pages/pathologies/pathologies.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <title>Projet TLI</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <span class="nav-link">PathoFinder</span>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="home">Home<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="pathologies">Pathologies<span class="sr-only">(current)</span></a>
                    </li>
                </ul>
                <?php if (isset($_smarty_tpl->tpl_vars['userSession']->value)) {?>
                    <button id="disconnectBtn" type="button" class="btn btn-danger">Déconnexion</button>
                <?php }?>
            </div>
        </nav>

        <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.1.1.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src="src/app/pages/header-bar/header-bar.js"><?php echo '</script'; ?>
><?php }
}
