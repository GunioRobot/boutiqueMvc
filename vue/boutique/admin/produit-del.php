<?php printHeader('admin', false, "administration : suppression du produit", true);  ?>
            <div id="admin-delete" class="block-middle">
                <div class="head-block">suppression du produit n°<?php echo $id; ?></div><br />
                <div style="text-align:center;">Produit correctement supprimé<br /><br />
                    <a href="boutique.php?admin=index">[ Retourner à la gestion des produits ]</a></div>
            </div>
<?php printFooter(); ?>