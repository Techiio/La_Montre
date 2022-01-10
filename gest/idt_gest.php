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

//Changement du nom de l'utilisateur
if (!empty($_POST["Idt"] && $_POST["pwd"])) {

    $Idt= $_POST['Idt'];
    $Newidt = $_POST['New_Idt'];
    $rq = $bdd->query("UPDATE  profil SET Identifiant='$Newidt' WHERE Identifiant= '$Idt'");
    $requete = $bdd->query("UPDATE  connexion SET Identifiant='$Newidt' WHERE Identifiant= '$Idt'");
    header('location: ../gest_modif-membre.php');
}




