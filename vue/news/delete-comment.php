<?php $redirect[0]= "news.php?id=".$id_news; $redirect[1]= "2"; printHeader('admin', $redirect, 'administration : suppression du commentaire', true);  ?>
            <div id="admin-delete" class="block-middle">
                <div class="head-block">suppression du commentaire</div><br />
                <div style="text-align:center;">Commentaire correctement supprimé<br /><br />
                    <a href="news.php?id=<?php echo $id_news; ?>">[ Retourner à la news ]</a></div>
            </div>
<?php printFooter(); ?>