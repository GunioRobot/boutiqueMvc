<?php printHeader('admin', false, 'administration ~ boutique', false);?>
            <div id="admin-boutique" class="block-middle">
                <div class="head-block">gestion des achats</div><br />
                <div style="text-align:center;">
                    <a href="boutique.php?admin=index">[ Gestion des produits ]</a> | <a href="boutique.php?admin=produit-add">[ Ajouter un produit ]</a> | <a href="boutique.php?admin=achat" class="active">[ Gestion des achats ]</a> | <a href="boutique.php?admin=categorie">[ Gestion des catégories ]</a>
                </div><br />
                <table style="width:100%; text-align:center;">
                <tr>
                    <td><strong>ID</strong></td>
                    <td><strong>Produit</strong></td>
                    <td><strong>Demandé par </strong></td>
                    <td><strong>Voir</strong></td>
                    <td><strong>Traité <br /> Supprimer</strong></td>
                </tr>
                <?php foreach($achatsArray as $achat){ ?>
                    <tr>
                        <td>(<?php echo $achat["ID"]; ?>)</td>
                        <td>(<?php echo htmlspecialchars($achat["ID_produit"]).') '.htmlspecialchars($achat["titre"]);?></td>
                        <td><?php if($achat['ID_membre']){?><em style="text-decoration:underline;"><?php } echo htmlspecialchars($achat["prenom"]).' '.htmlspecialchars($achat["nom"]); if($achat['ID_membre']){?></em> (<?php echo $achat['ID_membre'] .')';} ?></td>
                        <td><a href="boutique.php?admin=achat-show&amp;id=<?php echo $achat["ID"];?>" class="a-img"><img src="images/eye.png" alt="[ ☉ voir ]" /></a></td>
                        <td><a href="javascript:del_achat('<?php echo $achat["titre"];?>', '<?php echo $achat["nom"];?>', '<?php echo $achat["ID"];?>');" class="a-img"><img src="images/cross.png" alt="[ ✖ traiter ]" /></a></td>
                    </tr>
            <?php    } ?>
                </table>
            </div>
<?php paginationListPages($nbPages, $page, $url); printFooter(false); ?>