<?php include("functions.php"); checkLogin();

    if(!isset($_POST['nom']) OR !isset($_POST['prenom']) OR !isset($_POST['adresse']) OR !isset($_POST['mail']) OR !isset($_POST['codepostal']) OR !isset($_POST['ville']) OR !isset($_POST['pays'])){
        $js = false; $redirect[0] = 'membre.php?op=panel'; $redirect[1] = '1';
        $page = 'membre-panel'; $titreErreur = 'espace membre -- erreur';
        $erreur = 'Erreur : champ non défini<br />Impossible de répondre à votre requète';
        include_once('vue/erreur.php'); die;
    }

    if(!$_SESSION['login']){
        $js = false; $redirect[0] = 'membre.php?op=login'; $redirect[1] = '1';
        $page = 'membre-panel'; $titreErreur = 'espace membre - erreur';
        $erreur = 'Vous n\'êtes pas connecté, impossible d\'accéder à l\'espace membre !';
        include_once('vue/erreur.php'); die;
    }

    include_once('modele/membre/panel_updateDatas.php');
    include_once('modele/membre/selectID-pseudoMembre.php');

    //on conditionne l'envoi des infos par la variable send
        
        //la fonction errorEmpty va ensuite renvoyer $send = 0 si il y a une erreur et afficher les erreurs, sinon $send = 1
        $send[] = verificationFormulaire($_POST['nom'], $rgxNom, 'Erreur dans votre nom', false); //vérification de la valeur nom
        $send[] = verificationFormulaire($_POST['prenom'], $rgxNom, 'Erreur dans votre prénom', false); //vérification de la valeur prénom
        $send[] = verificationFormulaire($_POST['adresse'], $rgxAdresse, 'Erreur dans votre adresse', false); //vérification de la valeur adresse
        $send[] = verificationFormulaire($_POST['mail'], $rgxMail, 'Erreur dans votre adresse email', false); //vérification de la valeur mail
        $send[] = verificationFormulaire($_POST['codepostal'], $rgxPostal, 'Erreur dans votre code postal', false); //vérification de la valeur code postal
        $send[] = verificationFormulaire($_POST['ville'], $rgxNom, 'Erreur dans votre ville', false); //vérification de la valeur ville
        $send[] = verificationFormulaire($_POST['pays'], $rgxNom, 'Erreur dans votre pays', false); //vérification de la valeur pays

        $envoi = 1;
        foreach($send as $element)
        {
            if($element != '')
            {
                $envoi = 0; break;
            }
        }



        if($envoi == 1){
            updateInfosPerso($_SESSION['ID'], $_POST['nom'], $_POST['prenom'], $_POST['mail'], $_POST['adresse'], $_POST['codepostal'], $_POST['ville'], $_POST['pays']);

            if(($_POST['changePassword'] != '') OR ($_POST['changePassword2'] != '')){
                $envoi2 = 1;

                //vérification du password
                $send[] = verificationFormulaire($_POST['changePassword'], $rgxPassword, 'Erreur dans votre mot de passe. Les modifications de profil ont été envoyés mais votre mot de passe n\'a pas été modifié !', false);
                //vérif correspondance password 1 & 2
                if($_POST['changePassword'] != $_POST['changePassword2']){
                    $send[] = 'Les deux nouveaux mots de passe ne correspondent pas. Les modifications de profil ont été envoyés mais votre mot de passe n\'a pas été modifié !';
                }
                //vérif old password
                $passwordOld = sha1($_POST['changePasswordOld']);
                $verifOldPwdArray = selectIDmembre($_SESSION['pseudo'], $passwordOld);
                if(!$verifOldPwdArray){
                    $send[] = 'Erreur dans votre ancien mot de passe. Les modifications de profil ont été envoyés mais votre mot de passe n\'a pas été modifié !';
                }

                foreach($send as $element)
                {
                    if($element != '')
                    {
                        $envoi2 = 0; break;
                    }
                }

                if($envoi2 == 1){
                    //on crypte le mot de passe si le champs a été correctement rempli
                    $password = sha1($_POST['changePassword']);
                    include_once('modele/membre/panel_updatePassword.php');
                    updatePassword($_SESSION['ID'], $password);
                }
            }
        }

include_once('vue/membre/panelEnvoi.php');