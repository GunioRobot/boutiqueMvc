<?php include("functions.php"); checkLogin();
include_once('modele/contact/envoi.php');

    // PAGE DE RECEPTION DES DONNEES ENVOYES LORS D'UN ENVOI DE MESSAGE
    // Utilisation d'une variable send pour conditionner la validité des champs
    
    //la fonction errorEmpty va ensuite renvoyer $send = 0 si il y a une erreur et afficher les erreurs, sinon $send = 1

    $send[] = verificationFormulaire($_POST['nom'], $rgxNom, 'Erreur dans votre nom/prénom', false); //vérification de la valeur nom
    $send[] = verificationFormulaire($_POST['mail'], $rgxMail, 'Erreur dans votre adresse email', false); //vérification de la valeur mail
    $send[] = verificationFormulaire($_POST['message'], false, 'Erreur dans votre message', 'Écrivez votre message...'); //vérification de la valeur message

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

    // si tous les champs sont corrects, la variable send n'a pas été mise à 0, envoi des champs
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
        envoiMessage($_POST['nom'], $_POST['mail'], $_POST['website'], $_POST['message'], $_POST['note']);
        insertFlood($_SERVER['REMOTE_ADDR']);
    }
// On affiche la page (vue)
include_once('vue/contact/envoi.php');