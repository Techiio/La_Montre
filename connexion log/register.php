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

<<<<<<< HEAD
$CodeFamille = $_POST['CodeFamille'];
$stmt = $bdd->prepare("SELECT * FROM profil WHERE CodeFamille=?");
$stmt->execute([$CodeFamille]);
$cdf = $stmt->fetch();

if(isset($_POST['gest'])){
        //Ajout d'un utilisateur lors de l'inscription
        if(isset($_POST['CGU'])){
            if(!empty($_POST['Identifiant']) && !empty($_POST['CodeProduit']) && !empty($_POST['mdp1']) && $_POST['mdp1']==$_POST['mdp2']){
                $CodeProduit=$_POST['CodeProduit'];

                $CodeStatut=01;
                $CodeFamille=rand(1000000001,9999999999);

                $Couleur="white";
                $mdp=$_POST['mdp1'];


                //Envoi des coordonnées à mySQL


                $requete=$bdd->prepare('INSERT INTO profil(CodeProduit, Couleur, CodeFamille, Identifiant ) VALUES(?, ?, ?, ?)');
                $requete->execute(array($CodeProduit, $Couleur, $CodeFamille, $Identifiant));

                $requete=$bdd->prepare('INSERT INTO connexion(CodeStatut, Identifiant, Mdp ) VALUES(?, ?, ?)');
                $requete->execute(array($Identifiant, $mdp));



                header('location: ../user-gest-admin/user-gest-admin_menu.php');
            }
=======
//Ajout d'un utilisateur lors de l'inscription
if(isset($_POST['CGU'])){
    if(!empty($_POST['Identifiant']) && !empty($_POST['CodeProduit']) && !empty($_POST['mdp1']) && $_POST['mdp1']==$_POST['mdp2']){
        $Identifiant=$_POST['Identifiant'];
        $CodeProduit=$_POST['CodeProduit'];
        if(isset($_POST['gest'])){
            $CodeStatut=01;
            $CodeFamille=rand(1000000001,9999999999);
            $CodePersonne=10000;
>>>>>>> 73b8775212f3da508d9f4c050ac1e0efab43ae4b
        }
        else{
            if(!empty($_POST['CodeFamille'])) {
                $CodeStatut=00;
                $CodeFamille = $_POST['CodeFamille'];
                $CodePersonne = rand(10001, 99999);
            }
        }
<<<<<<< HEAD
}
else{
    if ($user) {
        header('Location: ../visiteur/visiteur_inscription.php?erreur=1');
    }
    else {
        if ($cdf){
            //Ajout d'un utilisateur lors de l'inscription
            if(isset($_POST['CGU'])){
                if(!empty($_POST['Identifiant']) && !empty($_POST['CodeProduit']) && !empty($_POST['mdp1']) && $_POST['mdp1']==$_POST['mdp2']){
                    $CodeProduit=$_POST['CodeProduit'];

                    if(!empty($_POST['CodeFamille'])) {
                        $CodeStatut=00;
                        $CodeFamille = 9878987;

                    }
                    else {
                        $CodeFamille = 987654567;
                    }

                    $Couleur="white";
                    $mdp=$_POST['mdp1'];

=======
        $Couleur="white";
        $mdp=$_POST['mdp1'];
>>>>>>> 73b8775212f3da508d9f4c050ac1e0efab43ae4b


        //Envoi des coordonnées à mySQL

<<<<<<< HEAD
                    $requete=$bdd->prepare('INSERT INTO profil(CodeProduit, Couleur, CodeFamille, Identifiant ) VALUES(?, ?, ?, ?)');
                    $CodeFami = 98768;
                    $requete->execute(array($CodeProduit, $Couleur, $CodeFami, $Identifiant));
=======
>>>>>>> 73b8775212f3da508d9f4c050ac1e0efab43ae4b

        $requete=$bdd->prepare('INSERT INTO profil(CodePersonne, CodeProduit, Couleur, CodeFamille, Identifiant ) VALUES(?, ?, ?, ?, ?)');
        $requete->execute(array($CodePersonne, $CodeProduit, $Couleur, $CodeFamille, $Identifiant));

        $requete=$bdd->prepare('INSERT INTO connexion(CodeStatut, Identifiant, Mdp ) VALUES(?, ?, ?)');
        $requete->execute(array($CodePersonne, $Identifiant, $mdp));



        header('location: ../user-gest-admin_menu.php');
    }
}
else{
    header('location: ../index.php');
}
?>