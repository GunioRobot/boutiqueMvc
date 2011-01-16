<?php printHeader('membre-register', false, 'inscription en cours ...', true); ?>
            <div id="inscription" class="block-middle">
                <div class="head-block">inscription en cours ...</div><br />
<?php
    $ok = printErreur($send);
    if ($ok == 0){ ?>
                <br /><br />
                <div style="text-align:center;">
                    <a href="membre.php?op=register">[ Corriger votre envoi ? ]</a> ||
                    <a href="index.php">[ Page d'accueil ]</a>
                </div><?php
    }?>
                <br /><br />
            </div>
<?php printFooter(); ?>
