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

if (isset($_POST["Idt"])) {
    $Idt = $_POST['Idt'];
    //$rq = $bdd->prepare('DELETE FROM connexion WHERE Identifiant = $Idt ');
    //$rq->execute();
    //$bdd->exec("Delete FROM connexion WHERE VALUES(Identifiant = $Idt;");
    $erreur = 1;
    header('location: ../admin_screen-gestion?erreur=1.php');
}
header('location: ../admin_screen-gestion.php');



