<?php
session_start();
include_once('modele/connexion_sql.php');

if (isset($_GET['op']) AND $_GET['op'] == 'envoi')
{
    include_once('control/contact/envoi.php');
}
elseif(isset($_GET['admin']))
{
    switch ($_GET['admin']) {
        case 'show': include_once('control/contact/admin/show.php'); break;
        case 'del': include_once('control/contact/admin/delete.php'); break;

        default: include_once('control/contact/admin/index.php'); break;
    }
}
else
{
    include_once('control/contact/index.php');
}