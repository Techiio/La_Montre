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

//Changement de la couleur
if (!empty($_GET["new_color"])) {
    $Idt= $_GET['Idt'];
    $Newcolor = $_GET['new_color'];
    $Trad_color = $bdd->query("SELECT color FROM couleur WHERE couleur='$Newcolor'");
    $rq = $bdd->query("UPDATE  profil SET Couleur='$Trad_color' WHERE Identifiant= '$Idt'");

    header('location: ../gest_modif-membre.php');
}




