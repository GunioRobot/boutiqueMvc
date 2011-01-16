<?php printHeader('admin', false, "administration : suppression du membre", true);  ?>
            <div id="admin-delete" class="block-middle">
                <div class="head-block">suppression du membre n°<?php echo $id; ?></div><br />
                <div style="text-align:center;">Membre correctement supprimé<br /><br />
                    <a href="membre.php?admin=index">[ Retourner à la gestion des membres ]</a></div>
            </div>
<?php printFooter(); ?>