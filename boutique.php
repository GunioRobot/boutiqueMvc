<?php
session_start();
include_once('modele/connexion_sql.php');

$produitsParPage = 3;

if(isset($_GET['top']))
{
    include_once('control/boutique/listeTop.php');
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
elseif(isset($_GET['op']) AND $_GET['op'] == 'achat' AND isset($_GET['produit']))
{
    include_once('control/boutique/achat.php');
}
elseif(isset($_GET['op']) AND $_GET['op'] == 'achat-envoi')
{
    include_once('control/boutique/achatEnvoi.php');
}
elseif (isset($_GET['produit']))
{
    include_once('control/boutique/fiche.php');
}
//admin
elseif (isset($_GET['admin']))
{
    switch ($_GET['admin']) {
    case 'produit-edit': include_once('control/boutique/admin/produit-edit.php'); break;
    case 'produit-del': include_once('control/boutique/admin/produit-del.php'); break;
    case 'achat': include_once('control/boutique/admin/achat.php'); break;
    case 'categorie': include_once('control/boutique/admin/categorie.php'); break;
    case 'del': include_once('control/boutique/admin/delete.php'); break;

    default: include_once('control/boutique/admin/index.php'); break;
    }    
}
else
{
    include_once('control/boutique/index.php');
}