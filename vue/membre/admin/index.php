<?php printHeader('admin', false, 'administration ~ membre', false); ?>
                <div id="admin-membres" class="block-middle">
                    <div class="head-block">membres</div><br />
                    <table style="width:100%; text-align:center;">
                        <tr>
                            <td><strong>ID</strong></td>
                            <td><strong>Pseudo</strong></td>
                            <td><strong>Nom</strong></td>
                            <td><strong>E-mail</strong></td>
                            <td><strong>Editer</strong></td>
                            <td><strong>Supprimer</strong></td>
                        </tr>

<?php foreach($membresArray as $membre) { ?>
                        <tr>
                            <td> (<?php echo htmlspecialchars($membre["ID"]);?>)</td>
                            <td><?php echo htmlspecialchars($membre["pseudo"]);?></td>
                            <td><?php echo htmlspecialchars($membre["prenom"]).' '.htmlspecialchars($membre["nom"]);?></td>
                            <td><?php echo htmlspecialchars($membre["mail"]);?></td>
                            <td><a href="membre.php?admin=edit&amp;id=<?php echo $membre["ID"];?>" class="a-img"><img src="images/pencil.png" alt="[ ✏ éditer ]" /></a></td>
                            <td><a href="membre.php?admin=del&amp;id=<?php echo $membre["ID"];?>" class="a-img"><img src="images/cross.png" alt="[ ✖ supprimer ]" /></a></td>
                        </tr>
<?php } ?>
                    </table>
                </div>
<?php printFooter(false); ?>