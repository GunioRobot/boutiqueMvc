<?php printHeader('admin', false, "administration : suppression de l'achat", true);  ?>
            <div id="admin-delete" class="block-middle">
                <div class="head-block">suppression de l'achat n°<?php echo $id; ?></div><br />
                <div style="text-align:center;">Achat correctement supprimé<br /><br />
                    <a href="boutique.php?admin=achat">[ Retourner à la gestion des achats ]</a></div>
            </div>
<?php printFooter(); ?>