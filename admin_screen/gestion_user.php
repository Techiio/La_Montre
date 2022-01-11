<?php

session_start();

//suppression des cookies admin
setcookie('pseudo');
setcookie('statut');
$_SESSION['connect'] = 0;

//connexion bdd
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8',
        'root',
        '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

if (isset($_SESSION['connect'])) {
    header('location: ../');
}

///connexion au profil utilisateur
if (!empty($_POST["Identifiant"])) {
    $Identifiant = $_POST['Identifiant'];
    $Mdp = $_POST['Mdp'];
    $Code = $_POST['CodeStatut'];
    $error = 4;

    $req = $bdd->prepare('SELECT * FROM connexion WHERE Identifiant=?');
    $req->execute(array($Identifiant));
    while ($user = $req->fetch()) {

        if ($Identifiant == $user['Identifiant']) {
            $error = 0;

            setcookie('pseudo', $user['Identifiant'], time()+364*24*3600, '/', null, false, true);
            setcookie('statut', $user['CodeStatut'], time()+364*24*3600, '/', null, false, true);

            $_SESSION['connect'] = 1;

            header('location: ../user-gest-admin_menu.php');
        }
        else{
            header('Location: ../admin_screen-gestion.php?erreur=4');
        }
    }
    if ($error == 4) {

        header('Location: ../admin_screen-gestion.php?erreur=4');
    }
}
else{
    header('Location: ../admin_screen-gestion.php?erreur=4');
}

