<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Menu</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>

<!-- header section starts  -->

<header class="header">

    <a class="logo">
        <img src="images/LaMontreS.png" alt="">
    </a>

    <a>
        <h2 style="color: antiquewhite; font-size: 2.5rem;">
            <?php

            if(isset($_COOKIE['pseudo'])){
                echo '' .$_COOKIE['pseudo'] ;
            }
            ?>

        </h2>
    </a>

    <a href="index.php" class="logo">
        <h3>
            Déconnexion
        </h3>
    </a>



</header>

<section class="content">
    <h1 class="heading"> . </h1>
</section>
<!-- menu section starts  -->

<section class="menu" id="menu">

    <h1 class="heading"> Ma <span>Montre</span> </h1>

    <div class="box-container">
        <a href="user-gest-admin_ma-journee.php" class="box">
            <span class="fas fa-calendar-alt"></span>
            <h3>Ma Journée</h3>

        </a>

        <a href="user-gest-admin_statistiques.php" class="box">
            <span class="fas fa-chart-bar"></span>
            <h3>Mes Stats</h3>
        </a>

        <a href="user-gest-admin_conseils.php" class="box">
            <span class="fas fa-hands-helping"></span>
            <h3>Mes Conseils</h3>
        </a>

        <a href="user-gest-admin_faq-contact.php" class="box">
            <span class="fas fa-comments"></span>
            <h3>FAQ / Contact</h3>
        </a>

        <?php
        if(isset($_GET['error'])){
            $err = $_GET['error'];
            if($err==3)
                echo '<a  href="gest_comptes-famille.php" class="box">
            <span class="fas fa-users"></span>
            <h3>Ma Famille</h3>
        </a>' ;
        }
        ?>

    </div>

</section>

<!-- menu section ends -->
<section class="footer">

    <div class="links">
        <a href="visiteur_CGU.php"  style="margin:0 4%;">CGU</a>
        <a>Version: 1.0.12.201</a>
    </div>


</section>

</body>
</html>