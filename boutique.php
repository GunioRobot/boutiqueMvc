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
    include_once('control/boutique/admin/index.php');
}
else
{
    include_once('control/boutique/index.php');
}