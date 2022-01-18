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
}
else{
header('location: ../visiteur/visiteur_inscription.php?miss=1');
}