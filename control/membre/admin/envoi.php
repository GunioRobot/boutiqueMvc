<?php include("functions.php"); checkLogin(); verifUserIsAdmin();
include_once('modele/membre/panel_updateDatas.php');


    if(!isset($_POST['nom']) OR !isset($_POST['prenom']) OR !isset($_POST['adresse']) OR !isset($_POST['mail']) OR !isset($_POST['codepostal']) OR !isset($_POST['ville']) OR !isset($_POST['pays'])){
        $js = false; $redirect[0] = 'membre.php?admin=index'; $redirect[1] = '1';
        $page = 'admin'; $titreErreur = 'administration ~ membre : erreur';
        $erreur = 'Erreur : champ non défini<br />Impossible de répondre à votre requète';
        include_once('vue/erreur.php'); die;
    }

    include_once('modele/membre/selectID-pseudoMembre.php');

    //on conditionne l'envoi des infos par la variable send

        //la fonction errorEmpty va ensuite renvoyer $send = 0 si il y a une erreur et afficher les erreurs, sinon $send = 1
        $send[] = verificationFormulaire($_POST['pseudo'], $rgxPseudo, 'Erreur dans le pseudo', false);
        $send[] = verificationFormulaire($_POST['nom'], $rgxNom, 'Erreur dans le nom', false);
        $send[] = verificationFormulaire($_POST['prenom'], $rgxNom, 'Erreur dans le prénom', false);
        $send[] = verificationFormulaire($_POST['adresse'], $rgxAdresse, 'Erreur dans l\'adresse', false);
        $send[] = verificationFormulaire($_POST['mail'], $rgxMail, 'Erreur dans l\'adresse email', false);
        $send[] = verificationFormulaire($_POST['codepostal'], $rgxPostal, 'Erreur dans le code postal', false);
        $send[] = verificationFormulaire($_POST['ville'], $rgxNom, 'Erreur dans la ville', false);
        $send[] = verificationFormulaire($_POST['pays'], $rgxNom, 'Erreur dans le pays', false);
        $send[] = verificationFormulaire($_POST['ID_membre'], $rgxNombre, 'Erreur dans l\'ID du membre. Veuillez ne pas modifier cette valeur !', false);
        if(isset($_POST['admin']) && $_POST['admin'] == 'on') {$admin = 1;} else {$admin = 0;}

        $envoi = 1;
        foreach($send as $element)
        {
            if($element != '')
            {
                $envoi = 0; break;
            }
        }



        if($envoi == 1){
            updateMembre($_POST['ID_membre'], $_POST['nom'], $_POST['prenom'], $_POST['mail'], $_POST['adresse'], $_POST['codepostal'], $_POST['ville'], $_POST['pays'], $admin);

            if(($_POST['changePassword'] != '') OR ($_POST['changePassword2'] != '')){
                $envoi2 = 1;

                //vérification du password
                $send[] = verificationFormulaire($_POST['changePassword'], $rgxPassword, 'Erreur dans le mot de passe. Les modifications de profil ont été envoyés mais votre mot de passe n\'a pas été modifié !', false);
                //vérif correspondance password 1 & 2
                if($_POST['changePassword'] != $_POST['changePassword2']){
                    $send[] = 'Les deux nouveaux mots de passe ne correspondent pas. Les modifications de profil ont été envoyés mais votre mot de passe n\'a pas été modifié !';
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
                    $password = sha1($_POST['changePassword']); echo $_POST['ID_membre']; echo $password;
                    include_once('modele/membre/panel_updatePassword.php');
                    updatePassword($_POST['ID_membre'], $password);
                }
            }
        }


include_once('vue/membre/admin/envoi.php');