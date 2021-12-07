<?php
// Souvent on identifie cet objet par la variable $conn ou $db
$mysqlConnection = new PDO(
    'mysql:host=localhost;dbname=bdd;charset=utf8',
    'root',
    ''
);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Visiteur Connexion</title>

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
            <a href="user-gest-admin_statistiques.php">Mes Stats</a>
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

<!-- ma journée section starts  -->
<section class="content">
    <h1 class="heading">.</h1>
</section>

<section class="menu" id="menu">

    <h1 class="heading"> Ma <span>Journée</span> </h1>

    <div class="box-container" style="width: 70%">
        <div class="box">
            <h3>Ma Journée</h3>

        </div>

        <div class="box">
            <h3>Mes Stats</h3>
        </div>
    </div>
    <div class="box-container" style="width: 30%">
        <div class="box">
            <h3>Mes Conseils</h3>
        </div>

        <div class="box">
            <h3>FAQ/Contact</h3>
        </div>

    </div>

</section>
<!-- ma journée section ends -->

<section class="footer">

    <div class="links">
        <a href="visiteur_CGU.php">CGU</a>
    </div>

</section>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>