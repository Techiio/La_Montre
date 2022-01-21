<?php

//connexion à la base de données
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8',
        'root',
        '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

//Suppression de l'admin dans la base
if (!empty($_POST["Idt"])) {
    $Idt = htmlentities($_POST['Idt']);
    $rq = $bdd->query("DELETE FROM connexion WHERE Identifiant= '$Idt'");
    $erreur = 1;
    header('location: ../user-gest-admin/admin_screen-gestion.php?erreur=1');
}


?>

