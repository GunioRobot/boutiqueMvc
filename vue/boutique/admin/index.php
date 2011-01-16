<?php printHeader('admin', false, 'administration ~ boutique', false); ?>
            <div id="admin-boutique" class="block-middle">
                <div class="head-block">boutique</div><br />
                <div style="text-align:center;">
                    <a href="boutique.php?admin=index" class="active">[ Geston des produits ]</a> | <a href="boutique.php?admin=produit-add">[ Ajouter un produit ]</a> | <a href="boutique.php?admin=achat">[ Gestion des achats ]</a> | <a href="boutique.php?admin=categorie">[ Gestion des catégories ]</a>
                </div><br />
                <table style="width:100%; text-align:center;">
                <tr>
                    <td><strong>ID</strong></td>
                    <td><strong>Titre</strong></td>
                    <td><strong>Auteur</strong></td>
                    <td><strong>Catégorie</strong></td>
                    <td><strong>Editer</strong></td>
                    <td><strong>Supprimer</strong></td>
                </tr>
                <?php foreach($produitsArray as $produit){ ?>
                    <tr>
                        <td>(<?php echo htmlspecialchars($produit["ID"]); ?>)</td>
                        <td><?php echo htmlspecialchars($produit["titre"]); ?></td>
                        <td><?php echo htmlspecialchars($produit["auteur"]); ?></td>
                        <td><?php echo htmlspecialchars($produit["categorie"]); ?></td>
                        <td><a href="boutique.php?admin=produit-edit&amp;id=<?php echo $produit["ID"]; ?>" class="a-img"><img src="images/pencil.png" alt="[ ✏ éditer ]" /></a></td>
                        <td><a href="boutique.php?admin=produit-del&amp;id=<?php echo $produit["ID"]; ?>" class="a-img"><img src="images/cross.png" alt="[ ✖ supprimer ]" /></a></td>
                    </tr>
            <?php    } ?>
                </table>
            </div>
<?php paginationListPages($nbPages, $page, $url); printFooter(); ?>