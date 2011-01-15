<?php printHeader('membre-logout', false, 'déconnexion', false);
echo '<script language="javascript">alert("Deconnexion ... \nVous êtes maintenant déconnecté. Cookies supprimés!")</script>';
echo '<script language="javascript">window.location = "index.php"</script>';

//dans le cas où l'utilisateur a désactivé le javascript, on affiche un message simple qui ne fait pas de redirection automatique ?>
<div id="logout" class="block-middle" style="text-align:center;">
                <div class="head-block">déconnexion</div><br />
                <strong>Vous êtes maintenant déconnecté!</strong> <br />
                La déconnexion volontaire a supprimé les cookies de re-connexion automatique. <br /><br />
                <a href="index.php">Accueil</a>
            </div>
<?php printFooter(false); ?>