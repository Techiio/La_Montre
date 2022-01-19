<?php

session_start();

//connexion à la base de données
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8',
        'root',
        '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

//Données du formulaire
$Idt= htmlentities($_POST['Idt']);
$Newpwd1 = htmlentities($_POST['pwd1']);
$Newpwd2 = htmlentities($_POST['pwd2']);

//Variable de vérification d'accès

$rq=$bdd->query("SELECT  CodeFamille FROM profil WHERE Identifiant= '$Idt'");
$requete=$rq->fetch();
$Code_Famille_Idt=$requete['CodeFamille'];
$Code_Statut = $_SESSION['statut'];
$Code_Famille_gest =$_COOKIE['famille'];

//Changement de mot de passe
if ($Code_Statut == 1 && $Code_Famille_gest == $Code_Famille_Idt ) {
    //Les mots de passe correspondent le changement peut s'effectuer
    if ($Newpwd1 == $Newpwd2) {
        $rq = $bdd->query("UPDATE  connexion SET Mdp='$Newpwd1' WHERE Identifiant= '$Idt'");
        header('location: ../user-gest-admin/gest_modif-membre.php?erreur=0');
    }
    //Les mots de passe ne correspondent pas, un message d'erreur s'affiche
    else{
        header('location: ../user-gest-admin/gest_modif-membre.php?erreur=2');
    }
}
//Le gestionnaire essaie de changer le mot de passe d'un utilisateur qui n'est pas dans sa famille, affichage d'une erreur
else{
    header('location: ../user-gest-admin/gest_modif-membre.php?erreur=1');
}



