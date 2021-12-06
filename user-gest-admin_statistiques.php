<!DOCTYPE html>
<html lang="fr">
<head>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mes Stats</title>

        <!-- font awesome cdn link  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

        <!-- custom css file link  -->
        <link rel="stylesheet" href="css/style.css">

    </head>
<body>

<!-- header section starts  -->

<header class="header">

    <a class="logo">
        <img src="images/EkoS.png" alt="">
    </a>

    <div class="icons">
        <nav class="navbar">
            <a href="user-gest-admin_menu.php">Mon Menu</a>
            <a href="user-gest-admin_ma-journee.php">Ma Journée</a>
            <a href="user-gest-admin_conseils.php">Mes Conseils</a>
            <a href="user-gest-admin_faq-contact.php">Contacts/FAQ</a>
        </nav>
        <div class="fas fa-bars" id="menu-btn"></div>
    </div>


    <a href="visiteur_accueil.php" class="logo">
        <img src="images/LaMontreS.png" alt="">
        <h3>Déconnexion</h3>
    </a>

</header>

<!-- header section ends -->

<!-- mes stats section starts  -->
<section class="content">
    <h1 class="heading">.</h1>
</section>

<section class="menu" id="menu">

    <h1 class="heading"> Mes <span>Stats</span> </h1>

    <div class="box-container">
        <a href="user-gest-admin_ma-journee.php" class="box">
            <img src="images/try-1.png" alt="">
            <h3>Ma Journée</h3>

        </a>

        <a href="user-gest-admin_statistiques.php" class="box">
            <img src="images/try-1.png" alt="">
            <h3>Mes Stats</h3>
        </a>

        <a href="user-gest-admin_conseils.php" class="box">
            <img src="images/try-1.png" alt="">
            <h3>Mes Conseils</h3>
        </a>

        <a href="user-gest-admin_faq-contact.php" class="box">
            <img src="images/try-1.png" alt="">
            <h3>FAQ/Contact</h3>
        </a>

    </div>

</section>

<!-- mes stats section ends -->

<section class="footer">

    <div class="links">
        <a href="visiteur_CGU.php">CGU</a>
    </div>

</section>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</html>