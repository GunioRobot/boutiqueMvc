//fonction del_achat : fonction qui demande une confirmation pour la suppression d'un achat membre
function del_achat(produit, membre, id) {
    if (confirm('Vous êtes sur le point de supprimer l\'achat de '+produit+' effectué par '+membre+' ! Continuer ?'))
        {document.location.href = 'boutique.php?admin=achat-del&id='+id;}
}
function confirmUrl(message, url) {
    if (confirm(message+' ! Continuer ?'))
        {document.location.href = url;}
}

function surligne(champ, erreur)
{
    //cette fonction permet de changer la couleur de fond d'un champ pré-défini en paramètre
   if(erreur)
      champ.style.backgroundColor = "#fba";
   else
      champ.style.backgroundColor = "";
}
function clearTextArea(champ, valeurDefaut)
{
    //cette fonction permet de vider la valeur pré-défini d'un champs donné
    if(champ.value == valeurDefaut){champ.value = "";}
}

function verifRegex(champ, regex)
{
    if(!regex.test(champ.value))
    {
        surligne(champ, true);
        return false;
    }
    else
    {
        surligne(champ, false);
        return true;
    }
}

function verifTextAreaDefaut(champ, texteParDefaut){
    if(champ.value == texteParDefaut || champ.value == '')
    {
      surligne(champ, true);
      return false;
    }
    else
    {
      surligne(champ, false);
      return true;
    }
}
function verifMessage(champ)
{
    if(champ.value == 'Écrivez votre message...' || champ.value == '')
    {
      surligne(champ, true);
      return false;
    }
    else
    {
      surligne(champ, false);
      return true;
    }
}
function verifDescription(champ)
{
    if(champ.value == 'Description du produit' || champ.value == '')
    {
      surligne(champ, true);
      return false;
    }
    else
    {
      surligne(champ, false);
      return true;
    }
}
function affichageErreur(cond, element)
{
    if(cond)
        document.getElementById(element).style.display = "none";
    else
        document.getElementById(element).style.display = "";
}
var rgxNom = /^[a-zA-Z_é' èàêëâç-]{2,45}$/;
var rgxPseudo = /^[a-zA-Z_'\-^@.`0-9]{3,45}$/;
var rgxTitre = /^[a-zA-Z_'\-.`0-9_é' èâàê!:;,/.?)(ëç@&]{1,100}$/;
var rgxAdresse = /^[a-zA-Z_é' èà0-9ê,ëâç-]{10,100}$/;
var rgxPassword = /^.{4,45}$/;
var rgxPostal = /^[0-9]{5}$/;
var rgxPrix = /^[0-9]{1,8}.[0-9]{0,2}$/;
var rgxMail = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{1,}\.[a-z]{2,4}$/;
var rgxNombre = /^[0-9]+$/
var rgxDate = /^[\d]{4}-[\d]{2}-[\d]{2} [\d]{2}:[\d]{2}:[\d]{2}$/

var defautContact = 'Écrivez votre message...';
var defautProduit = 'Description du produit';
var defautNews = 'Texte de l\'actualité';

function verifPasswordRepeat(a, b){
    if(a.value != b.value){return false}
    else {return true}
}
function verifChangePassword(champ){
    if(champ.value.length == 0){
        surligne(champ, false); return true;
    }
    else {
        return verifRegex(champ, rgxPassword);
    }
}

function verifFormContact(f)
{
   var nomOk = verifRegex(f.nom, rgxNom);
   var mailOk = verifRegex(f.mail, rgxMail);
   /*var messageOk = verifTextAreaDefaut(f.message, defautContact);*/

   if(nomOk && mailOk && messageOk)
      return true;
   else
   {
      alert("Veuillez remplir correctement tous les champs");
      affichageErreur(mailOk, "footerErreurMail");
      affichageErreur(nomOk, "footerErreurNom");
      /*affichageErreur(messageOk, "footerErreurMessage");*/
      return false;
   }
}
function verifFormAchat(f)
{
   var nomOk = verifRegex(f.nom, rgxNom);
   var prenomOk = verifRegex(f.prenom, rgxNom);
   var mailOk = verifRegex(f.mail, rgxMail);
   var adresseOk = verifRegex(f.adresse, rgxAdresse);
   var codepostalOk = verifRegex(f.codepostal, rgxPostal);
   var villeOk = verifRegex(f.ville, rgxNom);
   var paysOk = verifRegex(f.pays, rgxNom);

   if(nomOk && mailOk && prenomOk && adresseOk && codepostalOk && villeOk && paysOk)
      return true;
   else
   {
      alert("Veuillez remplir correctement tous les champs");
      affichageErreur(mailOk, "footerErreurMail");
      affichageErreur(nomOk, "footerErreurNom");
      affichageErreur(prenomOk, "footerErreurPrenom");
      affichageErreur(adresseOk, "footerErreurAdresse");
      affichageErreur(codepostalOk, "footerErreurCodePostal");
      affichageErreur(villeOk, "footerErreurVille");
      affichageErreur(paysOk, "footerErreurPays");
      return false;
   }
}
function verifFormMembrePanel(f)
{
    var nomOk = verifRegex(f.nom, rgxNom);
    var prenomOk = verifRegex(f.prenom, rgxNom);
    var mailOk = verifRegex(f.mail, rgxMail);
    var adresseOk = verifRegex(f.adresse, rgxAdresse);
    var codepostalOk = verifRegex(f.codepostal, rgxPostal);
    var villeOk = verifRegex(f.ville, rgxNom);
    var paysOk = verifRegex(f.pays, rgxNom);
    if (f.changePassword.value != '') { var changePasswordOk = verifRegex(f.changePassword, rgxPassword);}
    var passwordConcordeOk = verifPasswordRepeat(f.changePassword, f.changePassword2);
    var oldPasswordOk = verifRegex(f.changePasswordOld, rgxPassword);

   if ((f.changePassword.value != '' && !changePasswordOk) || !passwordConcordeOk || (!oldPasswordOk && f.changePassword.value != ''))
       {
           alert("Veuillez remplir correctement tous les champs");
      affichageErreur(changePasswordOk, "footerErreurChangePassword");
      affichageErreur(passwordConcordeOk, "footerErreurChangePassword2");
      affichageErreur(oldPasswordOk, "footerErreurChangePasswordOld");
      affichageErreur(mailOk, "footerErreurMail");
      affichageErreur(nomOk, "footerErreurNom");
      affichageErreur(prenomOk, "footerErreurPrenom");
      affichageErreur(adresseOk, "footerErreurAdresse");
      affichageErreur(codepostalOk, "footerErreurCodePostal");
      affichageErreur(villeOk, "footerErreurVille");
      affichageErreur(paysOk, "footerErreurPays");
      return false;
       }

   if(nomOk && mailOk && prenomOk && adresseOk && codepostalOk && villeOk && paysOk)
      return true;
   else
   {
      alert("Veuillez remplir correctement tous les champs");
      affichageErreur(mailOk, "footerErreurMail");
      affichageErreur(nomOk, "footerErreurNom");
      affichageErreur(prenomOk, "footerErreurPrenom");
      affichageErreur(adresseOk, "footerErreurAdresse");
      affichageErreur(codepostalOk, "footerErreurCodePostal");
      affichageErreur(villeOk, "footerErreurVille");
      affichageErreur(paysOk, "footerErreurPays");
      affichageErreur(true, "footerErreurChangePassword");
      affichageErreur(passwordConcordeOk, "footerErreurChangePassword2");
      affichageErreur(oldPasswordOk, "footerErreurChangePasswordOld");
      return false;
   }
}
function verifFormAddProduit(f)
{
   var titreOk = verifRegex(f.titre, rgxTitre);
   var auteurOk = verifRegex(f.auteur, rgxTitre);
   var descriptionOk = verifTextAreaDefaut(f.infos, defautProduit);
   var prixOk = verifRegex(f.prix, rgxPrix);

   if(titreOk && auteurOk && descriptionOk && prixOk)
      return true;
   else
   {
      alert("Veuillez remplir correctement tous les champs");
      affichageErreur(titreOk, "footerErreurNom");
      affichageErreur(auteurOk, "footerErreurAuteur");
      affichageErreur(descriptionOk, "footerErreurDescription");
      affichageErreur(prixOk, "footerErreurPrix");
      return false;
   }
}
function verifFormMembreRegister(f)
{
   var pseudoOk = verifRegex(f.pseudo, rgxPseudo);
   var passwordOk = verifRegex(f.password, rgxPassword);
   var passwordConcordeOk = verifPasswordRepeat(f.password, f.password2);
   var mailOk = verifMail(f.mail);

   if(pseudoOk && passwordOk && mailOk && passwordConcordeOk)
      return true;
   else
   {
      alert("Veuillez remplir correctement tous les champs");
      affichageErreur(pseudoOk, "footerErreurPseudo");
      affichageErreur(passwordOk, "footerErreurPassword");
      if (passwordOk) { affichageErreur(passwordConcordeOk, "footerErreurPassword2"); }
      affichageErreur(mailOk, "footerErreurMail");
      return false;
   }
}
function verifFormNews(f, auteur)
{
   var titreOk = verifRegex(f.titre, rgxTitre);
   if(auteur == 1){var idOk = verifRegex(f.id, rgxNombre);}
   var dateOk = verifRegex(f.date, rgxDate);
   if(auteur == 1){var auteurOk = verifRegex(f.auteur, rgxPseudo);}
   if(auteur == 1 && (!idOk || !auteurOk)){
       alert("Veuillez remplir correctement tous les champs");
      affichageErreur(idOk, "footerErreurID");
      affichageErreur(auteurOk, "footerErreurAuteur");
      return false;
   }
   if(titreOk && dateOk)
      return true;
   else
   {
      alert("Veuillez remplir correctement tous les champs");
      affichageErreur(titreOk, "footerErreurTitre");
      affichageErreur(dateOk, "footerErreurDate");
      return false;
   }
}
function verifFormAdminModifMembre(f)
{
    var pseudoOk = verifRegex(f.pseudo, rgxPseudo);
    var nomOk = verifRegex(f.nom, rgxNom);
    var prenomOk = verifRegex(f.prenom, rgxNom);
    var mailOk = verifRegex(f.mail, rgxMail);
    var adresseOk = verifRegex(f.adresse, rgxAdresse);
    var codepostalOk = verifRegex(f.codepostal, rgxPostal);
    var villeOk = verifRegex(f.ville, rgxNom);
    var paysOk = verifRegex(f.pays, rgxNom);
    if (f.changePassword.value != '') { var changePasswordOk = verifRegex(f.changePassword, rgxPassword);}
    var passwordConcordeOk = verifPasswordRepeat(f.changePassword, f.changePassword2);

    if ((f.changePassword.value != '' && !changePasswordOk) || !passwordConcordeOk)
    {
        alert("Veuillez remplir correctement tous les champs");
        affichageErreur(changePasswordOk, "footerErreurChangePassword");
        affichageErreur(passwordConcordeOk, "footerErreurChangePassword2");
        affichageErreur(pseudoOk, "footerErreurPseudo");
        affichageErreur(mailOk, "footerErreurMail");
        affichageErreur(nomOk, "footerErreurNom");
        affichageErreur(prenomOk, "footerErreurPrenom");
        affichageErreur(adresseOk, "footerErreurAdresse");
        affichageErreur(codepostalOk, "footerErreurCodePostal");
        affichageErreur(villeOk, "footerErreurVille");
        affichageErreur(paysOk, "footerErreurPays");
        return false;
    }

    if(pseudoOk && nomOk && mailOk && prenomOk && adresseOk && codepostalOk && villeOk && paysOk)
        return true;
    else
    {
        alert("Veuillez remplir correctement tous les champs");
        affichageErreur(pseudoOk, "footerErreurPseudo");
        affichageErreur(mailOk, "footerErreurMail");
        affichageErreur(nomOk, "footerErreurNom");
        affichageErreur(prenomOk, "footerErreurPrenom");
        affichageErreur(adresseOk, "footerErreurAdresse");
        affichageErreur(codepostalOk, "footerErreurCodePostal");
        affichageErreur(villeOk, "footerErreurVille");
        affichageErreur(paysOk, "footerErreurPays");
        affichageErreur(true, "footerErreurChangePassword");
        affichageErreur(passwordConcordeOk, "footerErreurChangePassword2");
        return false;
    }
}
function verifFormMembreLogin(f)
{
   var pseudoOk = verifRegex(f.pseudo, rgxPseudo);
   var passwordOk = verifRegex(f.password, rgxPassword);

   if(pseudoOk && passwordOk)
      return true;
   else
   {
      alert("Veuillez remplir correctement tous les champs");
      affichageErreur(pseudoOk, "footerErreurPseudo");
      affichageErreur(passwordOk, "footerErreurPassword");
      return false;
   }
}

function reinistialiseAchat() {
    surligne(document.getElementById('mail'), false);
    surligne(document.getElementById('prenom'), false);
    surligne(document.getElementById('nom'), false);
    surligne(document.getElementById('adresse'), false);
    surligne(document.getElementById('codepostal'), false);
    surligne(document.getElementById('ville'), false);
    surligne(document.getElementById('pays'), false);
    surligne(document.getElementById('changePassword'), false);
      affichageErreur(true, "footerErreurMail");
      affichageErreur(true, "footerErreurNom");
      affichageErreur(true, "footerErreurPrenom");
      affichageErreur(true, "footerErreurAdresse");
      affichageErreur(true, "footerErreurCodePostal");
      affichageErreur(true, "footerErreurVille");
      affichageErreur(true, "footerErreurPays");
      affichageErreur(true, "footerErreurChangePassword");
}
function reinistialiseContact() {
    surligne(document.getElementById('mail'), false);
    surligne(document.getElementById('message'), false);
    surligne(document.getElementById('nom'), false);
      affichageErreur(true, "footerErreurMail");
      affichageErreur(true, "footerErreurNom");
      affichageErreur(true, "footerErreurMessage");
}
function reinistialiseAddProduit() {
    surligne(document.getElementById('titre'), false);
    surligne(document.getElementById('auteur'), false);
    surligne(document.getElementById('infos'), false);
      affichageErreur(true, "footerErreurNom");
      affichageErreur(true, "footerErreurAuteur");
      affichageErreur(true, "footerErreurDescription");
}
function reinistialiseAdminMembre() {
    surligne(document.getElementById('footerErreurNom'), false);
    surligne(document.getElementById('footerErreurMail'), false);
    surligne(document.getElementById('footerErreurPseudo'), false);
    surligne(document.getElementById('footerErreurAdresse'), false);
    surligne(document.getElementById('footerErreurCodePostal'), false);
    surligne(document.getElementById('footerErreurVille'), false);
    surligne(document.getElementById('footerErreurPays'), false);
    surligne(document.getElementById('changePassword'), false);
      affichageErreur(true, "footerErreurPseudo");
      affichageErreur(true, "footerErreurMail");
      affichageErreur(true, "footerErreurNom");
      affichageErreur(true, "footerErreurPrenom");
      affichageErreur(true, "footerErreurAdresse");
      affichageErreur(true, "footerErreurCodePostal");
      affichageErreur(true, "footerErreurVille");
      affichageErreur(true, "footerErreurPays");
      affichageErreur(true, "footerErreurChangePassword");
}