<?php printHeader('admin', false, 'administration ~ boutique', false); ?>
            <div id="admin-boutique" class="block-middle">
                <div class="head-block">catégorie</div><br />
                <div style="text-align:center;">
                    <a href="boutique.php?admin=index">[ Geston des produits ]</a> | <a href="boutique.php?admin=produit-add">[ Ajouter un produit ]</a> | <a href="boutique.php?admin=achat">[ Gestion des achats ]</a> | <a href="boutique.php?admin=categorie" class="active">[ Gestion des catégories ]</a>
                </div><br />
                <table style="width:100%; text-align:center;">
                <tr>
                    <td><strong>Nom</strong></td>
                    <td><strong>Supprimer</strong></td>
                </tr>
                <?php foreach($categoriesArray as $categorie){ ?>
                    <tr>
                        <td><?php echo htmlspecialchars($categorie["nom"]); ?></td>
                        <td><a href="boutique.php?admin=categorie&amp;id=<?php echo $categorie["nom"]; ?>" class="a-img"><img src="cross.png" alt="[ ✖ supprimer ]" /></a></td>
                    </tr>
            <?php    } ?>
                </table>
            </div>
<?php paginationListPages($nbPages, $page, $url); ?>
            <br />
            <div id="admin-add-categorie" class="block-middle">
                <div class="head-block">ajouter une nouvelle catégorie</div><br />
                <form action="boutique.php?admin=categorie" method="post" enctype="multipart/form-data" onsubmit="return verifRegex(this.cat, rgxNom)" >
                    <fieldset style="text-align:left; width:80%; margin:auto;">
                        <legend>Ajouter une catégorie</legend>
                        <table style="margin:auto;">
                            <tr>
                                <td><label id="categorieLabel" for="cat">Catégorie :</label></td>
                                <td><input type="text" name="cat" id="cat" size="74" onblur="verifRegex(this, rgxNom)" /></td>
                            </tr>

                            <tr>
                                <td colspan="2" style="text-align:center;">
                                    <br /><input type="reset" value="Réinitialiser" />
                                    <input type="submit" value="Envoyer!" /><br />
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                </form>
            </div>
<?php printFooter(false); ?>