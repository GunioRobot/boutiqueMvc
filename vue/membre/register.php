<?php printHeader('membre-register', false, 'inscription', true); ?>
                <div id="register-form" class="block-middle" style="text-align:center;">
                <div class="head-block">enregistrement d'un nouveau membre</div>
                <br />
                <a href="membre.php?op=login" class="a-img"><img src="images/login.png" alt="Déjà inscris ? Accéder à la page de connexion" style="padding-bottom:8px;"/></a>
                <br /><br />
                 <form action="membre.php?op=registerEnvoi" method="post" enctype="multipart/form-data" id="formulaire-register"  onsubmit="return verifFormMembreRegister(this)">
                    <fieldset style="text-align:left; width:80%; margin:auto;">
                        <legend>Formulaire d'Inscription</legend><br />
                        <table style="margin:auto;">
                            <tr>
                                <td><label id="pseudoLabel" for="pseudo">Pseudo :</label></td>
                                <td><input type="text" name="pseudo" id="pseudo" size="55" onblur="verifRegex(this, rgxPseudo)" /></td>
                            </tr>
                            <tr>
                                <td><label id="passwordLabel" for="password">Mot de passe :</label></td>
                                <td><input type="password" name="password" id="password" size="55" onblur="verifRegex(this, rgxPassword)" /></td>
                            </tr>
                            <tr>
                                <td><label id="password2Label" for="password2">Répéter le Mot de passe :</label></td>
                                <td><input type="password" name="password2" id="password2" size="55" onblur="verifRegex(this, rgxPassword)" /></td>
                            </tr>
                            <tr>
                                <td><label for="mail">E-Mail :</label></td>
                                <td><input type="text" name="mail" id="mail" size="55" onblur="verifRegex(this, rgxMail)" /></td>
                            </tr>
                            <tr>
                                <td><label for="recaptcha_response_field">Code de vérification :</label></td>
                                <td><?php echo recaptcha_get_html($publickey); ?></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align:center;">
                                    <br /><input type="reset" value="Réinitialiser" onclick="reinistialiseMembreRegister();"/>
                                    <input type="submit" value="Envoyer!" />
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align:center;">
                                    <span id="footerErreurPseudo" style="display:none; color:red;" ><br />/!\ Erreur dans votre pseudo /!\</span>
                                    <span id="footerErreurMail" style="display:none; color:red;" ><br />/!\ Erreur dans votre email /!\</span>
                                    <span id="footerErreurPassword" style="display:none; color:red;" ><br />/!\ Votre mot de passe n'est pas valide /!\</span>
                                    <span id="footerErreurPassword2" style="display:none; color:red;" ><br />/!\ Les deux mots de passes ne correspondent pas /!\</span>
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                </form>

            </div><?php

printFooter(); ?>