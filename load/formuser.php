<?php

session_start();
require_once("config_PDO.php");

$color ="white";

if(isset($_POST["gest"])){
    if(isset($_POST["CGU"])){
        if(!empty($_POST["Identifiant"])&&!empty($_POST['CodeProduit'])&&!empty($_POST["mdp1"])&&$_POST["mdp1"]==$_POST["mdp2"]){
            $Identifiant = htmlentities($_POST["Identifiant"]);
            $stmt = $bdd->prepare("SELECT * FROM profil WHERE Identifiant=?");
            $stmt->execute([$Identifiant]);
            $user = $stmt->fetch();

            if($user){
                header('Location: ../visiteur/visiteur_inscription.php?erreur=1');
            }
            else{
                $cdestatut = 1;
                $cdeproduit = htmlentities($_POST["CodeProduit"]);
                $cdefamille = rand(1000000001,9999999999);
                $_SESSION["cdefamille"]=$cdefamille;
                $mdp = htmlentities($_POST['mdp1']);
//Envoi des coordonnées à mySQL


                $requete=$bdd->prepare('INSERT INTO profil(CodeProduit, Couleur, CodeFamille, Identifiant ) VALUES(?, ?, ?, ?)');
                $requete->execute(array($cdeproduit, $color, $cdefamille, $Identifiant));

                $requete=$bdd->prepare('INSERT INTO connexion(CodeStatut, Identifiant, Mdp ) VALUES(?, ?, ?)');
                $requete->execute(array($cdestatut, $Identifiant, $mdp));
                header('location: ../user-gest-admin/user-gest-admin_menu.php');

            }
        }

    }
    else{
        header('Location: ../visiteur/visiteur_inscription.php?miss=1');
    }
}
else{
    if(isset($_POST['CGU'])){
        if(!empty($_POST["Identifiant"])&&!empty($_POST['CodeProduit'])&&!empty($_POST["mdp1"])&&$_POST["mdp1"]==$_POST["mdp2"]){
            $Identifiant = htmlentities($_POST["Identifiant"]);
            $stmt = $bdd->prepare("SELECT * FROM profil WHERE Identifiant=?");
            $stmt->execute([$Identifiant]);
            $user = $stmt->fetch();

            $cdefamille = htmlentities($_POST["CodeFamille"]);
            $stmt = $bdd->prepare("SELECT * FROM profil WHERE CodeFamille=?");
            $stmt->execute([$cdefamille]);
            $cdf = $stmt->fetch();

            if($user){
                header('Location: ../visiteur/visiteur_inscription.php?erreur=1');
            }
            else{

                if($cdf){
                    $cdestatut = 0;
                    $cdeproduit = htmlentities($_POST["CodeProduit"]);
                    $cdefamille = htmlentities($_POST["CodeFamille"]);
                    $mdp = htmlentities($_POST['mdp1']);
                    $_SESSION["cdefamille"]=$cdefamille;
//Envoi des coordonnées à mySQL


                    $requete=$bdd->prepare('INSERT INTO profil(CodeProduit, Couleur, CodeFamille, Identifiant ) VALUES(?, ?, ?, ?)');
                    $requete->execute(array($cdeproduit, $color, $cdefamille, $Identifiant));

                    $requete=$bdd->prepare('INSERT INTO connexion(CodeStatut, Identifiant, Mdp ) VALUES(?, ?, ?)');
                    $requete->execute(array($cdestatut, $Identifiant, $mdp));
                    header('location: ../user-gest-admin/user-gest-admin_menu.php');
                }
                else{
                    header('Location: ../visiteur/visiteur_inscription.php?code=1');
                }
            }
        }
    }
    else{
        header('Location: ../visiteur/visiteur_inscription.php?miss=1');
    }
}

?>