<?php printHeader('contact', false, 'contactez-nous', true); ?>
            <div id="contact" class="block-middle">
                <div class="head-block">contactez-nous</div><br />
<?php
    $ok = printErreur($send);
    if ($ok == 0){ ?>
                <br /><br />
                <div style="text-align:center;">
                    <a href="contact.php">[ Corriger votre envoi ? ]</a> ||
                    <a href="index.php">[ Page d'accueil ]</a>
                </div><?php
    }?>
                <br /><br />
            </div>
<?php printFooter(false); ?>
