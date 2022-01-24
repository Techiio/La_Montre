<?php
session_start();
require("../load/config_PDO.php");
if(!isset($_SESSION['statut'])){
    header("Location: ../index.php");
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
    <link rel="stylesheet" href="../css/style.css">

</head>
<body>

<!-- header section starts  -->

<header class="header">

    <a class="logo">
        <img src="../images/LaMontreS.png" alt="">
    </a>


    <div class="icons">



        <nav class="navbar">
            <?php
            if($_SESSION['statut']==1) { ?>
            <a href="../user-gest-admin/user-gest-admin_menu.php?error=3" class="logo">Mon Menu</a>
            <?php

    } ?>
            <a href="user-gest-admin_ma-journee.php">Ma Journée</a>
            <a href="user-gest-admin_statistiques.php">Mes Stats</a>
            <a href="user-gest-admin_conseils.php">Mes Conseils</a>
            <a href="user-gest-admin_faq-contact.php">FAQ/Contact</a>
        </nav>
        <div class="fas fa-bars" id="menu-btn"></div>
    </div>

    <a href="../load/fin_de_session.php" class="logo">
        <h2 style="color:<?php if(isset($_COOKIE['couleur'])) {
            echo '' . $_COOKIE['couleur'];
        }?>">
            <?php
            if(isset($_SESSION['pseudotemporaire'])){
                $_SESSION['pseudo']=$_SESSION['pseudotemporaire'];
                $_SESSION['statut']=$_SESSION['statuttemporaire'];

            }

            if(isset($_SESSION['pseudo'])){
                echo '' .$_SESSION['pseudo'] ;
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
        $Identifiant=$_SESSION['pseudo'];
        $CodeStatut=$_SESSION['statut'];

        if(isset($_SESSION['pseudotemporaire'])){
            $_SESSION['pseudo']=$_SESSION['pseudotemporaire'];
            $_SESSION['statut']=$_SESSION['statuttemporaire'];

        }

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
                <img src="../images/user.png" class="user" alt="">
                <h3 style="color: <?php echo $donnees['Couleur']; ?> ;"> <?php echo $donnees['Identifiant']; ?> </h3>
            </a>

        <?php
            }
        } ?>
        <a href="gest_modif-membre.php" class="box">
                <img src="../images/mod.jpg" class="user" alt="">
                <h3>Paramètres membre</h3>
            </a>
            <?php
        }
        else{
        ?>
        <a href="#" class="box"> <img src="../images/utilisateur-modified.png" class="user" alt="">
                <h3>Aucun compte dans la famille</h3> </a>

        <?php } ?>
    </div>

</section>

<?php

//Redirection vers l'utilisateur
if(isset($_GET['user'])){

    //connexion au profil de l'utilisateur
    $Identifiant=$_GET['user'];
    $_SESSION['pseudotemporaire']=$_SESSION['pseudo'];
    $_SESSION['statuttemporaire']=$_SESSION['statut'];
    $_SESSION['pseudo']=$Identifiant;
    $_SESSION['statut']=0;
    header('location: ./user-gest-admin_menu.php');
}
?>

<!-- ma famille section ends -->
</body>

<section class="footer">

    <div class="links">
        <a href="../visiteur/visiteur_CGU.php" style="margin:0 4%;">CGU</a>
        <a>Version: 1.0.12.201</a>
    </div>


</section>
<!-- custom js file link  -->
<script src="../js/script.js"></script>

</html>
