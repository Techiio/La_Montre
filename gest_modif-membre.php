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
            <a href="gest_comptes-famille.php">Comptes Famille</a>
        </nav>
        <div class="fas fa-bars" id="menu-btn"></div>
    </div>

    <a href="fin_de_session.php" class="logo">
        <h2>
            <?php

            if(isset($_SESSION['pseudo'])) {
                echo '' . $_SESSION['pseudo'];
            }
            ?>

        </h2>
        <h3>Déconnexion</h3>
    </a>

</header>

<!-- modif membre section starts  -->

<section class="modif" id="modif">

    <h1 class="heading"> our <span>blogs</span> </h1>
    <br>
    <br>
    <br>
    <div class="box-container">

        <div class="box">
            <div class="image">
                <img src="../images/nom-dutilisateur (1)-modified.png" alt="">
            </div>
            <div class="content">
                <a class="title">Nom d'utilisateur</a>
                <form action="gest/idt_gest.php" method="post">
                    <div class="inputBox">
                        <input name="Idt" type="text" placeholder="Prénom actuel">
                    </div>
                    <div class="inputBox">
                        <input name="New_Idt"type="text" placeholder="Nouveau Prénom">
                    </div>

                <a class="btn">
                    <input
                            type="submit"
                            value="Appliquer"
                            name="formsend"
                            id="formsend"
                            class="btn"
                    />
                </a>
                    <?php
                    if(isset($_GET['message'])){
                        $mes = $_GET['message'];
                        if($mes==1)
                            echo "<p style='color:limegreen; padding: 1rem; font-size: 2rem; transition: 1s; '>Changement réussie</p>";
                        elseif ($mes==2)
                            echo "<p style='color:red; padding: 1rem; font-size: 2rem; transition: 1s; '>Nom d'utilisateur déjà utilisé</p>";
                        elseif ($mes==3)
                            echo "<p style='color:red; padding: 1rem; font-size: 2rem; transition: 1s; '>Erreur d'orthographe sur le prénom actuel</p>";
                    }
                    ?>

                </form>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="../images/nom-dutilisateur-modified.png" alt="">
            </div>
            <div class="content">
                <a class="title">Modifier le Mot de Passe</a>
                <form action="gest/pwd_gest.php" method="post">
                    <div class="inputBox">
                        <input name="Idt" type="text" placeholder="Prénom">
                    </div>
                    <div class="inputBox">
                        <input name="pwd1" type="text" placeholder="Nouveau Mot de Passe">
                    </div>
                    <div class="inputBox">
                        <input name="pwd2"type="text" placeholder="Confirmation Nouveau Mot de Passe">
                    </div>

                <a class="btn">
                    <input
                            type="submit"
                            value="Appliquer"
                            name="formsend"
                            id="formsend"
                            class="btn"
                    />
                </a>
                    <?php
                    if(isset($_GET['erreur'])){
                        $err = $_GET['erreur'];
                        if($err==1 || $err==5)
                            echo "<p style='color:red; padding: 1rem; font-size: 1.5rem; transition: 1s; '>Vous n'êtes pas autorisé à changer ce mot de passe</p>";
                        elseif ($err==2 || $err==5)
                            echo "<p style='color:red; padding: 1rem; font-size: 1.5rem; transition: 1s; '>Les mots de passe ne correspondent pas</p>";
                        elseif ($err==0 || $err==5)
                            echo "<p style='color:lightgreen; padding: 1rem; font-size: 1.5rem; transition: 1s; '>Changement de mot de passe réussi</p>";
                    }
                    ?>
                </form>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="../images/palette-de-couleurs-modified.png" alt="">
            </div>
            <div class="content">
                <a class="title">Changer la couleur</a>
                <form action="gest/color_gest.php" id="get_color" method="post" >
                <div class="inputBox">
                    <input type="text" name="Idt" placeholder="Prénom">
                </div>
                <br>
                <select id="new_color" name="new_color" size="10" required>
                    <option value="red" >rouge  </option>
                    <option value="salmon">saumon</option>
                    <option value="hotpink">rose</option>
                    <option value="orange">orange</option>
                    <option value="gold">or</option>
                    <option value="purple">violet</option>
                    <option value="lime">vert</option>
                    <option value="cyan" >cyan</option>
                    <option value="blue">bleu</option>
                    <option value="peru">marron</option>
                </select>
                    <a class="btn">
                    <input
                            type="submit"
                            value="Appliquer"
                            name="formsend"
                            id="formsend"
                            class="btn"
                    />
                    </a>
                    <?php
                    if(isset($_GET['message'])){
                        $mes = $_GET['message'];
                        if($mes==4)
                            echo "<p style='color:limegreen; padding: 1rem; font-size: 2rem; transition: 1s; '>Changement effectué</p>";
                        elseif ($mes == 5)
                            echo "<p style='color:red; padding: 1rem; font-size: 2rem; transition: 1s; '>Erreur d'orthographe sur le prénom</p>";
                    }
                    ?>
                </form>
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