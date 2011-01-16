<?php printHeader('contact', false, 'contactez-nous', true); foreach($membreArray as $membre){ ?>
<div id="contact" class="block-middle">
                <div class="head-block">contactez-nous</div><br />

                <form action="contact.php?&amp;op=envoi" method="post" enctype="multipart/form-data"  onsubmit="return verifFormContact(this)">
                    <fieldset style="text-align:left; width:80%; margin:auto;">
                        <legend>Formulaire de contact</legend>
                        <table style="margin:auto;">
                            <tr>
                                <td><label id="nomLabel" for="nom">Prénom / Nom :</label></td>
                                <td><input type="text" name="nom" id="nom" size="65"<?php if($_SESSION['login']) { echo ' value="'. htmlspecialchars($membre['prenom']) .' '. htmlspecialchars($membre['nom']) .'"';} ?> onblur="verifRegex(this, rgxNom)" /></td>
                            </tr>
                            <tr>
                                <td><label for="mail">E-Mail :</label></td>
                                <td><input type="text" name="mail" id="mail" size="65"<?php if($_SESSION['login']) { echo ' value="'. htmlspecialchars($membre['mail']) .'"';} ?> onblur="verifRegex(this, rgxMail)" /></td>
                            </tr>
                            <tr>
                                <td><label for="website">Site internet :</label></td>
                                <td><input type="text" name="website" id="website" size="65" value="http://" /></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align:center;"><textarea id="message" name="message" cols="100" rows="5" onblur="verifTextAreaDefaut(this, defautContact)" onfocus="clearTextArea(this, defautContact)">Écrivez votre message...</textarea></td>
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
                                    <br /><input type="reset" value="Réinitialiser" onclick="reinistialiseContact();"/>
                                    <input type="submit" value="Envoyer!" />
                                    <br /><span id="footerErreurNom" style="display:none; color:red;" ><br />/!\ Erreur dans votre nom/prénom /!\</span>
                                    <span id="footerErreurMail" style="display:none; color:red;" ><br />/!\ Erreur dans votre email /!\</span>
                                    <span id="footerErreurMessage" style="display:none; color:red;" ><br />/!\ Erreur dans votre message /!\</span>
                                </td>
                            </tr>
                        </table>                        
                    </fieldset>
                </form>
            </div>
<?php } printFooter(); ?>