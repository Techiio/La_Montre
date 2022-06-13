<?php
    //Connexion à la BDD
    require_once("passerelle.php");
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8','root', '');
    }catch(Exception $e)
    {
        die('Erreur'.$e->getMessage());
    }

    ?>