<?php  include("functions.php"); checkLogin();

include_once('modele/contact/selectInfosMembre.php');
$membreArray = selectInfosMembre();

if(!$_SESSION['login']){
require_once('recaptchalib.php');
$publickey = "6LeY-7kSAAAAAP6I1bSIh9elEmQv3XbCTEMOYkVo"; // you got this from the signup page
}

// On affiche la page (vue)
include_once('vue/contact/index.php');
?>
            

