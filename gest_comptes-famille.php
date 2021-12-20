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

<section class="content">
    <h1 class="heading"> . </h1>
</section>

<!-- ma famille section starts  -->

<section class="famille" id="famille">

    <h1 class="heading"> Ma <span>Famille</span> </h1>

    <div class="box-container">

        <a href="#" class="box">
            <img src="images/pic-1.png" class="user" alt="">
            <h3>john deo</h3>
        </a>

        <a href="#" class="box">
            <img src="images/pic-2.png" class="user" alt="">
            <h3>john deo</h3>
        </a>

        <a href="#" class="box">
            <img src="images/pic-3.png" class="user" alt="">
            <h3>john deo</h3>
        </a>

        <a href="#" class="box">
            <img src="images/pic-3.png" class="user" alt="">
            <h3>john deo</h3>
        </a>

        <a href="#" class="box">
            <img src="images/pic-3.png" class="user" alt="">
            <h3>john deo</h3>
        </a>

        <a href="#" class="box">
            <img src="images/pic-3.png" class="user" alt="">
            <h3>john deo</h3>
        </a>

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