<?php if($envoi){$redirect[0]= 'news.php?id='.$_POST['ID_news']; $redirect[1]='2'; } else {$redirect = false;}
printHeader('accueil', $redirect, 'news : envoi d\'un commentaire', true); ?>
            <div id="envoi" class="block-middle">
                <div class="head-block">envoi d'un commentaire</div><br />
<?php
    $ok = printErreur($send);
    if ($ok == 0){ ?>
                <br /><br />
                <div style="text-align:center;">
                    <a href="javascript:history.go(-1)">[ Corriger votre envoi ? ]</a> ||
                    <a href="index.php">[ Page d'accueil ]</a>
                </div><?php
    }?>
                <br /><br />
            </div>
<?php printFooter(); ?>
