<?php printHeader('admin', false, 'administration ~ message', false);
foreach ($messageArray as $message) { ?>
            <div id="admin-message-view" class="block-middle">
                <div class="head-block">Message n°'<?php echo htmlspecialchars($_GET['id']) ?></div><br />
                <table width="100%">
                    <tr>
                        <td class="table-fiche"><strong class="table-fiche-strong">Nom/Prénom :</strong> <?php echo htmlspecialchars($message['nom']) ?></td>
                    </tr>
                    <tr>
                        <td class="table-fiche"><strong class="table-fiche-strong">E-mail :</strong>  <a href="mailto:<?php echo htmlspecialchars($message['mail']).'">'.htmlspecialchars($message['mail']); ?></a></td>
                    </tr>
                    <?php if($message['website'] != '' AND $message['website'] != 'http://'){ //si le champs est vide, autant ne pas l'afficher
        ?>
                    <tr>
                        <td class="table-fiche"><strong class="table-fiche-strong">Site internet :</strong>  <?php echo '<a href="'.htmlspecialchars($message['website']).'">'.htmlspecialchars($message['website']).'</a>' ?></td>
                    </tr> <?php } ?>
                    <tr>
                        <td class="table-fiche"><strong class="table-fiche-strong">Message :</strong><br />  <?php echo nl2br(htmlspecialchars($message['message'])) ?></td>
                    </tr>
                    <tr>
                        <td class="table-fiche" style="text-align:center;">
                            <a href="mailto:<?php echo htmlspecialchars($message['mail']) ?>">Répondre à l'utilisateur</a>  ||
                            <a href="contact.php?admin=del&amp;id=<?php echo htmlspecialchars($_GET['id']) ?>">Expédier/Supprimer cette demande</a><br />
                            <a href="contact.php?admin=index">Retourner à la page précédante</a></td>
                    </tr>
                </table>
        </div>
<?php }
printFooter(); ?>