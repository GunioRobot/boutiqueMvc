<?php printHeader('membre-login', false, 'connexion', true); ?>

            <div id="login-form" class="block-middle" style="text-align:center;">
                <div class="head-block">identification</div>
                <br />
                <a href="membre.php?op=register" class="a-img"><img src="register.png" alt="Pas encore membre ? Inscrivez-vous ici" style="padding-bottom:8px;"/></a>
                <br /><br />
                <form action="membre.php?op=loginEnvoi" method="post" enctype="multipart/form-data" id="formulaire-login" onsubmit="return verifFormMembreLogin(this)">
                    <fieldset style="text-align:left; width:80%; margin:auto;">
                        <legend>Formulaire de connexion</legend><br />
                        <table style="margin:auto;">
                            <tr>
                                <td><label id="pseudoLabel" for="pseudo">Pseudo : </label></td>
                                <td> <input type="text" name="pseudo" id="pseudo" size="55" onblur="verifRegex(this, rgxPseudo)" /></td>
                            </tr>
                            <tr>
                                <td><label id="passwordLabel" for="password">Mot de passe : </label></td>
                                <td><input type="password" name="password" id="password" size="55" onblur="verifRegex(this, rgxPassword)" /></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align:center;"><input type="checkbox" name="connected" id="connected" checked="checked" /> <label id="connectedLabel" for="connected">Rester connecté ?</label></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align:center;"><input type="submit" value="Envoyer!" /><br />
                        <span id="footerErreurPseudo" style="display:none; color:red;" >/!\ Erreur dans votre pseudo /!\<br /></span>
                        <span id="footerErreurPassword" style="display:none; color:red;" >/!\ Votre mot de passe n'est pas valide /!\<br /></span></td>
                            </tr>
                        </table>
                    </fieldset>
                        
                        
                </form>
            </div>

<?php printFooter(false); ?>
