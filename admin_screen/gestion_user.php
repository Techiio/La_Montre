<?php
session_start();

//connexion à la base de données
require("../load/config_PDO.php");

//connexion au profil utilisateur
if (!empty($_POST["Identifiant"])) {
    $Identifiant = htmlentities($_POST['Identifiant']);
    $Mdp = htmlentities($_POST['Mdp']);
    $Code = htmlentities($_POST['CodeStatut']);
    $error = 4;

    $req = $bdd->prepare('SELECT * FROM connexion WHERE Identifiant=?');
    $req->execute(array($Identifiant));
    while ($user = $req->fetch()) {

        if ($Identifiant == $user['Identifiant']) {
            $error = 0;

            $_SESSION['pseudo'] = $Identifiant;
            $_SESSION['statut'] = 2;
            header('location: ../user-gest-admin/user-gest-admin_menu.php');
        }
        else{
            header('Location: ../user-gest-admin/admin_screen-gestion.php?erreur=4');
        }
    }
    if ($error == 4) {

        header('Location: ../user-gest-admin/admin_screen-gestion.php?erreur=4');
    }
}
else{
    header('Location: ../user-gest-admin/admin_screen-gestion.php?erreur=4');
}

