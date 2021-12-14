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
    $error = 1;

    $req = $db->prepare('SELECT * FROM connexion WHERE Identifiant=?');
    $req->execute(array($c_mail));
    while ($user = $req->fetch()) {
        if ($c_mdp == $user['Mdp']) {
            $error = 0;

            $_SESSION['connect'] = 1;
            header('location: ../user-gest-admin_menu.php');
        }
    }
    if ($error == 1) {

        header('location: ../inscription.php?error=1');
    }
}
