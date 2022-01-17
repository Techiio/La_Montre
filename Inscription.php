<?php
// Connexion à la BDD
//
try {
    $bdd=new PDO('mysql:host=localhost;dbname=siteweb;charset=utf8', 'root', '');
} catch(Exception $e) {
    die('Erreur : '.$e->getMessage());
}

//Ajout d'un utilisateur lors de l'inscription 

if(!empty($_POST['prenom']) && !empty($_POST['codeP']) && !empty($_POST['codeF']) && !empty($_POST['mdp1']) == !empty($_POST['mdp2']) && isset($_POST['CGU']))
{
    $prenom = $_POST['prenom']; 
    $codeProduit = $_POST['codeProduit']; 
    $codeF = $_POST['codeF']; 
    $mdp = $_POST['mdp']; 
    $requete=$bdd->prepare('INSERT INTO profil(CodePersonne,CodeProduit, CodeFamille, id) VALUES(?, ?, ?)');
    $requete->execute(array($prenom, $codeP, $codeF, $mdp1, $mdp2));

    //Verification de la longueur du mot de passe et conditions

	$uppercase = preg_match('@[A-Z]@', $mdp1);
	$lowercase = preg_match('@[a-z]@', $mdp1);
	$number    = preg_match('@[0-9]@', $mdp1);
	$specialChars = preg_match('@[^\w]@', $mdp1);
    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($mdp) < 8) {
		header('location: inscription_erreurmdp.php');
		exit();
    }else{
        ;
    }

    // Cryptage du mdp 
 
	$mdp="aq1".sha1($mdp."1254")."25";

    header('location: inscription_success.php');


}
else{
    header('location: inscription_erreurchamp');
}


?>