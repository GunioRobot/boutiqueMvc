<?php printHeader('admin', false, 'administration ~ contact', true); ?>
            <div id="admin-message" class="block-middle">
                <div class="head-block">messages</div><br />
                <table style="width:100%; text-align:center;">
                <tr>
                    <td><strong>ID</strong></td>
                    <td><strong>Nom</strong></td>
                    <td><strong>E-mail</strong></td>
                    <td><strong>Voir</strong></td>
                    <td><strong>Supprimer</strong></td>
                </tr>
                <?php foreach($contactArray as $message){ ?>
                    <tr>
                        <td><?php echo htmlspecialchars($message["ID"]); ?></td>
                        <td><?php echo htmlspecialchars($message["nom"]); ?></td>
                        <td><?php echo htmlspecialchars($message["mail"]); ?></td>
                        <td><a href="contact.php?admin=show&amp;id=<?php echo $message["ID"]; ?>" class="a-img"><img src="images/eye.png" alt="[ ✔ voir ]" /></a></td>
                        <td><a href="javascript:confirmUrl('Souhaitez-vous supprimer le message n°<?php echo $message["ID"];?> de <?php echo $message["nom"];?>', 'contact.php?admin=del&amp;id=<?php echo $message["ID"]; ?>');" class="a-img"><img src="images/cross.png" alt="[ ✖ supprimer ]" /></a></td>
                    </tr>
            <?php    } ?>
                </table>
            </div>
<?php paginationListPages($nbPages, $page, $url);
printFooter(); ?>