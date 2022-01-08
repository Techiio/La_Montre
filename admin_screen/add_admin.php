<?php

session_start();

//Connexion à la base de données
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8',
        'root',
        '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

//Ajout d'un admin par un autre admin

    if(!empty($_POST['Idtf']) && !empty($_POST['pwd1']) && $_POST['pwd1']==$_POST['pwd2']){
        $Identifiant=$_POST['Idtf'];
        $CodeStatut=02;
        $mdp=$_POST['pwd1'];}

        //Transmission de l'ajout vers la bdd
        $requete=$bdd->prepare('INSERT INTO connexion(CodeStatut, Identifiant, Mdp ) VALUES(?, ?, ?)');
        $requete->execute(array($CodeStatut, $Identifiant, $mdp));
    header('location: ../admin_screen-gestion.php');

?>