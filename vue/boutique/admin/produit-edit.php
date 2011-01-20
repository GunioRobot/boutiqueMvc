<?php foreach($produitArray as $produit){printHeader('admin', false, 'administration : éditer un produit', true);  ?>
            <div id="admin-add-product" class="block-middle">
                <div class="head-block">éditer le produit n°<?php echo htmlspecialchars($_GET['id']);?></div><br />
                <div style="text-align:center;">
                    <a href="boutique.php?admin=index" class="active">[ Geston des produits ]</a> | <a href="boutique.php?admin=produit-add">[ Ajouter un produit ]</a> | <a href="boutique.php?admin=achat">[ Gestion des achats ]</a> | <a href="boutique.php?admin=categorie">[ Gestion des catégories ]</a>
                </div><br />
                <form action="boutique.php?admin=produit-envoi" method="post" enctype="multipart/form-data"  onsubmit="return verifFormAddProduit(this)">
                    <fieldset style="text-align:left; width:95%; margin:auto;">
                        <legend>Ajouter un produit</legend>
                        <table style="margin:auto;">
                            <tr>
                                <td><label id="titreLabel" for="titre">Titre :</label></td>
                                <td><input type="text" name="titre" id="titre" size="75" onblur="verifRegex(this, rgxTitre)" value="<?php echo htmlspecialchars($produit["titre"])?>"/></td>
                            </tr>
                            <tr>
                                <td><label id="auteurLabel" for="auteur">Auteur / Editeur :</label></td>
                                <td><input type="text" name="auteur" id="auteur" size="75" onblur="verifRegex(this, rgxTitre)" value="<?php echo htmlspecialchars($produit["auteur"])?>"/></td>
                            </tr>
                            <tr>
                                <td><label id="imageLabel" for="image">Image (url) :</label></td>
                                <td><input type="text" name="image" id="image" size="75" value="<?php echo htmlspecialchars($produit["image"])?>"/></td>
                            </tr>
                            <tr>
                                <td><label for="website">Site internet :</label></td>
                                <td><input type="text" name="website" id="website" size="75" value="<?php echo htmlspecialchars($produit["website"])?>"/></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align:center;"><textarea id="infos" name="infos" cols="95" rows="5" onblur="verifDescription(this)" onfocus="clearTextArea(this, defautProduit)"><?php echo htmlspecialchars($produit["infos"])?></textarea></td>
                            </tr>
                            <tr>
                                <td><label for="categorie">Catégorie :</label></td>
                                <td><select id="categorie" name="categorie" size="1"><?php foreach($categoriesArray as $categorie){echo '<option value="'.$categorie['nom'].' "'; if($categorie['nom'] == $produit['categorie']){echo 'selected="selected" ';} echo '>'.$categorie['nom'].'</option>' ;} ?></select></td>
                            </tr>
                            <tr>
                                <td><label id="prixLabel" for="prix">Prix (en €uros) :</label></td>
                                <td><input type="text" name="prix" id="prix" size="16" onblur="verifRegex(this, rgxPrix)" value="<?php echo htmlspecialchars($produit["prix"])?>"/> €  - (utiliser un point pour la décimale)</td>
                            </tr>
                            <tr>
                                <td><label id="achatLabel" for="achat">Acheté :</label></td>
                                <td><input type="text" name="achat" id="achat" size="16" value="<?php echo htmlspecialchars($produit["achat"])?>" onblur="verigRegex(this, rgxPrix)" /> fois</td>
                            </tr>

                            <tr>
                                <td colspan="2" style="text-align:center;">
                                    <label for="id" style="display:none;" >ID produit (do not change) :</label> <input type="text" style="display:none;" name="id" id="id" size="5" value="<?php echo  htmlspecialchars($_GET['id'])?>" onblur="verifRegex(this, rgxNombre)"/>
                                    <br /><input type="reset" value="Réinitialiser" />
                                    <input type="submit" value="Envoyer!" /><br />
                                    <span id="footerErreurNom" style="display:none; color:red;" ><br />/!\ Erreur dans le titre /!\</span>
                                    <span id="footerErreurAuteur" style="display:none; color:red;" ><br />/!\ Erreur dans le champs Auteur /!\</span>
                                    <span id="footerErreurDescription" style="display:none; color:red;" ><br />/!\ Erreur dans la description du produit /!\</span>
                                    <span id="footerErreurPrix" style="display:none; color:red;" ><br />/!\ Erreur dans le prix du produit /!\</span>
                                </td>
                            </tr>
                        </table>
                        <script type="text/javascript">
                                CKEDITOR.replace( 'infos',
    {
        toolbar : 'News',

        coreStyles_underline	: { element : 'span', attributes : {'class': 'Underline'}},
        coreStyles_strike	: { element : 'span', attributes : {'class': 'StrikeThrough'}, overrides : 'strike' },
        coreStyles_subscript : { element : 'span', attributes : {'class': 'Subscript'}, overrides : 'sub' },
        coreStyles_superscript : { element : 'span', attributes : {'class': 'Superscript'}, overrides : 'sup' }
    });

                        </script>
                    </fieldset>
                </form>
            </div>
<?php printFooter();}?>