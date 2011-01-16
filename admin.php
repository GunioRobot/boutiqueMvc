<?php session_start();
include_once('modele/connexion_sql.php');
include_once("functions.php"); checkLogin();

    global $bdd;

    $req = $bdd->query('SELECT * FROM modules') or die(print_r($bdd->errorInfo()));
    $result = $req->fetchAll();


printHeader('admin', false, 'administration', true); ?>
            <div id="admin" class="block-middle">
                <div class="head-block">administration</div><br />
                <table style="width:100%; text-align:center;">
                    <tr>
                        <?php foreach($result as $element){ if($element['admin']){ ?>
                        <td>
                            <a href="<?php echo $element['name'];?>.php?admin=index"><?php echo strtoupper($element['name']);?></a>
                        </td>
                        <?php }} ?>
                    </tr>
                </table>
            </div>
<?php printFooter(false); ?>
