<?php printHeader('admin', false, 'administration : envoi d\'une édition de profil membre', true); ?>
            <div id="admin-envoi" class="block-middle">
                <div class="head-block">édition du profil membre de : <?php echo $_POST['pseudo']; ?></div><br />
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