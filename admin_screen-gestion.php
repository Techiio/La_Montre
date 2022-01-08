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
            <h3>Nombre d'utilisateurs connectés :</h3>
            <h3> <?php
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
            <section class="gu" id="gu">
                <form action="admin_screen/gestion_user.php" method="post">
                    <div class="inputBox">
                        <span class="fas fa-user"></span>
                        <input type="text" name="Identifiant" placeholder="Prénom" />
                    </div>
                    <div>
                        <input
                                type="submit"
                                value="Accéder"
                                name="formsend"
                                id="formsend"
                                class="add"
                        />
                    </div>
                    <?php
                    if(isset($_GET['erreur'])){
                        $err = $_GET['erreur'];
                        if($err==4 || $err==5)
                            echo "<p style='color:red; padding: 1rem; font-size: 1.5rem; transition: 1s; '>Utilisateur non trouvé</p>";
                    }
                    ?>

                </form>
            </section>
        </a>

        <a class="box">
            <img src="images/reset.png" alt="">
            <h3>Reset les données</h3>
            <section class="rd" id="rd">
                <form action="admin_screen/reset_data.php" method="post">
                    <div class="inputBox">
                        <span class="fas fa-user"></span>
                        <input type="text" name="Idf" placeholder="Prénom" />
                    </div>
                    <div>
                        <input
                                type="submit"
                                value="Reset"
                                name="formsend"
                                id="formsend"
                                class="add"
                        />
                    </div>
                    <?php
                    if(isset($_GET['erreur'])){
                        $err = $_GET['erreur'];
                        if($err==3 || $err==5)
                            echo "<p style='color:white; padding: 1rem; font-size: 1.5rem; transition: 1s; '>Données de la montre reset</p>";
                    }
                    ?>
                </form>
            </section>
        </a>

        <a class="box">
            <img src="images/ajout.png" alt="">
            <h3>Ajouter un admin</h3>
            <section class="addadmin" id="addadmin">
                <form action="admin_screen/add_admin.php" method="post">
                    <div class="inputBox">
                        <span class="fas fa-user"></span>
                        <input type="text" name="Idtf" placeholder="Prénom" />
                    </div>
                    <div class="inputBox">
                        <span class="fas fa-id-badge"></span>
                        <input type="password" name="pwd1" placeholder="Mot de passe" />
                    </div>
                    <div class="inputBox">
                        <span class="fas fa-id-badge"></span>
                        <input
                                type="password"
                                name="pwd2"
                                placeholder="Confirmation mot de passe"
                        />
                        </div>
                    <div>
                        <input
                                type="submit"
                                value="Ajouter"
                                name="formsend"
                                id="formsend"
                                class="add"
                        />
                    </div>
                    <?php
                    if(isset($_GET['erreur'])){
                        $err = $_GET['erreur'];
                        if($err==2 || $err==5)
                            echo "<p style='color:white; padding: 1rem; font-size: 1.5rem; transition: 1s; '>Ajout réussi</p>";
                    }
                    ?>
                </form>
            </section>
        </a>

        <a class="box">
            <img src="images/equipe.png" alt="">
            <h3>Liste des admins</h3>
            <br>
            <section id="liste">
                <select multiple="yes" size="10">
                    <?php $rep = $bdd->query('SELECT * FROM connexion WHERE CodeStatut=02');
                    while ($donnees = $rep->fetch())
                    {
                        ?>
                        <option value="<?php echo $donnees; ?>">
                            <?php echo $donnees['Identifiant']; ?>
                        </option>
                    <?php } ?>
                </select>
            </section>

        </a>

        <a class="box">
            <img src="images/pas-de-foule.png" alt="">
            <h3>Supprimer un admin</h3>
            <section class="deladmin" id="deladmin">
                <form action="admin_screen/del_admin.php" method="post">
                    <div class="inputBox">
                        <span class="fas fa-user"></span>
                        <input type="text" name="Idt" placeholder="Prénom" />
                    </div>
                    <div>
                        <input
                                type="submit"
                                value="Supprimer"
                                name="formsend"
                                id="formsend"
                                class="add"
                        />
                    </div>
                    <?php
                    if(isset($_GET['erreur'])){
                        $err = $_GET['erreur'];
                        if($err==1 || $err==5)
                            echo "<p style='color:white; padding: 1rem; font-size: 1.5rem; transition: 1s; '>Suppression réussie</p>";
                    }
                    ?>
                </form>
            </section>
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