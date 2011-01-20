<?php printHeader('admin', false, 'administration ~ news', false); ?>
            <div id="admin-news-edit" class="block-middle">
                <div class="head-block">édition de la news n°<?php echo $id.' : '.$titre; ?></div><br />
                <div style="text-align:center;">
                    <a href="news.php?admin=index">[ Gestion des news ]</a> | <a href="news.php?admin=add">[ Ajouter une news ]</a>
                </div><br />
                <?php foreach($newsArray as $news){ ?>
                <form action="news.php?admin=envoiUpdate" method="post" enctype="multipart/form-data" onsubmit="return verifFormNews(this, 1)" >
                    <fieldset style="text-align:left; width:95%; margin:auto;">
                        <legend>Modifier une news</legend>
                        <table style="margin:auto;">
                            <tr>
                                <td><label id="titreLabel" for="titre">Titre :</label></td>
                                <td><input type="text" name="titre" id="titre" size="75" value="<?php echo htmlspecialchars($news["titre"])?>" onblur="verifRegex(this, rgxTitre)"/></td>
                            </tr>
                            <tr>
                                <td><label id="auteurLabel" for="auteur">Auteur :</label></td>
                                <td><input type="text" name="auteur" id="auteur" size="75" value="<?php echo htmlspecialchars($news["auteur"])?>" onblur="verifRegex(this, rgxPseudo)"/></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align:center;"><textarea id="texte" name="texte" cols="180" rows="5" onfocus="clearTextArea(this, defautNews)"><?php echo htmlspecialchars($news["texte"])?></textarea></td>
                            </tr>
                            <tr style="display:none;">
                                <td><label for="id" style="display:none;" >ID news (do not change) :</label></td>
                                <td><input type="text" style="display:none;" name="id" id="id" size="5" value="<?php echo  htmlspecialchars($_GET['id'])?>" onblur="verifRegex(this, rgxNombre)"/></td>
                            </tr>
                            <tr>
                                <td><label id="dateLabel" for="date">Date :</label></td>
                                <td><input type="text" name="date" id="date" size="25" value="<?php echo $news["dateOrder"]?>" onblur="verifRegex(this, rgxDate)"/></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align:center;">
                                    <br /><input type="reset" value="Annuler les modifications" />
                                    <input type="submit" value="Envoyer!" /><br />
                                    <span id="footerErreurTitre" style="display:none; color:red;" ><br />/!\ Erreur dans le titre /!\</span>
                                    <span id="footerErreurAuteur" style="display:none; color:red;" ><br />/!\ Erreur dans l'auteur /!\</span>
                                    <span id="footerErreurID" style="display:none; color:red;" ><br />/!\ ID News incorrect: paramètre à ne pas modifier par l'utilisateur, merci! /!\</span>
                                    <span id="footerErreurDate" style="display:none; color:red;" ><br />/!\ Erreur dans la date (nombre) /!\</span>
                                </td>
                            </tr>
                        </table>
                        <script type="text/javascript">
                                CKEDITOR.replace( 'texte',
    {
        toolbar : 'News'
    });

                        </script>
                    </fieldset>
                </form><br />
                <?php } ?>
            </div>
<?php printFooter(); ?>