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
$Idt= htmlentities($_POST['Idt']);
$Newcolor = htmlentities($_POST['new_color']);
$CodeF= htmlentities($_COOKIE['famille']);

//vérification de l'existence de l'identifiant
$existence_identifiant_famille=$bdd->query("SELECT count(Identifiant) as compte FROM profil WHERE '$Idt'= Identifiant AND '$CodeF' = CodeFamille ");
$Valeur_test=$existence_identifiant_famille->fetch();
$existence_identifiant_famille->closeCursor();


//Changement de la couleur
if($Valeur_test['compte']==1){

if (!empty($_POST["Idt"])) {
    $rq = $bdd->query("UPDATE  profil SET Couleur='$Newcolor' WHERE Identifiant='$Idt'");
    header('location: ../user-gest-admin/gest_modif-membre.php?message=4');
}}
else{
    header('location: ../user-gest-admin/gest_modif-membre.php?message=5');
}




