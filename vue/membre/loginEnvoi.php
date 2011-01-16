<?php if($envoi == 1){ $redirect[0]= 'membre.php?op=panel'; $redirect[1]='2';}
else{$redirect=false;}
printHeader('membre-login', $redirect, 'connexion', true); ?>
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
