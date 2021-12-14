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
        <link rel="stylesheet" href="../css/style.css">

    </head>
<body>

<!-- header section starts  -->

<header class="header">

    <a class="logo">
        <img src="images/EkoS.png" alt="">
    </a>

    <div class="icons">
        <nav class="navbar">
            <a href="visiteur_inscription.php">Inscription</a>
        </nav>
        <div class="fas fa-bars" id="menu-btn"></div>
    </div>

    <a href="visiteur_accueil.php" class="logo">
        <img src="images/LaMontreS.png" alt="">
    </a>

</header>

<!-- header section ends -->

<!-- connexion section starts  -->
<div class="content">
    <h1 class="heading"> <span>Je</span> me <span>connecte</span> </h1>
</div>

<section class="inscri" id="inscri">

    <h1 class="heading"> Je <span>me</span> connecte </h1>

    <div class="row">


        <form action="">
            <div class="inputBox">
                <span class="fas fa-user"></span>
                <input type="text" placeholder="pseudo">
            </div>
            <div class="inputBox">
                <span class="fas fa-id-badge"></span>
                <input type="text" placeholder="mot de passe">
            </div>
            <input type="submit" value="Se connecter" class="btn">

        </form>

    </div>

</section>



<!-- connexion section ends -->

<section class="footer">

    <div class="links">
        <a href="visiteur_CGU.php">CGU</a>
    </div>

</section>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</html>
