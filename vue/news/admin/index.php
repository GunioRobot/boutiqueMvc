<?php printHeader('admin', false, 'administration ~ news', false); ?>
            <div id="admin-news" class="block-middle">
                <div class="head-block">news</div><br />
                <div style="text-align:center;">
                    <a href="news.php?admin=index" class="active">[ Gestion des news ]</a> | <a href="news.php?admin=add">[ Ajouter une news ]</a>
                </div><br />
                <table style="width:100%; text-align:center;">
                <tr>
                    <td><strong>ID</strong></td>
                    <td><strong>Titre</strong></td>
                    <td><strong>Auteur</strong></td>
                    <td><strong>Date</strong></td>
                    <td><strong>Editer</strong></td>
                    <td><strong>Supprimer</strong></td>
                </tr>
                <?php foreach($newsArray as $news){ ?>
                    <tr>
                        <td><?php echo htmlspecialchars($news["ID"]); ?></td>
                        <td><?php echo htmlspecialchars($news["titre"]); ?></td>
                        <td><?php echo htmlspecialchars($news["auteur"]); ?></td>
                        <td><?php echo htmlspecialchars($news["date"]); ?></td>
                        <td><a href="news.php?admin=edit&amp;id=<?php echo $news["ID"]; ?>" class="a-img"><img src="images/pencil.png" alt="[ ✏ éditer ]" /></a></td>
                        <td><a href="news.php?admin=del&amp;id=<?php echo $news["ID"]; ?>" class="a-img"><img src="images/cross.png" alt="[ ✖ supprimer ]" /></a></td>
                    </tr>
            <?php    } ?>
                </table>
            </div>
<?php printFooter(false); ?>