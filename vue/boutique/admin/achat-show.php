<?php printHeader('admin', false, 'administration ~ achat', false);
foreach ($achatArray as $achat) { ?>
            <div id="admin-view" class="block-middle">
                <div class="head-block">achat n°'<?php echo htmlspecialchars($_GET['id']) ?></div><br />
                <table width="100%">
                    <tr>
                        <td class="table-fiche"><strong class="table-fiche-strong">Produit :</strong> <?php echo htmlspecialchars($achat['titre']) ?></td>
                    </tr>
                    <tr>
                        <td class="table-fiche"><strong class="table-fiche-strong">Acheteur :</strong> <?php echo htmlspecialchars($achat['prenom']) . ' '. htmlspecialchars($achat['nom']) ?></td>
                    </tr>
                    <tr>
                        <td class="table-fiche"><strong class="table-fiche-strong">E-mail :</strong>  <?php echo htmlspecialchars($achat['mail']) ?></td>
                    </tr>
                    <tr>
                        <td class="table-fiche"><strong class="table-fiche-strong">Adresse :</strong>  <?php echo htmlspecialchars($achat['adresse']) ?></td>
                    </tr>
                    <tr>
                        <td class="table-fiche"><strong class="table-fiche-strong">Ville :</strong>  <?php echo htmlspecialchars($achat['codepostal']) . ' '. htmlspecialchars($achat['ville']) ?></td>
                    </tr>
                    <tr>
                        <td class="table-fiche"><strong class="table-fiche-strong">Pays :</strong>  <?php echo htmlspecialchars($achat['pays']) ?></td>
                    </tr>
                    <tr>
                        <td class="table-fiche" style="text-align:center;"><a href="boutique.php?admin=achat-del&amp;id=<?php echo htmlspecialchars($_GET['id']) ?>">Expédier/Supprimer cette demande</a><br />
                            <a href="boutique.php?admin=achat">Retourner à la page précédante</a></td>
                    </tr>
                </table>
        </div>
<?php } printFooter(false); ?>