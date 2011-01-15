<?php
printHeader('accueil', false, 'accueil', false); 
foreach ($newsArray as $news) { ?>
            <div id="news-<?php echo $news['ID']; ?>" class="block-middle">
                <div class="head-block"><a href="news.php?id=<?php echo $news['ID'].'">'.$news['titre']; ?></a></div>
                <div style="padding-left:5px;"><?php echo nl2br($news['texte']); ?></div><br />
                <div id="auteur-<?php echo $news['ID']; ?>" style="float:right;">Posté par <?php echo $news['auteur']; ?> le <?php echo $news['date']; ?></div>
                <div class="clear"></div><br />
            </div><br />
<?php }

   $url='index.php';
        //affichage de la pagination : numéros de pages en bas de la fenètre
        paginationListPages($nbPages, $page, $url);
printFooter(false);