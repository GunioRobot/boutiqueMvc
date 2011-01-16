<?php foreach($produitArray as $produit){
printHeader('boutique', false, 'achat de '.$produit['titre'], true); foreach($membreArray as $membre){ ?>
            <div id="achat" class="block-middle">
                <div class="head-block">achat produit <?php echo htmlspecialchars($produit['titre']); ?></div>
                <div class="table-fiche" style="position:relative; width:783px;">
                    Vous avez sélectionné le produit n°<strong><?php echo htmlspecialchars($produit['ID']); ?></strong><br />
                    <strong><?php echo $produit['titre']; ?></strong> (<?php echo $produit['prix']; ?> €)
                </div>
                <br />
                <form action="boutique.php?op=achat-envoi" method="post" enctype="multipart/form-data" id="formulaire-achat"  onsubmit="return verifFormAchat(this)">
                    <fieldset style="text-align:left; width:80%; margin:auto;">
                        <legend>Formulaire d'achat</legend>
                        <?php if($_SESSION['login']) { ?>
                        Vous êtes inscrit sur le site. La plupart des champs sont pré-remplis si vous les avez déjà renseignés sur notre site. Veuillez les compléter ou corriger si besoin est. Merci <br /><br />
                        <?php } ?>
                        <table style="margin:auto;">
                            <tr>
                                <td><label id="nomLabel" for="nom">Nom :</label></td>
                                <td><input type="text" name="nom" id="nom" size="75"<?php if($_SESSION['login']) { echo 'value="'. htmlspecialchars($membre['nom']) .'"';} ?> onblur="verifRegex(this, rgxNom)" /></td>
                            </tr>
                            <tr>
                                <td><label id="prenomLabel" for="prenom">Prénom :</label></td>
                                <td><input type="text" name="prenom" id="prenom"<?php if($_SESSION['login']) { echo 'value="'. htmlspecialchars($membre['prenom']) .'"';} ?> size="75" onblur="verifRegex(this, rgxNom)" /></td>
                            </tr>
                            <tr>
                                <td><label for="mail">E-Mail :</label></td>
                                <td><input type="text" name="mail" id="mail" size="75"<?php if($_SESSION['login']) { echo 'value="'. htmlspecialchars($membre['mail']) .'"';} ?> onblur="verifRegex(this, rgxMail)" /></td>
                            </tr>
                            <tr>
                                <td><br /><label for="adresse">Adresse :</label></td>
                                <td><br /><input type="text" name="adresse" id="adresse" size="75"<?php if($_SESSION['login']) { echo 'value="'. htmlspecialchars($membre['adresse']) .'"';} ?> onblur="verifRegex(this, rgxAdresse)" /></td>
                            </tr>
                            <tr>
                                <td><label for="codepostal">Code postal :</label></td>
                                <td><input type="text" name="codepostal" id="codepostal" size="10"<?php if($_SESSION['login']) { echo 'value="'. htmlspecialchars($membre['codepostal']) .'"';} ?> onblur="verifRegex(this, rgxPostal)" /></td>
                            </tr>
                            <tr>
                                <td><label for="ville">Ville :</label></td>
                                <td><input type="text" name="ville" id="ville" size="75"<?php if($_SESSION['login']) { echo 'value="'. htmlspecialchars($membre['ville']) .'"';} ?> onblur="verifRegex(this, rgxNom)" /></td>
                            </tr>
                            <tr>
                                <td><label for="pays">Pays :</label></td>
                                <td><input type="text" name="pays" id="pays" size="75"<?php if($_SESSION['login']) { echo 'value="'. htmlspecialchars($membre['pays']) .'"';} ?> onblur="verifRegex(this, rgxNom)"  /><br />
                                <input type="text" style="display:none;" name="ID_produit" id="ID_produit" size="63" value="<?php echo htmlspecialchars($produit['ID']); ?>"/></td>
                            </tr>
                            <tr>
                                <td><label for="note">Sondage~ Notez notre site :</label></td>
                                <td>
                                    <select id="note" name="note" size="1">
                                        <option value="10">10</option>
                                        <option value="9">9</option>
                                        <option value="8">8</option>
                                        <option value="7">7</option>
                                        <option value="6">6</option>
                                        <option value="5">5</option>
                                        <option value="4">4</option>
                                        <option value="3">3</option>
                                        <option value="2">2</option>
                                        <option value="1">1</option>
                                    </select>
                                </td>
                            </tr>
                            <?php if(!$_SESSION['login']){?><tr>
                                <td>Code de vérification :</td>
                                <td><?php echo recaptcha_get_html($publickey); ?></td>
                            </tr><?php }?>
                            <tr>
                                <td colspan="2" style="text-align:center;">
                                    <br /><input type="reset" value="Réinitialiser" onclick="reinistialiseAchat();"/>
                                    <input type="submit" value="Envoyer!" />
                                    <br /><span id="footerErreurNom" style="display:none; color:red;" ><br />/!\ Erreur dans votre nom /!\</span>
                                    <span id="footerErreurPrenom" style="display:none; color:red;" ><br />/!\ Erreur dans votre prénom /!\</span>
                                    <span id="footerErreurMail" style="display:none; color:red;" ><br />/!\ Erreur dans votre email /!\</span>
                                    <span id="footerErreurAdresse" style="display:none; color:red;" ><br />/!\ Erreur dans votre adresse /!\</span>
                                    <span id="footerErreurCodePostal" style="display:none; color:red;" ><br />/!\ Erreur dans votre code postal /!\</span>
                                    <span id="footerErreurVille" style="display:none; color:red;" ><br />/!\ Erreur dans votre ville /!\</span>
                                    <span id="footerErreurPays" style="display:none; color:red;" ><br />/!\ Erreur dans votre pays /!\</span>
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                </form>
<?php } ?>
            </div>
<?php printFooter(); }?>
