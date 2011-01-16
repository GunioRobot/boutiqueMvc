<?php include("functions.php"); checkLogin();

    if($_SESSION['login']){
        $js = false; $admin= false; $page = 'membre-login'; $titreErreur = 'connexion - erreur';
        $erreur = 'Vous êtes déjà connecté, impossible de vous re-connecté !';
        include_once('vue/erreur.php'); die;
    }

    if(!isset($_POST['pseudo']) OR !isset($_POST['password'])){
        $js = false; $admin= false; $page = 'membre-register'; $titreErreur = 'connexion - erreur';
        $erreur = 'Erreur : champ non défini<br />Impossible de répondre à votre requète';
        include_once('vue/erreur.php'); die;
    }

    include_once('modele/membre/register_selectPseudoWithPseudo.php'); include_once('modele/membre/selectID-pseudoMembre.php');

    $send[] = verificationFormulaire($_POST['pseudo'], $rgxPseudo, 'Erreur dans votre pseudonyme', false);
    $send[] = verificationFormulaire($_POST['password'], $rgxPassword, 'Erreur dans votre mot de passe', false);

    $envoi = 1;
    foreach($send as $element)
    {
        if($element != '')
        {
            $envoi = 0; break;
        }
    }
    if ($envoi == 1){
        $result = verifPseudoUsed($_POST['pseudo']);
        if (!$result){
        $send[] = 'Ce pseudonyme ne correspond à aucun membre inscris sur le site';
        $envoi = 0;
        }
    }


    if ($envoi == 1)
    {
        //cryptage du mot de passe avec l'algorithme SHA1 (plus sécurisé qu'un MD5)
        $password = sha1($_POST['password']);
        $infosMembresArray = selectIDmembre($_POST['pseudo'], $password);
        if (!$infosMembresArray){
            // aucun résultat n'a été trouvé, on affichera une erreur
            $send[]= 'Le couple identifiants/mots de passes ne correspondent à aucun utilisateur'; $envoi = 0;
        }
        else{
            foreach($infosMembresArray as $infosMembre)
            {
                $_SESSION['ID'] = $infosMembre['ID'];
                $_SESSION['pseudo'] = $infosMembre['pseudo'];
                $_SESSION['login'] = true;
            }
            // si le membre a choisi de rester connecté avec l'aide de cookies, on crée les cookies correspondant
            if(isset($_POST['connected']) AND ($_POST['connected'] == 'on')){
                // 2 cookies dans ce cas, contenant le pseudo et le mot de passe crypté. Disponible HTTPOnly pour éviter les hacks JS/XSS, expiration 1 an
                setcookie('pseudo', $infosMembre['pseudo'], time() + 365*24*3600, null, null, false, true);
                setcookie('sha1', $password, time() + 365*24*3600, null, null, false, true);
            }
        }
    }
    // On affiche la page (vue)
    include_once('vue/membre/loginEnvoi.php');