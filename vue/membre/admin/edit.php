<?php printHeader('admin', false, 'administration : éditer un membre', true);  ?>
                    <div id="admin-membre-edit" class="block-middle">
                        <div class="head-block">édition du membre n°<?php echo htmlspecialchars($_GET['id']); ?></div><br />

                        <?php foreach ($membreArray as $infos){ ?>
                <form action="membre.php?admin=envoi" method="post" enctype="multipart/form-data"  onsubmit="return verifFormAdminModifMembre(this)">
                    <fieldset style="text-align:left; width:80%; margin:auto;">
                        <legend>Administration - modification d'un membre</legend>
                        <table style="margin:auto;">
                            <tr>
                                <td><label id="pseudoLabel" for="pseudo">Pseudo :</label></td>
                                <td><input type="text" name="pseudo" id="pseudo" size="52" value="<?php echo htmlspecialchars($infos["pseudo"])?>" onblur="verifRegex(this, rgxPseudo)" /></td>
                            </tr>
                            <tr>
                                <td><label id="nomLabel" for="nom">Nom :</label></td>
                                <td><input type="text" name="nom" id="nom" size="75" value="<?php echo htmlspecialchars($infos["nom"])?>" onblur="verifRegex(this, rgxNom)" /></td>
                            </tr>
                            <tr>
                                <td><label id="prenomLabel" for="prenom">Prénom :</label></td>
                                <td><input type="text" name="prenom" id="prenom" size="75" value="<?php echo htmlspecialchars($infos["prenom"])?>" onblur="verifRegex(this, rgxNom)" /></td>
                            </tr>
                            <tr>
                                <td><label for="mail">E-Mail :</label></td>
                                <td><input type="text" name="mail" id="mail" size="75" value="<?php echo htmlspecialchars($infos["mail"])?>" onblur="verifRegex(this, rgxMail)" /></td>
                            </tr>
                            <tr>
                                <td><label id="adminLabel" for="admin">Nommer admin ?</label></td>
                                <td><input type="checkbox" name="admin" id="admin" <?php if($infos['admin'] == 1){ echo 'checked="checked"'; }?> /></td>
                            </tr>
                            <tr><td colspan="2"><br /></td></tr>
                            <tr>
                                <td><label for="adresse">Adresse :</label></td>
                                <td><input type="text" name="adresse" id="adresse" size="75" value="<?php echo htmlspecialchars($infos["adresse"])?>" onblur="verifRegex(this, rgxAdresse)" /></td>
                            </tr>
                            <tr>
                                <td><label for="codepostal">Code postal :</label></td>
                                <td><input type="text" name="codepostal" id="codepostal" size="10" value="<?php echo htmlspecialchars($infos["codepostal"])?>" onblur="verifRegex(this, rgxPostal)" /></td>
                            </tr>
                            <tr>
                                <td><label for="ville">Ville :</label></td>
                                <td><input type="text" name="ville" id="ville" size="75" value="<?php echo htmlspecialchars($infos["ville"])?>" onblur="verifRegex(this, rgxNom)" /></td>
                            </tr>
                            <tr>
                                <td><label for="pays">Pays :</label></td>
                                <td><input type="text" name="pays" id="pays" size="75" value="<?php echo htmlspecialchars($infos["pays"])?>" onblur="verifRegex(this, rgxNom)"  /></td>
                            </tr>
                        </table>

                        <table style="margin:auto;">
                            <tr><td colspan="2" style="text-align:center;"><br /><strong>Changement de mot de passe</strong> (ne remplir qu'en cas de changement)</td></tr>
                            <tr>
                                <td><label for="changePassword">Nouveau mot de passe :</label></td>
                                <td><input type="password" name="changePassword" id="changePassword" size="60" onblur="verifChangePassword(this)"  /></td>
                            </tr>
                            <tr>
                                <td><label for="changePassword2">Répéter le nouveau mot de passe :</label></td>
                                <td><input type="password" name="changePassword2" id="changePassword2" size="60" onblur="verifChangePassword(this)"  /></td>
                            </tr>


                            <tr>
                                <td colspan="2" style="text-align:center;">
                                    <input type="text" style="display:none;" name="ID_membre" id="ID_membre" size="5" value="<?php echo htmlspecialchars($_GET['id']); ?>" onblur="verifRegex(this, rgxNombre)"/>
                                    <br /><input type="reset" value="Réinitialiser" onclick="reinistialiseMembrePanel();"/>
                                    <input type="submit" value="Envoyer!" />
                                    <span id="footerErreurPseudo" style="display:none; color:red;" ><br />/!\ Erreur dans votre pseudo /!\</span>
                                    <span id="footerErreurNom" style="display:none; color:red;" ><br />/!\ Erreur dans votre nom /!\</span>
                                    <span id="footerErreurPrenom" style="display:none; color:red;" ><br />/!\ Erreur dans votre prénom /!\</span>
                                    <span id="footerErreurMail" style="display:none; color:red;" ><br />/!\ Erreur dans votre email /!\</span>
                                    <span id="footerErreurAdresse" style="display:none; color:red;" ><br />/!\ Erreur dans votre adresse /!\</span>
                                    <span id="footerErreurCodePostal" style="display:none; color:red;" ><br />/!\ Erreur dans votre code postal /!\</span>
                                    <span id="footerErreurVille" style="display:none; color:red;" ><br />/!\ Erreur dans votre ville /!\</span>
                                    <span id="footerErreurChangePassword" style="display:none; color:red;" ><br />/!\ Erreur dans votre nouveau mot de passe /!\</span>
                                    <span id="footerErreurChangePassword2" style="display:none; color:red;" ><br />/!\ Les deux mots de passe ne correspondent pas /!\</span>
                                    <span id="footerErreurPays" style="display:none; color:red;" ><br />/!\ Erreur dans votre pays /!\</span>
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                </form><?php } ?>
            </div>
<?php printFooter(); ?>