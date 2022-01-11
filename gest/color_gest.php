<?php

session_start();

//connexion à la base de données
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8',
        'root',
        '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
//Données du formulaire + cookie
$Idt= $_POST['Idt'];
$Newcolor = $_POST['new_color'];
$CodeF= $_COOKIE['famille'];

//vérification de l'existence de l'identifiant
$existence_identifiant_famille=$bdd->query("SELECT count(Identifiant) as compte FROM profil WHERE '$Idt'= Identifiant AND '$CodeF' = CodeFamille ");
$Valeur_test=$existence_identifiant_famille->fetch();
$existence_identifiant_famille->closeCursor();


//Changement de la couleur
if($Valeur_test['compte']==1){

if (!empty($_POST["Idt"])) {
    $rq = $bdd->query("UPDATE  profil SET Couleur='$Newcolor' WHERE Identifiant='$Idt'");
    header('location: ../gest_modif-membre.php?message=4');
}}
else{
    header('location: ../gest_modif-membre.php?message=5');
}




