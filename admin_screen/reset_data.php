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

if (!empty($_POST["Idt"])) {
    $Idt = $_POST['Idt'];
    $Codeproduit = $bdd->query("SELECT Codeproduit  FROM profil WHERE Identifiant = 'Idt'");
    $rq = $bdd->query("DELETE FROM donneesmontre WHERE CodeProduit= '$Codeproduit'");
    $erreur = 3;
    header('location: ../admin_screen-gestion.php?erreur=3');
}



