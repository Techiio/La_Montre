<?php

//connexion à la base de données
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8',
        'root',
        '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
//Donnée du formulaire
$Idt = $_POST['Idt'];

//Vérification de la présence d'utilisateur dans la famille en plus du gestionnaire
$Id=$bdd->query("SELECT count(Identifiant) as compte FROM profil WHERE '$Idt'= Identifiant");
$nb_utilisateur=$Id->fetch();
$Id->closeCursor();

if ($nb_utilisateur['compte']==1) {
    $CodeP_search= $bdd->query("SELECT CodeProduit  FROM profil WHERE  '$Idt'= Identifiant ");
    $Codeproduit=$CodeP_search->fetch();
    $CodeP=$Codeproduit['CodeProduit'];
    $rq = $bdd->query("DELETE FROM donneesmontre WHERE  '$CodeP'= CodeProduit");

    $erreur = 3;
    header('location: ../admin_screen-gestion.php?erreur=3');
}

else {
    header('location: ../admin_screen-gestion.php?erreur=5');
}

?>


