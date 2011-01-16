<?php include("functions.php"); checkLogin(); verifUserIsAdmin();
include_once('modele/boutique/ajoutProduit.php');

if(isset($_POST['id'])){$op = 'update';} else {$op='new';}


$send[] = verificationFormulaire($_POST['titre'], $rgxTitre, 'Erreur dans le titre', false); //vérification de la valeur titre
$send[] = verificationFormulaire($_POST['auteur'], $rgxTitre, 'Erreur dans l\'auteur', false); //vérification de la valeur auteur
$send[] = verificationFormulaire($_POST['infos'], false, 'Erreur dans la description du produit', 'Description du produit'); //vérification de la valeur description
$send[] = verificationFormulaire($_POST['prix'], $rgxPrix, 'Erreur dans le prix', false); //vérification de la valeur prix
if($op == 'update'){
    $send[] = verificationFormulaire($_POST['achat'], $rgxNombre, 'Erreur dans le nombre d\'achats', false);
    $send[] = verificationFormulaire($_POST['id'], $rgxNombre, "Erreur dans le numéro du produit. Merci de ne pas modifier cette valeur", false);
}

$envoi = 1;
foreach($send as $element)
{
    if($element != '')
    {
        $envoi = 0; break;
    }
}

if ($envoi == 1 AND $op == 'update')
{
    updateProduit($_POST['id'], $_POST['titre'], $_POST['auteur'], $_POST['website'], $_POST['infos'], $_POST['categorie'], $_POST['image'], $_POST['achat'], $_POST['prix']);

}
elseif ($envoi == 1 AND $op == 'new')
{
    ajoutProduit($_POST['titre'], $_POST['auteur'], $_POST['infos'], $_POST['website'], $_POST['image'], $_POST['categorie'], $_POST['prix']);
}

include_once('vue/boutique/admin/produit-envoi.php');