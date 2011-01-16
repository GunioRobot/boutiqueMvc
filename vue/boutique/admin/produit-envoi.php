<?php printHeader('admin', false, 'administration : envoi d\'un produit', true); ?>
            <div id="admin-envoi" class="block-middle">
                <div class="head-block">envoi du produit : <?php echo $_POST['titre']; ?></div><br />
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
<?php printFooter(false); ?>