<?php printHeader('accueil', false, 'news : '.$titre, true);
foreach ($newsArray as $news) {
    if($admin == 1){ ?>
            <div style="text-align:right; padding-bottom: 4px;">
                <a href="news.php?admin=edit&amp;id=<?php echo $news["ID"]; ?>" class="a-img">[ <img src="pencil.png" alt="✏" /> éditer ]</a> -
                <a href="news.php?admin=del&amp;id=<?php echo $news["ID"]; ?>" class="a-img">[ <img src="cross.png" alt="✖" /> supprimer ]</a>
            </div>
<?php } ?>
            <div id="news-<?php echo $news['ID']; ?>" class="block-middle">
                <div class="head-block"><?php echo $news['titre']; ?></div>
                <div style="padding-left:5px;"><?php echo $news['texte']; ?></div><br />
                <div id="auteur-<?php echo $id; ?>" style="float:right;">Posté par <?php echo $news['auteur']; ?> le <?php echo $news['date']; ?></div>
                <div class="clear"></div><br />
            </div>
            <strong id="comment">Commentaires :</strong>
<?php if($nbComments == 0){ ?>
            <br /><div class="element" style="text-align:center;">Aucun commentaire. Soyez le premier à réagir !</div><br />
<?php } else{ foreach($commentsArray as $comment){ ?>
            <div class="element" id="comment<?php echo $comment['ID']; ?>">
                <?php //echo nl2br(htmlspecialchars($comment['message']));
                require_once("includes/nbbc/nbbc.php"); $bbcode = new BBCode; print $bbcode->Parse(($comment['message'])); ?>
                <br /><br />
                <div style="text-align:right;">Écrit par <?php echo htmlspecialchars($comment['pseudo']); ?> le <?php echo ($comment['dateFormated']); if($admin OR ($_SESSION['login'] AND $comment['ID_membre'] == $_SESSION['ID'])){ ?> | <a href="news.php?op=delete-comment&amp;id=<?php echo $comment['ID'];?>" class="a-img"><img src="images/cross.png" alt="[ ✖ supprimer ]" style="vertical-align:middle;" /></a><?php } ?></div>
            </div>

<?php }} ?><br />
<?php paginationListPages($nbPages, $page, $url); ?>
                <form action="news.php?op=envoi-comment" method="post" enctype="multipart/form-data" id="add-comment" <?php /*onsubmit="return verifFormMembreLogin(this)" */?>>
                    <fieldset style="text-align:left; width:80%; margin:auto;">
                        <legend>Ajouter un commentaire</legend><br />
                        <table style="margin:auto;">
                            <tr>
                                <?php if($_SESSION['login']){?><td colspan="2">
                                    <div style="text-align:center;">Pseudo : <strong><?php echo $_SESSION['pseudo']; ?></strong> <a href="membre.php?op=logout">[ Déconnexion ]</a></div>
                                </td><?php } else{ ?>
                                <td><label id="pseudoLabel" for="pseudo">Pseudo : </label></td>
                                <td>
                                    <input type="text" name="pseudo" id="pseudo" size="80" onblur="verifRegex(this, rgxPseudo)" />
                                </td><?php } ?>
                            </tr>
                            <?php if(!$_SESSION['login']){?><tr>
                                <td><label id="mailLabel" for="mail">E-Mail : </label></td>
                                <td><input type="text" name="mail" id="mail" size="80" onblur="verifRegex(this, rgxMail)" /></td>
                            </tr><?php } ?>
                            <tr style="width:640px;">
                                <td colspan="2" style="text-align:center; width:620px;"><textarea id="message" name="message" cols="95" rows="5" onblur="verifTextAreaDefaut(this, defautContact)" onfocus="clearTextArea(this, defautContact)">Écrivez votre message...</textarea></td>
                            </tr>
                            <?php if(!$_SESSION['login']){?><tr>
                                <td>Code de vérification :</td>
                                <td><?php echo recaptcha_get_html($publickey); ?></td>
                            </tr><?php }?>
                            <tr>
                                <td colspan="2" style="text-align:center;"><input type="text" style="display:none;" name="ID_news" id="ID_news" size="2" value="<?php echo htmlspecialchars($_GET['id']); ?>"/>
                                    <input type="reset" value="Réinitialiser" /> <input type="submit" value="Envoyer!" /><br />
                                    <span id="footerErreurPseudo" style="display:none; color:red;" >/!\ Erreur dans votre pseudo /!\<br /></span>
                                </td>
                            </tr>
                        </table>
                    </fieldset>


                </form>
<script type="text/javascript">
		//<![CDATA[
			var sBasePath = document.location.pathname.substring(0,document.location.pathname.lastIndexOf('plugins')) ;
			// Replace the <textarea id="editor1"> with an CKEditor instance.
			var CKeditor = CKEDITOR.replace( 'message', {
											customConfig : sBasePath + 'plugins/bbcode/_sample/bbcode.config.js'
									}  );

		//]]>
		</script>


<?php }

   
printFooter();