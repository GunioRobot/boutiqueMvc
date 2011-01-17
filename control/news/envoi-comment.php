<?php include("functions.php"); checkLogin();
include_once ('modele/news/ajoutComment.php');
include_once ('modele/membre/selectInfosMembre.php');

if(!isset($_POST['message']) OR !isset($_POST['ID_news'])){
    $js = false; $redirect[0] = 'javascript:history.go(-1)'; $redirect[1] = '1';
    $page = 'accueil'; $titreErreur = 'news - erreur';
    $erreur = 'Erreur : champ non défini<br />Impossible de répondre à votre requète';
    include_once('vue/erreur.php'); die;
}

$send[] = verificationFormulaire($_POST['ID_news'], $rgxNombre, "Erreur dans l'ID de la news. Veuillez ne pas toucher aux formulaires cachés. Merci", false);
$send[] = verificationFormulaire($_POST['message'], false, "Erreur dans le message", 'Écrivez votre message...');

if($_SESSION['login']){
    $_POST['pseudo'] = $_SESSION['pseudo'];
    $membreArray = selectInfosMembre($_SESSION['ID']);
    foreach($membreArray as $m){$_POST['mail'] = $m['mail'];}
}
else{
    $send[] = verificationFormulaire($_POST['pseudo'], $rgxPseudo, "Erreur dans votre pseudo", false);
    $send[] = verificationFormulaire($_POST['mail'], $rgxMail, "Erreur dans votre adresse e-mail", false);
}


    if(!$_SESSION['login']){
    //RECPATCHA
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
    }}

    //ENVOI FLOOD BDD
    $time = time();
    $previousTime = selectFlood($_SERVER['REMOTE_ADDR']) + 10;
    if($time <= $previousTime){
        $send[]= "Veuillez patientez avant l'envoi d'un nouveau message.";
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
        //envoi du message dans la base de données
        ajoutComment($_POST['ID_news'], $_POST['pseudo'], $_POST['message'], $_POST['mail']);
        insertFlood($_SERVER['REMOTE_ADDR']);
    }
// On affiche la page (vue)
include_once('vue/news/envoi-comment.php');