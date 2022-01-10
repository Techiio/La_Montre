<?php



session_start();

try {
    $db = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8',
        'root',
        '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

if (isset($_SESSION['connect'])) {
    header('location: ../');
}

if (!empty($_POST["Identifiant"]) && !empty($_POST["Mdp"])) {
    //Variables
    $c_mail = $_POST['Identifiant'];
    $c_mdp = $_POST['Mdp'];
    $codeS = $db -> query("SELECT CodeStatut  FROM connexion WHERE Identifiant= '$c_mail'");
    $codeF = $db -> query("SELECT  CodeFamille FROM profil WHERE Identifiant= '$c_mail'");
    $error = 1;

    $req = $db->prepare('SELECT * FROM connexion WHERE Identifiant=?');
    $req->execute(array($c_mail));
    while ($user = $req->fetch()) {


        if ( $user['CodeStatut'] == 2 && $c_mdp == $user['Mdp']) {
        $error = 0;

        setcookie('pseudo', $user['Identifiant'], time()+364*24*3600, '/', null, false, true);
        setcookie('codeS', $user['CodeStatut'], time()+364*24*3600, '/', null, false, true);

        $_SESSION['connect'] = 1;

        header('location: ../admin_screen-gestion.php');
        }

        elseif ( $user['CodeStatut'] =! 1 && $c_mdp == $user['Mdp']) {
            $error = 10;

            setcookie('pseudo', $user['Identifiant'], time()+364*24*3600, '/', null, false, true);
            setcookie('codeS', $user['CodeStatut'], time()+364*24*3600, '/', null, false, true);
            setcookie('codeF', $user['CodeFamille'], time()+364*24*3600, '/', null, false, true);

            $_SESSION['connect'] = 1;

            header('location: ../user-gest-admin_menu.php?error=10');
        }

        elseif ($c_mdp == $user['Mdp']) {
            $error = 0;

            setcookie('pseudo', $user['Identifiant'], time()+364*24*3600, '/', null, false, true);
            setcookie('codeS', $user['CodeStatut'], time()+364*24*3600, '/', null, false, true);
            setcookie('codeF', $user['CodeFamille'], time()+364*24*3600, '/', null, false, true);

            $_SESSION['connect'] = 1;

            header('location: ../user-gest-admin_menu.php');

        }
        else{
            header('Location: ../visiteur_connexion.php?erreur=1');
        }
    }
    if ($error == 1) {

        header('Location: ../visiteur_connexion.php?erreur=1');
    }
}
else{
    header('Location: ../visiteur_connexion.php?erreur=1');
}

