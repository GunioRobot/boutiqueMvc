<?php printHeader('admin', false, 'administration : ajouter une news', true);  ?>
            <div id="admin-add-news" class="block-middle">
                <div class="head-block">ajouter une news</div><br />
                <form action="news.php?admin=envoiNew" method="post" enctype="multipart/form-data" onsubmit="return verifFormNews(this, 0)">
                    <fieldset style="text-align:left; width:80%; margin:auto;">
                        <legend>Ajouter une news</legend>
                        <table style="margin:auto;">
                            <tr>
                                <td><label id="titreLabel" for="titre">Titre :</label></td>
                                <td><input type="text" name="titre" id="titre" size="74" onblur="verifRegex(this, rgxTitre)"/></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align:center;"><textarea id="texte" name="texte" cols="80" rows="5" onfocus="clearTextArea(this, defautNews)">Texte de l'actualité</textarea></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align:center;">
                                    <br /><input type="reset" value="Réinitialiser" />
                                    <input type="submit" value="Envoyer!" /><br />
                                    <span id="footerErreurTitre" style="display:none; color:red;" ><br />/!\ Erreur dans le titre /!\</span>
                                    <span id="footerErreurDate" style="display:none; color:red;" ><br />/!\ Erreur dans la date (nombre) /!\</span>
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                </form><br />
            </div>
<?php printFooter(false); ?>