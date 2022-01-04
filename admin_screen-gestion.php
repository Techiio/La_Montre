<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>~Admin~ Screen Gestion</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

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
            <a href="user-gest-admin_statistiques.php">Mes Stats</a>
            <a href="user-gest-admin_conseils.php">Mes Conseils</a>
        </nav>
        <div class="fas fa-bars" id="menu-btn"></div>
    </div>

    <a href="index.php" class="logo">
        <img src="images/LaMontreS.png" alt="">
        <h3>Déconnexion</h3>
    </a>


</header>

<section class="content">
    <h1 class="heading">. </h1>
</section>
<!-- admin section starts  -->

<section class="admin" id="admin">

    <h1 class="heading"> Admin <span>Screen</span> </h1>

    <div class="box-container">

        <a class="box">
            <img src="images/assemblee.png" alt="">
            <h3>Nombre d'utilisateurs connectés</h3>
            <h3> Actuellement <?php
                $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', "root", "");
                $temps_session = 600;
                $temps_actuel = date("U");
                $user_ip = $_SERVER['REMOTE_ADDR'];
                $req_ip_exist = $bdd->prepare('SELECT * FROM online WHERE user_ip = ?');
                $req_ip_exist->execute(array($user_ip));
                $ip_existe = $req_ip_exist->rowCount();
                if($ip_existe == 0) {
                    $add_ip = $bdd->prepare('INSERT INTO online(user_ip,time) VALUES(?,?)');
                    $add_ip->execute(array($user_ip,$temps_actuel));
                } else {
                    $update_ip = $bdd->prepare('UPDATE online SET time = ? WHERE user_ip = ?');
                    $update_ip->execute(array($temps_actuel,$user_ip));
                }
                $session_delete_time = $temps_actuel - $temps_session;
                $del_ip = $bdd->prepare('DELETE FROM online WHERE time < ?');
                $del_ip->execute(array($session_delete_time));
                $show_user_nbr = $bdd->query('SELECT * FROM online');
                $user_nbr = $show_user_nbr->rowCount();
                echo $user_nbr ;
                ?> utilisateur<?php if($user_nbr != 1) { echo "s"; } ?> en ligne<br />
            </h3>
        </a>

        <a class="box">
            <img src="images/gerer.png" alt="">
            <h3>Gérer un utilisateur</h3>
        </a>

        <a class="box">
            <img src="images/reset.png" alt="">
            <h3>Reset les données</h3>
        </a>

        <a class="box">
            <img src="images/ajout.png" alt="">
            <h3>Ajouter un admin</h3>
        </a>

        <a class="box">
            <img src="images/equipe.png" alt="">
            <h3>Liste des admins</h3>
        </a>

        <a class="box">
            <img src="images/pas-de-foule.png" alt="">
            <h3>Supprimer un admin</h3>
        </a>

    </div>

</section>

<!-- admin section ends -->
<section class="footer">

    <div class="links">
        <a href="visiteur_CGU.php">CGU</a>
    </div>

</section>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>