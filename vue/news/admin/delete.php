<?php printHeader('admin', false, 'administration : suppression de la news', true);  ?>
            <div id="admin-delete" class="block-middle">
                <div class="head-block">suppression de la news n°<?php echo $id; ?></div><br />
                <div style="text-align:center;">News correctement supprimée<br /><br />
                    <a href="news.php?admin=index">[ Retourner à la gestion des news ]</a></div>
            </div>
<?php printFooter(false); ?>