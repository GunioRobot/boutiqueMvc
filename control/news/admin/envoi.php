<?php include("functions.php"); checkLogin(); verifUserIsAdmin();
include_once ('modele/news/ajoutNews.php');


$send[] = verificationFormulaire($_POST['titre'], $rgxTitre, 'Erreur dans le titre', false);
if($_GET['admin'] == 'envoiUpdate'){
    $send[] = verificationFormulaire($_POST['auteur'], $rgxPseudo, 'Erreur dans l\'auteur du message', false);
    $send[] = verificationFormulaire($_POST['date'], $rgxDate, 'Erreur dans la date du message', false);
}
$send[] = verificationFormulaire($_POST['texte'], false, 'Erreur dans la description de la news', 'Texte de l\'actualité');

$envoi = 1;
foreach($send as $element)
{
    if($element != '')
    {
        $envoi = 0; break;
    }
}
if ($envoi == 1 AND $_GET['admin'] == 'envoiUpdate')
{
    updateNews($_POST['id'], $_POST['titre'], $_POST['auteur'], $_POST['date'], $_POST['texte']);
}
elseif ($envoi == 1 AND $_GET['admin'] == 'envoiNew')
{
    ajoutNews($_POST['titre'], $_SESSION['pseudo'], $_POST['texte']);
}

include_once('vue/news/admin/envoi.php');
