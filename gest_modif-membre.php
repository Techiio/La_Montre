<!DOCTYPE html>
<html lang="fr">
<head>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Modifier ma Famille</title>

        <!-- font awesome cdn link  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

        <!-- custom css file link  -->
        <link rel="stylesheet" href="css/style.css">

    </head>
<body>

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

    <a href="visiteur_accueil.php" class="logo">
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

<!-- modif membre section starts  -->

<section class="modif" id="modif">

    <h1 class="heading"> our <span>blogs</span> </h1>

    <div class="box-container">

        <div class="box">
            <div class="image">
                <img src="../images/blog-1.jpeg" alt="">
            </div>
            <div class="content">
                <a class="title">Nom d'utilisateur</a>
                <form action="">
                    <div class="inputBox">
                        <input type="text" placeholder="Nouveau Nom">
                    </div>
                </form>
                <a href="#" class="btn">Appliquer</a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="../images/blog-2.jpeg" alt="">
            </div>
            <div class="content">
                <a class="title">Modifier le Mot de Passe</a>
                <form action="">
                    <div class="inputBox">
                        <input type="text" placeholder="Mot de Passe actuel">
                    </div>
                    <div class="inputBox">
                        <input type="text" placeholder="Nouveau Mot de Passe">
                    </div>
                    <div class="inputBox">
                        <input type="text" placeholder="Confirmation Nouveau Mot de Passe">
                    </div>
                </form>
                <a href="#" class="btn">Appliquer</a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="../images/blog-3.jpeg" alt="">
            </div>
            <div class="content">
                <a class="title">Changer la couleur</a>
                <div class="inputBox">
                    <input type="text" placeholder="Entrer le code Hexadécimal de la couleur">
                </div>
                <a href="#" class="btn">Appliquer</a>
            </div>
        </div>

    </div>

</section>

<!-- modif membre section ends -->
<section class="footer">

    <div class="links">
        <a href="visiteur_CGU.php"  style="margin:0 4%;">CGU</a>
        <a>Version: 1.0.12.201</a>
    </div>


</section>
<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>