<?php printHeader('admin', false, 'administration : ajouter un produit', true);  ?>
            <div id="admin-add-product" class="block-middle">
                <div class="head-block">ajouter un produit</div><br />
                <div style="text-align:center;">
                    <a href="boutique.php?admin=index">[ Geston des produits ]</a> | <a href="boutique.php?admin=produit-add" class="active">[ Ajouter un produit ]</a> | <a href="boutique.php?admin=achat">[ Gestion des achats ]</a> | <a href="boutique.php?admin=categorie">[ Gestion des catégories ]</a>
                </div><br />
                <form action="boutique.php?admin=produit-envoi" method="post" enctype="multipart/form-data"  onsubmit="return verifFormAddProduit(this)">
                    <fieldset style="text-align:left; width:95%; margin:auto;">
                        <legend>Ajouter un produit</legend>
                        <table style="margin:auto;">
                            <tr>
                                <td><label id="titreLabel" for="titre">Titre :</label></td>
                                <td><input type="text" name="titre" id="titre" size="75" onblur="verifRegex(this, rgxTitre)" /></td>
                            </tr>
                            <tr>
                                <td><label id="auteurLabel" for="auteur">Auteur / Editeur :</label></td>
                                <td><input type="text" name="auteur" id="auteur" size="75" onblur="verifRegex(this, rgxTitre)" /></td>
                            </tr>
                            <tr>
                                <td><label id="imageLabel" for="image">Image (url) :</label></td>
                                <td><input type="text" name="image" id="image" size="75" value="http://" /></td>
                            </tr>
                            <tr>
                                <td><label for="website">Site internet :</label></td>
                                <td><input type="text" name="website" id="website" size="75" value="http://" /></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align:center;"><textarea id="infos" name="infos" cols="95" rows="5" onblur="verifDescription(this)" onfocus="clearTextArea(this, defautProduit)">Description du produit</textarea></td>
                            </tr>
                            <tr>
                                <td><label for="categorie">Catégorie :</label></td>
                                <td><select id="categorie" name="categorie" size="1"><?php foreach($categoriesArray as $categorie){echo '<option value="'.$categorie['nom'].'">'.$categorie['nom'].'</option>' ;} ?></select></td>
                            </tr>
                            <tr>
                                <td><label id="prixLabel" for="prix">Prix (en €uros) :</label></td>
                                <td><input type="text" name="prix" id="prix" size="16" value="10.00" onblur="verifRegex(this, rgxPrix)" /> €  - (utiliser un point pour la décimale)</td>
                            </tr>

                            <tr>
                                <td colspan="2" style="text-align:center;">
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
        toolbar : 'News'
    });

                        </script>
                    </fieldset>
                </form>
            </div>
<?php printFooter();?>