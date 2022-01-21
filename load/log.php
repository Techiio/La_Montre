<?php



session_start();
require_once("config_PDO.php");

if (isset($_SESSION['connect'])) {
    header('location: ../');
}

if (!empty($_POST["Identifiant"]) && !empty($_POST["Mdp"])) {
    //Variables
    $c_mail = htmlentities($_POST['Identifiant']);
    $c_mdp = htmlentities($_POST['Mdp']);
    $c_mdphash = password_hash($c_mdp,PASSWORD_DEFAULT);
    $codeS = $bdd -> query("SELECT CodeStatut  FROM connexion WHERE Identifiant= '$c_mail'");
    $rq= $bdd -> query("SELECT  CodeFamille FROM profil WHERE Identifiant= '$c_mail'");
    $CodeFamille=$rq->fetch();
    $error = 1;

    $req = $bdd->prepare('SELECT * FROM connexion WHERE Identifiant=?');
    $req->execute(array($c_mail));
    while ($user = $req->fetch()) {


        if ( $user['CodeStatut'] == 2 && password_verify($c_mdp,$c_mdphash)) {
        $error = 0;

        $_SESSION['pseudo']= $user['Identifiant'];
        $_SESSION['statut']= $user['CodeStatut'];
        setcookie('famille', $CodeFamille['CodeFamille'], time()+364*24*3600, '/', null, false, true);

        $_SESSION['connect'] = 1;

        header('Location: ../user-gest-admin/admin_screen-gestion.php');
        }

        elseif ( $user['CodeStatut'] == 1 && password_verify($c_mdp,$c_mdphash)) {
            $error = 3;

            $_SESSION['pseudo']= $user['Identifiant'];
            $_SESSION['statut']= $user['CodeStatut'];
            setcookie('famille', $CodeFamille['CodeFamille'], time()+364*24*3600, '/', null, false, true);

            $_SESSION['connect'] = 1;

            header('Location: ../user-gest-admin/user-gest-admin_menu.php?error=3');
        }

        elseif (password_verify($c_mdp,$c_mdphash)) {
            $error = 0;

            $_SESSION['pseudo']= $user['Identifiant'];
            $_SESSION['statut']= $user['CodeStatut'];
            setcookie('famille', $CodeFamille['CodeFamille'], time()+364*24*3600, '/', null, false, true);


            $_SESSION['connect'] = 1;

            header('Location: ../user-gest-admin/user-gest-admin_menu.php');

        }
        else{
            header('Location: ../visiteur/visiteur_connexion.php?erreur=1');
        }
    }
    if ($error == 1) {

        header('Location: ../visiteur/visiteur_connexion.php?erreur=1');
    }
}
else{
    header('Location: ../visiteur/visiteur_connexion.php?erreur=1');
}

