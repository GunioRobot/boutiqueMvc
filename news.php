<?php
session_start();
include_once('modele/connexion_sql.php');
$newsParPage = 5;
$commentsParPage = 10;
if(isset($_GET['id'])) { $id = (int)($_GET['id']); }
if(isset($_GET['op']) AND $_GET['op'] == 'envoi-comment')
{
    include_once('control/news/envoi-comment.php');
}
if (isset($_GET['admin']) AND $_GET['admin'] == 'index')
{
    include_once('control/news/admin/index.php');
}
elseif(isset($_GET['admin']) AND $_GET['admin'] == 'edit' AND isset($_GET['id']))
{
    include_once('control/news/admin/edit.php');
}
elseif(isset($_GET['admin']) AND $_GET['admin'] == 'del' AND isset($_GET['id']))
{
    include_once('control/news/admin/delete.php');
}
elseif(isset($_GET['admin']) AND $_GET['admin'] == 'add')
{
    include_once('control/news/admin/add.php');
}
elseif(isset($_GET['admin']) AND ($_GET['admin'] == 'envoiNew' OR $_GET['admin'] == 'envoiUpdate'))
{
    include_once('control/news/admin/envoi.php');
}
elseif ((isset($id)) AND $id > 0)
{
    include_once('control/news/view.php');
}
else
{
    include_once('control/news/index.php');
}