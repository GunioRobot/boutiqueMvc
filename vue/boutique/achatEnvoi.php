<?php foreach($produitArray as $produit){
    printHeader('boutique', false, 'achat du produit', true); ?>
            <div id="achat" class="block-middle">
                <div class="head-block">achat du produit</div><br />
<?php
    $ok = printErreur($send);
    if ($ok == 0){ ?>
                <br /><br />
                <div style="text-align:center;">
                    <a href="boutique.php?produit=<?php echo $produit['ID']; ?>&amp;op=achat">[ Corriger votre envoi ? ]</a> ||
                    <a href="index.php">[ Page d'accueil ]</a>
                </div><?php
    } else {?>

 <div style="text-align:center;"><br /><br />
            <form action="https://www.paypal.com/cgi-bin/webscr" method="post"><fieldset>
<input type="hidden" name="cmd" value="_xclick" />
<input type="hidden" name="business" value="P7NNJECTQJBFY" />
<input type="hidden" name="lc" value="FR" />
<input type="hidden" name="item_name" value="<?php echo $produit['titre']; ?>" />
<input type="hidden" name="item_number" value="" />
<input type="hidden" name="amount" value="<?php echo $prix; ?>" />
<input type="hidden" name="currency_code" value="EUR" />
<input type="hidden" name="button_subtype" value="services" />
<input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHosted" />
<input type="image" src="https://www.paypal.com/fr_FR/FR/i/btn/btn_buynowCC_LG.gif" name="submit" alt="PayPal - la solution de paiement en ligne la plus simple et la plus sécurisée !" />
<img alt="" src="https://www.paypal.com/fr_FR/i/scr/pixel.gif" width="1" height="1" />
<br /><strong><?php echo $prix; ?>€</strong></fieldset></form>

    <br /><br />
            N\'oubliez pas que votre achat ne vous sera pas expédié "pour de faux" (!) tant que vous n\'aurez pas réglé le paiement de votre produit sur PayPal.<br />
            Afin de facilité la transaction, utiliser la même adresse email pour régler votre achat afin que je vous reconnaisse !<br /><br />
            <strong>Le paiement est réel, mais aucun produit ne vous sera pas expédié. Au cas où vous avez acheté par erreur, écrivez moi à <img src="http://dl.dropbox.com/u/2484594/test-adresse.png" alt="mon-adresse-email-protegee-des-bots-spammeurs" style="vertical-align:middle;"/> pour votre remboursement !</strong></div>
            <?php } ?>     <br /><br />
            </div>
<?php printFooter();} ?>
