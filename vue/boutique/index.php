<?php
printHeader('boutique', false, 'boutique', false); ?>
            <div id="top4-middle" class="block-middle">
                <div class="head-block">top 4</div>
                <table style="width:100%; text-align:center;">
                    <tr><?php
                foreach($top4Array as $top4){ ?>
                        <td><a href="boutique.php?produit=<?php echo $top4['ID'] ?>" class="a-img"><img src="<?php echo $top4['image'] ?>" alt="<?php echo $top4['titre'] ?>" style="max-width:175px; max-height:250px;" /></a><br />
                <a href="boutique.php?produit=<?php echo $top4['ID'] ?>" ><?php echo $top4['titre'] ?> (acheté <?php echo $top4['achat'] ?> fois)</a></td><?php
                } ?>
                    </tr>
                </table>
            </div>

            <div id="boutique-liste-genres" class="block-middle" style="float:left; width:49.5%;">
                <div class="head-block">Genre</div>
                <ul>
                    <?php
                    foreach($categoriesArray as $cat){ ?>
                    <li><a href="boutique.php?cat=<?php echo htmlspecialchars($cat['nom'])?>"><?php echo $cat['nom'] ?></a></li><?php
                    }  ?>
                </ul>
            </div>

            <div id="boutique-text-right" class="block-middle" style="float:right; width:49.5%; text-align:center;">
                <div class="head-block">Classement</div>
                <a href="boutique.php?top=10">Voir les produits du top 10</a><br />
                <a href="boutique.php?cat=new">Voir les nouveautés</a><br /><br />
                Classement des produits par ordre alphabétique :<br />
                <a href="boutique.php?alpha=A">A</a> <a href="boutique.php?alpha=B">B</a> <a href="boutique.php?alpha=C">C</a> <a href="boutique.php?alpha=D">D</a> <a href="boutique.php?alpha=E">E</a> <a href="boutique.php?alpha=F">F</a> <a href="boutique.php?alpha=G">G</a> <a href="boutique.php?alpha=H">H</a> <a href="boutique.php?alpha=I">I</a> <a href="boutique.php?alpha=J">J</a> <a href="boutique.php?alpha=K">K</a> <a href="boutique.php?alpha=L">L</a> <a href="boutique.php?alpha=M">M</a> <a href="boutique.php?alpha=N">N</a> <a href="boutique.php?alpha=O">O</a> <a href="boutique.php?alpha=P">P</a> <a href="boutique.php?alpha=Q">Q</a> <a href="boutique.php?alpha=R">R</a> <a href="boutique.php?alpha=S">S</a> <a href="boutique.php?alpha=T">T</a> <a href="boutique.php?alpha=U">U</a> <a href="boutique.php?alpha=V">V</a> <a href="boutique.php?alpha=W">W</a> <a href="boutique.php?alpha=X">X</a> <a href="boutique.php?alpha=Y">Y</a> <a href="boutique.php?alpha=Z">Z</a>
                <br/><br/>
                <a href="boutique.php?op=listAll">Voir tous les produits (sans classement)</a><br /><br />
            </div>
<?php printFooter(false); ?>
