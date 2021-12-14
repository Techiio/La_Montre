<?php 
require('log.php');
//CONNEXION
session_start();

if(isset($_SESSION['connect'])){
	header('location: ../');
}

if(!empty($_POST["c_mail"]) && !empty($_POST["c_mdp"])){
	//Variables
	$c_mail=$_POST['c_mail'];
	$c_mdp=$_POST['c_mdp'];
	$c_mail=addslashes($c_mail);
	$error=1;

	//Cryptage du mot de passe 
	$c_mdp="aq1".sha1($c_mdp."1254")."25";

	$req=$bdd->prepare('SELECT * FROM users WHERE mail=?');
	$req->execute(array($c_mail));
	while($user=$req->fetch()){
		if($c_mdp==$user['mdp']){
			$error=0;
			
			$_SESSION['connect']=1;
			$_SESSION['nom']=$user['nom'];
			$_SESSION['prenom']=$user['prenom'];
			$_SESSION['mail']=$user['mail'];
			$_SESSION['id']=$user['id'];
			$_SESSION['code']=$user['code'];

			//COOKIES
			if(isset($_POST['connect'])){
				setcookie('auth', $user['id'], time()+364*24*3600, '/', null, false, true);


			}
			if($_SESSION['code']!='26012000' && $_SESSION['code']!='41242700'){
				header('location: ../espaceperso.php');
			} else if($_SESSION['code']=='26012000'){
				header('location: ../espacegestionnaire.php');
			} else if($_SESSION['code']=='41242700'){
				header('location: ../espaceadmin.php');}

		} 
	}
	if($error==1){

		header('location: ../inscription.php?error=1');}
}

?>