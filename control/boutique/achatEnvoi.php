<?php include("functions.php"); checkLogin();
include_once('modele/boutique/achatEnvoi.php');

    $send[] = verificationFormulaire($_POST['nom'], $rgxNom, 'Erreur dans votre nom', false); //vérification de la valeur nom
    $send[] = verificationFormulaire($_POST['prenom'], $rgxNom, 'Erreur dans votre prénom', false); //vérification de la valeur prénom
    $send[] = verificationFormulaire($_POST['adresse'], $rgxAdresse, 'Erreur dans votre adresse', false); //vérification de la valeur adresse
    $send[] = verificationFormulaire($_POST['mail'], $rgxMail, 'Erreur dans votre adresse email', false); //vérification de la valeur mail
    $send[] = verificationFormulaire($_POST['codepostal'], $rgxPostal, 'Erreur dans votre code postal', false); //vérification de la valeur code postal
    $send[] = verificationFormulaire($_POST['ville'], $rgxNom, 'Erreur dans votre ville', false); //vérification de la valeur ville
    $send[] = verificationFormulaire($_POST['pays'], $rgxNom, 'Erreur dans votre pays', false); //vérification de la valeur pays
    $send[] = verificationFormulaire($_POST['ID_produit'], $rgxNombre, 'Erreur dans votre n° de produit. Si cette erreur apparait, veuillez ne pas manipuler le code source ou <a href="contact.php">contacter l\'admin</a>. ', false); //vérification de la valeur ID_produit
    

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
    include_once('modele/boutique/getFiche.php');
        $produitArray = getFiche($_POST['ID_produit']);
    if ($envoi == 1)
    {
        //envoi du message dans la base de données
        envoiAchat($_SESSION['login'], $_POST['nom'], $_POST['prenom'], $_POST['mail'], $_POST['adresse'], $_POST['codepostal'], $_POST['ville'], $_POST['pays'], $_POST['ID_produit'], $_POST['note']);
        insertFlood($_SERVER['REMOTE_ADDR']);
        modifyNbAchat($_POST['ID_produit']);

        
        foreach($produitArray as $produit){
            if($_SESSION['login']){$prix = $produit['prix'] - (($produit['prix'])*10/100);}
            else {$prix = $produit['prix'];}
        $prix = round($prix, 2);
        }
    }



// On affiche la page (vue)
include_once('vue/boutique/achatEnvoi.php');