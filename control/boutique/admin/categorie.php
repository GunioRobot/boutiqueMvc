<?php include("functions.php"); checkLogin(); verifUserIsAdmin();
include_once('modele/boutique/getListCategories.php');
include_once('modele/boutique/ajoutDelCategorie.php');
$url = 'boutique.php?admin=categorie';

if(isset($_POST['cat'])){
    ajoutCategorie($_POST['cat']);
}
elseif(isset($_GET['id'])){
    deleteCategorie($_GET['id']);
}


$nbCategories = getNombreCategories();
$nbPages=(int)($nbCategories/$produitsParPage)+1;
    if(($nbCategories%$produitsParPage) == 0) {$nbPages = ($nbPages-1);}
    if(!isset($_GET['page'])) // si pas de ?page= --> on en conclut que c'est la page 1 qu'on veut
    {
        $_GET['page'] = '1';
    }
    if(isset($_GET['page'])) { $page = (int)($_GET['page']); }
    if(isset($page) && $page <= $nbPages && $page > 0){
        $start = ($page-1)*$produitsParPage;
        $categoriesArray = getListCategoriesLimit($start, $produitsParPage);
        include_once('vue/boutique/admin/categorie.php');
    }
    else {
        $js = false; $admin= false; $page = 'admin'; $titreErreur = 'administration ~ boutique - erreur'; $erreur = 'Aucune catégorie dans cette boutique!';
        include_once('vue/erreur.php');
    }