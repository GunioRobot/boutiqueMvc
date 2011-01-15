<?php include("functions.php"); checkLogin();
//si l'utilisateur est déjà connecté, on ne va pas lui permettre de se ré-inscrire
    if($_SESSION['login']){
        $js = false; $admin= false; $page = 'membre-register'; $titreErreur = 'inscription - erreur';
        $erreur = 'Vous êtes déjà connecté, impossible de vous re-inscrire !';
        include_once('vue/erreur.php'); die;
    }
    if(!isset($_POST['pseudo']) OR !isset($_POST['mail']) OR !isset($_POST['password']) OR !isset($_POST['password2'])){
        $js = false; $admin= false; $page = 'membre-register'; $titreErreur = 'inscription - erreur'; 
        $erreur = 'Erreur : champ non défini<br />Impossible de répondre à votre requète';
        include_once('vue/erreur.php'); die;
    }

    include_once('modele/membre/register_inscription.php'); include_once('modele/membre/register_selectPseudoWithPseudo.php');
    include_once('modele/membre/selectID-pseudoMembre.php');

    $send[] = verificationFormulaire($_POST['pseudo'], $rgxPseudo, 'Erreur dans votre pseudonyme', false);
    $send[] = verificationFormulaire($_POST['mail'], $rgxMail, 'Erreur dans votre adresse e-mail', false);
    $send[] = verificationFormulaire($_POST['password'], $rgxPassword, 'Erreur dans votre mot de passe', false);
      require_once('recaptchalib.php');
  $privatekey = "6LeY-7kSAAAAAH4Jey7PnR2tbV1G3bmYhmIC2KJH";
  $resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

  if (!$resp->is_valid) {
    // What happens when the CAPTCHA was entered incorrectly
    $send[]= "Le code de sécurité n'a pas été rempli correctement. " .
         "(Veuillez ré-essayer. Erreur : " . $resp->error . ")";
  }

    //nous allons vérifier qu'un membre avec le même pseudo n'existe pas déjà dans la base de données
    $result = verifPseudoUsed($_POST['pseudo']);
    if ($result){
        $send[] = 'Pseudo déjà utilisé';
    }

    //si les deux mots de passe ne correspondent pas, on indique l'erreur correspondante
    if($_POST['password']!= $_POST['password2']){
        $send[] = 'Les deux mots de passe que vous avez saisi ne correspondent pas';
    }

    $envoi = 1;
    foreach($send as $element)
    {
        if($element != '')
        {
            $envoi = 0; break;
        }
    }
    if ($envoi == 1)
    {
        $password = sha1($_POST['password']);
        inscrireMembre($_POST['pseudo'], $password, $_POST['mail']);

        $infosMembresArray = selectIDmembre($_POST['pseudo'], $password);
        foreach($infosMembresArray as $infosMembre)
        {
            $_SESSION['ID'] = $infosMembre['ID'];
            $_SESSION['pseudo'] = $infosMembre['pseudo'];
            $_SESSION['login'] = true;
        }        
    }
    // On affiche la page (vue)
    include_once('vue/membre/registerEnvoi.php');

