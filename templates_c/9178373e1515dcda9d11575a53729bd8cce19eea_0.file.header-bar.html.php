<?php
/* Smarty version 3.1.30, created on 2018-05-29 11:17:23
  from "C:\wamp64\www\acuponture\src\app\pages\header-bar\header-bar.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5b0d36c36da522_70107238',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9178373e1515dcda9d11575a53729bd8cce19eea' => 
    array (
      0 => 'C:\\wamp64\\www\\acuponture\\src\\app\\pages\\header-bar\\header-bar.html',
      1 => 1527592634,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b0d36c36da522_70107238 (Smarty_Internal_Template $_smarty_tpl) {
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

        <title>PathoFinder</title>
    </head>
    <body>
        <nav id="header-bar" class="navbar navbar-expand-lg navbar-dark bg-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>     
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <span class="navbar-brand">PathoFinder</span>
                    </li>
                    <li id="home-link" class="nav-item">
                        <a class="nav-link" href="home">Home<span class="sr-only">(current)</span></a>
                    </li>
                    <li id="patho-link" class="nav-item">
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
