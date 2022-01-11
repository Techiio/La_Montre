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
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma Famille</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>

<!-- header section starts  -->

<header class="header">

    <a class="logo">
        <img src="images/LaMontreS.png" alt="">
    </a>


    <div class="icons">
        <nav class="navbar">
            <a href="user-gest-admin_menu.php">Mon Menu</a>
            <a href="user-gest-admin_ma-journee.php">Ma Journée</a>
            <a href="user-gest-admin_statistiques.php">Mes Stats</a>
            <a href="user-gest-admin_conseils.php">Mes Conseils</a>
            <a href="user-gest-admin_faq-contact.php">Contact/FAQ</a>
        </nav>
        <div class="fas fa-bars" id="menu-btn"></div>
    </div>

    <a href="index.php" class="logo">
        <h2 style="color: antiquewhite; font-size: 2.5rem;">
            <?php

            if(isset($_COOKIE['pseudo'])){
                echo '' .$_COOKIE['pseudo'] ;
            }
            ?>

        </h2>
        <h3>Déconnexion</h3>
    </a>

</header>

<section class="content">
    <h1 class="heading"> . </h1>
</section>

<!-- ma famille section starts  -->

<section class="famille" id="famille">

    <h1 class="heading"> Ma <span>Famille</span> </h1>

    <div class="box-container">


        <?php
        //Variables
        $CodeFamille=$_COOKIE['famille'];
        $Identifiant=$_COOKIE['pseudo'];
        $CodeStatut=$_COOKIE['statut'];

        //Vérification de la présence d'utilisateur dans la famille en plus du gestionnaire
        $compte_utilisateur_famille=$bdd->query("SELECT count(Identifiant) as compte FROM profil WHERE '$CodeFamille'= CodeFamille");
        $nb_utilisateurs=$compte_utilisateur_famille->fetch();
        $compte_utilisateur_famille->closeCursor();

        if($nb_utilisateurs['compte'] > 1){
        $rq = $bdd->query("SELECT Identifiant,Couleur  FROM profil WHERE '$CodeFamille'= CodeFamille");
        while ($donnees = $rq->fetch()){
            if($donnees['Identifiant']!=$Identifiant){
                $donnees['Identifiant']=str_replace("$", "",$donnees['Identifiant'])
            ?>
            <a href="gest_comptes-famille.php?user=<?php echo $donnees['Identifiant'] ?>" class="box">
                <img src="images/user.png" class="user" alt="">
                <h3 style="color: <?php echo $donnees['Couleur']; ?> ;"> <?php echo $donnees['Identifiant']; ?> </h3>
            </a>

        <?php
            }
        } ?>
        <a href="gest_modif-membre.php" class="box">
                <img src="images/mod.jpg" class="user" alt="">
                <h3>Paramètres membre</h3>
            </a>
            <?php
        }
        else{
        ?>
        <a href="#" class="box"> <img src="images/utilisateur-modified.png" class="user" alt="">
                <h3>Aucun compte dans la famille</h3> </a>

        <?php } ?>
    </div>

</section>

<!-- ma famille section ends -->
</body>

<section class="footer">

    <div class="links">
        <a href="visiteur_CGU.php"  style="margin:0 4%;">CGU</a>
        <a>Version: 1.0.12.201</a>
    </div>


</section>
<!-- custom js file link  -->
<script src="js/script.js"></script>

</html>
<?php
//Redirection vers l'utilisateur
if(isset($_GET['user'])){
    //suppression des cookies admin
    setcookie('pseudo');
    setcookie('statut');
    setcookie('famille');
    $_SESSION['connect'] = 0;

    //connexion au profil de l'utilisateur
    $Identifiant=$_GET['user'];
    setcookie('pseudo', $Identifiant, time()+364*24*3600, '/', null, false, true);
    setcookie('statut', 0, time()+364*24*3600, '/', null, false, true);
    header('location: ../user-gest-admin_menu.php');
}
    ?>