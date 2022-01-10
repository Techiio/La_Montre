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
if (!empty($_POST["new_color"])) {
    $Idt= $_POST['Idt'];
    $Newcolor = $_POST['new_color'];
    echo "post marche";
    $rq = //$bdd->query("SELECT color FROM couleur WHERE couleur='$Newcolor'");
    $rq = $bdd->query("UPDATE  profil SET Couleur='$Newcolor' WHERE Identifiant= '$Idt'");

    header('location: ../gest_modif-membre.php');
}




