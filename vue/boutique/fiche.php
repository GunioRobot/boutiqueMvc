<?php printHeader('fiche', false, 'fiche produit : '.htmlspecialchars($titreProduit), false); ?>
            <?php foreach($produitArray as $produit) {     if($admin == 1){ ?>
            <div style="text-align:right; padding-bottom: 4px;">
                <a href="boutique.php?admin=produit-edit&amp;id=<?php echo $produit["ID"]; ?>" class="a-img">[ <img src="pencil.png" alt="✏" /> éditer ]</a> -
                <a href="boutique.php?admin=produit-del&amp;id=<?php echo $produit["ID"]; ?>" class="a-img">[ <img src="cross.png" alt="✖" /> supprimer ]</a>
            </div><?php } ?>
            <div id="fiche" class="block-middle">
                <div class="head-block"><?php echo htmlspecialchars($titreProduit); ?></div>
                <h3 style="text-align:center;"><?php echo htmlspecialchars($produit['titre']) ; ?></h3>
                <table width="100%">
                    <tr>
                        <td class="table-fiche"><strong class="table-fiche-strong">Auteur / Editeur :</strong> <?php echo htmlspecialchars($produit['auteur']); ?></td>
                    </tr>
                    <?php
                    // si les champs du site internet ne sont pas définis (pas obligatoire), on ne les affiche pas
                    if ($produit['website'] != 'http://' AND $produit['website'] != ''){ ?>
                    <tr>
                        <td class="table-fiche"><strong class="table-fiche-strong">Site :</strong> <a href="<?php echo htmlspecialchars($produit['website']);?>" ><?php echo htmlspecialchars($produit['website']);?></a></td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <td class="table-fiche"><strong class="table-fiche-strong">Ajouté le :</strong>  <?php echo htmlspecialchars($produit['ajout_date']); ?></td>
                    </tr>
                    <tr>
                        <td class="table-fiche"><strong class="table-fiche-strong">Acheté :</strong>  <?php echo htmlspecialchars($produit['achat']); ?> fois </td>
                    </tr>
                    <tr>
                        <td class="table-fiche"><strong class="table-fiche-strong">Informations Supplémentaires :</strong><br />  <?php echo nl2br(htmlspecialchars($produit['infos'])); ?></td>
                    </tr>
                    <?php
                    if ($produit['image'] != 'http://' AND $produit['website'] != ''){ ?>
                    <tr>
                        <td class="table-fiche" style="text-align:center;"><img src="<?php echo htmlspecialchars($produit['image']); ?>" alt="" /> </td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <td class="table-fiche" style="text-align:center;"><strong>Prix : </strong><?php echo htmlspecialchars($produit['prix']); ?>€ || <a href="boutique.php?produit=<?php echo htmlspecialchars($produit['ID']); ?>&amp;op=achat">Acheter ce produit ?</a></td>
                    </tr>
                </table><?php
                    }
                     ?>
      </div>
<?php printFooter(); ?>
