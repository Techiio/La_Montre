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

        //données du formulaire
        $Identifiant=htmlentities($_POST['Idtf']);
        $CodeStatut=02;
        $mdp=htmlentities($_POST['pwd1']);

        //vérifier l'unicité d'un identifiant
        $test_doublon=$bdd->query("SELECT count(Identifiant) as compte FROM connexion WHERE '$Identifiant'= Identifiant");
        $Valeur_test=$test_doublon->fetch();
        $test_doublon->closeCursor();

        //$Valeur_test=1;
        print_r($Valeur_test["compte"]);

        //ajout de l'admin
        if($Valeur_test["compte"]==0){

        //Transmission de l'ajout vers la bdd
        $requete=$bdd->prepare('INSERT INTO connexion(CodeStatut, Identifiant, Mdp ) VALUES(?, ?, ?)');
        $requete->execute(array($CodeStatut, $Identifiant, $mdp));
        $erreur=2;
    header('location: ../user-gest-admin/admin_screen-gestion.php?erreur=2');}

        //"nom d'utilisateur déjà pris"
        else{header('location: ../user-gest-admin/admin_screen-gestion.php?erreur=6');}


}
//mot de passe différent
else{header('location: ../user-gest-admin/admin_screen-gestion.php?erreur=7');}
?>