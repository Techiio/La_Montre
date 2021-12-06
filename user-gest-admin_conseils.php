<!DOCTYPE html>
<html lang="fr">
<head>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Visiteur Mes Conseils</title>

        <!-- font awesome cdn link  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

        <!-- custom css file link  -->
        <link rel="stylesheet" href="css/style.css">

    </head>
<style>
    div.Score {
        
    border-radius: 10px;
    margin-top: 50px;
    margin-left: 400px;
    margin-right: 400px;
    margin-bottom: 50px;
  	border-style: solid;
  	border-width: 10 px;
    border-color: black;
    background: darkorange;
    padding: 20px;
    box-shadow: 5px 5px 10px ;
}

div.divGrand {
        
    border-radius: 10px;
    margin-top: 50px;
    margin-left: 100px;
    margin-right: 100px;
    margin-bottom: 100px;
    padding: 20px;
    background: #ffcc66;
}
</style>        
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
            <a href="user-gest-admin_statistiques.php">Mes Stats</a>
            <a href="user-gest-admin_faq-contact.php">Contact/FAQ</a>
        </nav>
        <div class="fas fa-bars" id="menu-btn"></div>
    </div>

    <a href="visiteur_accueil.php" class="logo">
        <img src="images/LaMontreS.png" alt="">
        <h3>Déconnexion</h3>
    </a>

</header>

<!-- header section ends -->

<!--conseils section starts  -->
<section class="content">
    <h1 class="heading">.</h1>
</section>

<section class="inscri" id="inscri">

    <h1 class="heading"> Mes <span>Conseils</span></h1>

</section>

<div class="divGrand"> 
  <h1 style="text-align: center;">Score et conseils</h1> 
  <div class="Score">
    <h2>Meilleur score</h2><br><br><br>
      <h2>/20</h2>
  </div>
  <p>     </p>
  <div class="Score">
    <h2>Pire score</h2><br><br><br>
      <h2>/20</h2>
  </div>
  <h2>Conseil du jour :</h2>
</div>  

<!-- conseils section ends -->
<section class="footer">

    <div class="links">
        <a href="visiteur_CGU.php">CGU</a>
    </div>

</section>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</html>
