<?php
printHeader('fiche', false, 'fiche produit : '.htmlspecialchars($titreProduit), false); ?>
            <div id="fiche" class="block-middle">
                <div class="head-block"><?php echo htmlspecialchars($titreProduit); ?></div>
                    <?php foreach($produitArray as $produit) {  ?>
                <h3 style="text-align:center;"><?php echo htmlspecialchars($produit['titre']) ; ?></h3>
                <table width="100%">
                    <tr>
                        <td class="table-fiche"><strong class="table-fiche-strong">Auteur / Editeur :</strong> <?php echo htmlspecialchars($produit['auteur']); ?></td>
                    </tr>
                    <?php
                    // si les champs du site internet ne sont pas définis (pas obligatoire), on ne les affiche pas
                    if ($produit['website'] != 'http://' AND $produit['website'] != ''){ echo '
                    <tr>
                        <td class="table-fiche"><strong class="table-fiche-strong">Site :</strong> <a href="'.htmlspecialchars($produit['website']).'" >'. htmlspecialchars($produit['website']) .'</a></td>
                    </tr>';
                    } ?>
                    <tr>
                        <td class="table-fiche"><strong class="table-fiche-strong">Ajouté le :</strong>  <?php echo htmlspecialchars($produit['ajout_date']); ?></td>
                    </tr>
                    <tr>
                        <td class="table-fiche"><strong class="table-fiche-strong">Acheté :</strong>  <?php echo htmlspecialchars($produit['achat']); ?> fois </td>
                    </tr>
                    <tr>
                        <td class="table-fiche"><strong class="table-fiche-strong">Informations Supplémentaires :</strong><br />  <?php echo nl2br(htmlspecialchars($produit['infos'])); ?></td>
                    </tr>
                    <tr>
                        <td class="table-fiche" style="text-align:center;"><img src="<?php echo htmlspecialchars($produit['image']); ?>" alt="" /> </td>
                    </tr>
                    <tr>
                        <td class="table-fiche" style="text-align:center;"><strong>Prix : </strong><?php echo htmlspecialchars($produit['prix']); ?>€ || <a href="boutique.php?produit=<?php echo htmlspecialchars($produit['ID']); ?>&amp;op=achat">Acheter ce produit ?</a></td>
                    </tr>
                </table><?php
                    }
                     ?>
      </div>
<?php printFooter(false); ?>
