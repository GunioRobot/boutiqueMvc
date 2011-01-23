<?php printHeader('liste-produits', false, $titre, false); ?>
    <div id="list-produits" class="block-middle">
        <div class="head-block"><?php echo $titre; ?></div>
        <?php foreach($produitsArray as $produit){ ?>
        <div style="margin:8px; border:1px dashed #bfc9d7; padding:4px;">
            <div style="float:right; color:red; font-size: 14px; font-weight: bold;"><?php if(isset($top)){ echo 'top '.$top.' | '; $top++;} if(isset($categorie) AND $categorie == 'new'){ echo $produit['date'].' | '; } echo $produit['prix'].'€'; ?></div>
            <div style="float:left;"><a href="boutique.php?produit=<?php echo htmlspecialchars($produit['ID']); ?>" class="a-img"><img src="<?php echo htmlspecialchars($produit['image']); ?>" style="height:75px; padding-right:5px;" alt="vignette-<?php echo htmlspecialchars($produit['ID']); ?>" /></a></div>
            <strong>
                <a href="boutique.php?produit=<?php echo htmlspecialchars($produit['ID']); ?>"> <?php echo htmlspecialchars($produit['titre']); ?> </a></strong><br />
                <?php
                while(preg_match('#(.*)<.*>(.*)#', $produit['infos'])){
                    $produit['infos'] = preg_replace('#(.*)<.*>(.*)#', '$1$2', $produit['infos']);
                }
                echo substr($produit['infos'], 0, 450); if(strlen($produit['infos']>=450)){echo'...';}?>
            <div class="clear_float"></div>
        </div>
        <?php } ?>
    </div>
<?php
        //affichage de la pagination : numéros de pages en bas de la fenètre
        paginationListPages($nbPages, $page, $url);

 printFooter(); ?>