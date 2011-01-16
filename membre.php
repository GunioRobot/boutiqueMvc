<?php
session_start();
include_once('modele/connexion_sql.php');


if(isset($_GET['op']))
{
    switch ($_GET['op']) {
        case 'login': include_once('control/membre/login.php'); break;
        case 'logout': include_once('control/membre/logout.php'); break;
        case 'loginEnvoi': include_once('control/membre/loginEnvoi.php'); break;
        case 'register': include_once('control/membre/register.php'); break;
        case 'registerEnvoi': include_once('control/membre/registerEnvoi.php'); break;
        case 'panel': include_once('control/membre/panel.php'); break;
        case 'panelEnvoi': include_once('control/membre/panelEnvoi.php'); break;
        default:
            break;
    }
}
elseif (isset($_GET['admin']))
{
    if(isset($_GET['id'])){$_GET['id'] = (int)$_GET['id'];}
    if($_GET['admin'] == 'del' AND isset($_GET['id'])){ include_once('control/membre/admin/del.php');}
    elseif($_GET['admin'] == 'edit' AND isset($_GET['id'])){ include_once('control/membre/admin/edit.php'); }

    else{include_once('control/membre/admin/index.php'); }
}
else
{
    $js = false; $admin= false; $page = 'membre'; $titreErreur = 'membre - erreur'; $erreur = 'Aucune information sur cette page!';
        include_once('functions.php'); include_once('vue/erreur.php'); die;
}