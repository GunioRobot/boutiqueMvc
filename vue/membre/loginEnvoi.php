<?php if($envoi == 1){ printHeader('membre-login', 'membre.php?op=panel', 'connexion en cours ...', true); }
else{printHeader('membre-login', false, 'connexion', true);} ?>
            <div id="login-envoi" class="block-middle">
                <div class="head-block">connexion en cours ...</div><br />
<?php
    $ok = printErreur($send);
    if ($ok == 0){ ?>
                <br /><br />
                <div style="text-align:center;">
                    <a href="membre.php?op=login">[ Corriger votre envoi ? ]</a> ||
                    <a href="index.php">[ Page d'accueil ]</a>
                </div><?php
    }?>
                <br /><br />
            </div>
<?php printFooter(); ?>
