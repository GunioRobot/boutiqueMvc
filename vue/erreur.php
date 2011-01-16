<?php
printHeader($page, $redirect, $titreErreur, $js); ?>
            <div style="margin:8px; border:1px dashed #bfc9d7; padding:4px; text-align:center; color: red;">
                <strong><?php echo $erreur; ?></strong><br />
            </div>
<?php
printFooter();