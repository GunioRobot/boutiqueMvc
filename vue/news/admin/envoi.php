<?php printHeader('admin', false, 'administration : envoi d\'une news', true); ?>
            <div id="admin-envoi" class="block-middle">
                <div class="head-block">envoi de la news : <?php echo $_POST['titre']; ?></div><br />
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
