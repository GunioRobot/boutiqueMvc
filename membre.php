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
elseif (isset($_GET['cat']))
{
    include_once('control/boutique/listeCategorie.php');
}
elseif (isset($_GET['alpha']))
{
    include_once('control/boutique/listeAlpha.php');
}
elseif (isset($_GET['op']) AND $_GET['op'] == 'listAll')
{
    include_once('control/boutique/listeAll.php');
}
elseif (isset($_GET['produit']))
{
    include_once('control/boutique/fiche.php');
}
else
{
    include_once('control/boutique/index.php');
}