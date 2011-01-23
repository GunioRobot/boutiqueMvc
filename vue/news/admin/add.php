<?php printHeader('admin', false, 'administration : ajouter une news', true);  ?>
            <div id="admin-add-news" class="block-middle">
                <div class="head-block">ajouter une news</div><br />
                <div style="text-align:center;">
                    <a href="news.php?admin=index">[ Gestion des news ]</a> | <a href="news.php?admin=add" class="active">[ Ajouter une news ]</a>
                </div><br />
                <form action="news.php?admin=envoiNew" method="post" enctype="multipart/form-data" onsubmit="return verifFormNews(this, 0)">
                    <fieldset style="text-align:left; width:95%; margin:auto;">
                        <legend>Ajouter une news</legend>
                        <table style="margin:auto;">
                            <tr>
                                <td><label id="titreLabel" for="titre">Titre :</label></td>
                                <td><input type="text" name="titre" id="titre" size="74" onblur="verifRegex(this, rgxTitre)"/></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align:center;"><textarea id="texte" name="texte" cols="180" rows="5" onfocus="clearTextArea(this, defautNews)">Texte de l'actualité</textarea></td>
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
                        <script type="text/javascript">
                                CKEDITOR.replace( 'texte',
    {
        toolbar : 'News',
        contentsCss : 'ckeditor/contents.css',
        coreStyles_underline	: { element : 'span', attributes : {'class': 'Underline'}},
        coreStyles_strike	: { element : 'span', attributes : {'class': 'StrikeThrough'}, overrides : 'strike' },
        coreStyles_subscript : { element : 'span', attributes : {'class': 'Subscript'}, overrides : 'sub' },
        coreStyles_superscript : { element : 'span', attributes : {'class': 'Superscript'}, overrides : 'sup' }
    });

                        </script>
                    </fieldset>
                </form><br />
            </div>
<?php printFooter(); ?>