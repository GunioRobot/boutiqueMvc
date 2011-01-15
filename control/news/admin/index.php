<?php include("functions.php"); checkLogin(); verifUserIsAdmin();
include_once ('modele/news/getNews.php'); include_once ('modele/news/getNombreNews.php');

    $newsParPage = 20;
//pour la pagination, on va compter le nombre de produits correspondant à notre requète
        $nbNews = getNombreNews();
        //on souhaite 5 news par page, le nombre de page est égal au nombre de news total divisé par 5.
        //dans la plupart des cas, on aura un réel. pas de possibilité d'avoir 2.6 pages, on rajoute une page au cas où ca ne tombe pas juste
        $nbPages=(int)($nbNews/$newsParPage)+1;
        //on vérifie qu'au cas où le résultat tombe juste, on affiche pas une page en plus qui serait vide
        if(($nbNews%$newsParPage) == 0) {$nbPages = ($nbPages-1);}
        if(!isset($_GET['page'])) { $_GET['page'] = '1'; } // pas de pages --> page 1
        //on transforme le numero de page en entier, si la variable page n'est pas un nombre, page sera égal à 0
        if(isset($_GET['page'])) { $page = (int)($_GET['page']); }
        //on vérifie maintenant que le numero de page existe bien
        if(isset($page) AND $page <= $nbPages AND $page > 0)
        {
            $newsArray = getNews((($page-1)*$newsParPage), $newsParPage, 'ID ASC');
            include_once('vue/news/admin/index.php');
        }
        else //erreur dans le choix de la page (0 -1 etc...)
        {
            $js = false; $admin= false; $page = 'admin'; $titreErreur = 'administration ~ news - erreur'; $erreur = 'Aucune news ne se trouve sur cette page!';
            include_once('vue/erreur.php');
        }



