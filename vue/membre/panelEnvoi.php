<?php printHeader('membre-panel', false, 'espace membre - envoi en cours ...', true); ?>
            <div id="panel-envoi" class="block-middle">
                <div class="head-block">envoi des modifications en cours ...</div><br />
<?php
    $ok = printErreur($send);
    if ($ok == 0){ ?>
                <br /><br />
                <div style="text-align:center;">
                    <a href="membre.php?op=panel">[ Corriger votre envoi ? ]</a> ||
                    <a href="index.php">[ Page d'accueil ]</a>
                </div><?php
    }?>
                <br /><br />
            </div>
<?php printFooter(false); ?>
