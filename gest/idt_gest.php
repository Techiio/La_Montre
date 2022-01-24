<?php

session_start();
require("../load/config_PDO.php");

//Données du formulaire
$Idt= htmlentities($_POST['Idt']);
$Newidt = htmlentities($_POST['New_Idt']);

//Variable de vérification des droits
$rq=$bdd->query("SELECT  CodeFamille FROM profil WHERE Identifiant= '$Idt'");
$requete=$rq->fetch();
$Code_Famille_Idt=$requete['CodeFamille'];
$Code_Famille_gest=$_COOKIE['famille'];


//restriction aux comptes utilisateurs de la famille
if (!empty($_POST["Idt"] && $Code_Famille_Idt==$Code_Famille_gest)) {

    //vérifier l'unicité d'un identifiant
    $test_doublon=$bdd->query("SELECT count(Identifiant) as compte FROM connexion WHERE '$Newidt'= Identifiant");
    $Valeur_test=$test_doublon->fetch();
    $test_doublon->closeCursor();

    //changement du mot de passe
    if($Valeur_test['compte']==0){
    $rq = $bdd->query("UPDATE  profil SET Identifiant='$Newidt' WHERE Identifiant= '$Idt'");
    $requete = $bdd->query("UPDATE  connexion SET Identifiant='$Newidt' WHERE Identifiant= '$Idt'");
    header('location: ../user-gest-admin/gest_modif-membre.php?message=1');}

    //"nom d'utilisateur déjà pris"
    else{header('location: ../user-gest-admin/gest_modif-membre.php?message=2');}
}
    //"Pas d'utilisateur dans la famille avec ce prénom"
else{
    header('location: ../user-gest-admin/gest_modif-membre.php?message=3');}




