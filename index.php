<?php
session_start();
include_once('modele/connexion_sql.php');

if (isset($_GET['id']))
{
    include_once('control/news/view.php');
}
else
{
    include_once('control/news/index.php');
}