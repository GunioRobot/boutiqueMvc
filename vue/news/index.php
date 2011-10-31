<?php printHeader('accueil', false, 'accueil', false);
foreach ($newsArray as $news) { ?>
            <div id="news-<?php echo $news['ID']; ?>" class="block-middle">
                <div class="head-block"><a href="news.php?id=<?php echo $news['ID'];?>"><?php echo $news['titre']; ?></a></div>
                <div style="padding-left:5px;"><?php echo ($news['texte']); ?></div><br />
                <div id="auteur-<?php echo $news['ID']; ?>" style="float:right;">Posté par <?php echo $news['auteur']; ?> le <?php echo $news['date']; ?> | <a href="news.php?id=<?php echo $news['ID'];?>#comment"><?php echo $nbCommentNews[$news['ID']]; ?> commentaire<?php if($nbCommentNews[$news['ID']] > 1 OR $nbCommentNews[$news['ID']] == 0){ echo 's';} ?></a></div>
                <div class="clear"></div><br />
            </div><br />
<?php }
        //affichage de la pagination : numéros de pages en bas de la fenètre
        paginationListPages($nbPages, $page, $url);
printFooter();