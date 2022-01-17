<?php

session_start();

//Connexion à la base de données
//CONNEXION A LA BDD
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8',
        'root',
        '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
$Identifiant = $_POST['Identifiant'];
$stmt = $bdd->prepare("SELECT * FROM profil WHERE Identifiant=?");
$stmt->execute([$Identifiant]);
$user = $stmt->fetch();

if ($user) {
    header('Location: ../visiteur_inscription.php?erreur=1');
}
else {
    //Ajout d'un utilisateur lors de l'inscription
    if(isset($_POST['CGU'])){
        if(!empty($_POST['Identifiant']) && !empty($_POST['CodeProduit']) && !empty($_POST['mdp1']) && $_POST['mdp1']==$_POST['mdp2']){
            $CodeProduit=$_POST['CodeProduit'];
            if(isset($_POST['gest'])){
                $CodeStatut=01;
                $CodeFamille=rand(1000000001,9999999999);
                $CodePersonne=10000;
            }
            else{
                if(!empty($_POST['CodeFamille'])) {
                    $CodeStatut=00;
                    $CodeFamille = $_POST['CodeFamille'];
                    $CodePersonne = rand(10001, 99999);
                }
            }
            $Couleur="white";
            $mdp=$_POST['mdp1'];


            //Envoi des coordonnées à mySQL


            $requete=$bdd->prepare('INSERT INTO profil(CodeProduit, Couleur, CodeFamille, Identifiant ) VALUES(?, ?, ?, ?)');
            $requete->execute(array($CodeProduit, $Couleur, $CodeFamille, $Identifiant));

            $requete=$bdd->prepare('INSERT INTO connexion(CodeStatut, Identifiant, Mdp ) VALUES(?, ?, ?)');
            $requete->execute(array($CodePersonne, $Identifiant, $mdp));



            header('location: ../user-gest-admin/user-gest-admin_menu.php');
        }
    }
    else{
        header('location: ../visiteur_inscription.php?miss=1');
    }
}


?>