<?php printHeader('accueil', false, 'news : '.$titre, false);
foreach ($newsArray as $news) {
    if($admin == 1){ ?>
            <div style="text-align:right; padding-bottom: 4px;">
                <a href="news.php?admin=edit&amp;id=<?php echo $news["ID"]; ?>" class="a-img">[ <img src="pencil.png" alt="✏" /> éditer ]</a> -
                <a href="news.php?admin=del&amp;id=<?php echo $news["ID"]; ?>" class="a-img">[ <img src="cross.png" alt="✖" /> supprimer ]</a>
            </div>
<?php } ?>
            <div id="news-<?php echo $news['ID']; ?>" class="block-middle">
                <div class="head-block"><?php echo $news['titre']; ?></div>
                <div style="padding-left:5px;"><?php echo nl2br($news['texte']); ?></div><br />
                <div id="auteur-<?php echo $id; ?>" style="float:right;">Posté par <?php echo $news['auteur']; ?> le <?php echo $news['date']; ?></div>
                <div class="clear"></div><br />
            </div><br />Système de commentaire ...
<?php }

   
printFooter();