<?php

try {
    $bdd=new PDO('mysql:host=localhost;dbname=neuroconnect;charset=utf8', 'root', '');
} catch(Exception $e) {
    die('Erreur : '.$e->getMessage());
}

if(isset($_COOKIE['auth'])){
    //VARIABLES

    $id=htmlspecialchars($_COOKIE['auth']);

    $req=$bdd->prepare("SELECT count(*) as numberAccount FROM user WHERE id=?");
    $req->execute(array($id));
    while($user=$req->fetch()){
        if($user['numberAccount']==1){
            $reqUser=$bdd->prepare('SELECT * from user WHERE id=?');
            $reqUser->execute(array($id));

            while($userAccount=$reqUser->fetch()){
                $_SESSION['connect']=1;
                $_SESSION['mail']=$userAccount['mail'];
            }
        }
    }
    

    
}