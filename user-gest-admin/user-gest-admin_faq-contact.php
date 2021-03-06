<?php
session_start();
if(!isset($_SESSION['statut'])){
    header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nous contacter</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../css/style.css">

</head>
<body>

</body>
<!-- header section starts  -->

<header class="header">

    <a class="logo">
        <img src="../images/LaMontreS.png" alt="">
    </a>

    <div class="icons">
        <nav class="navbar">
            <?php
            if($_SESSION['statut']==1) { ?>
                <a href="../user-gest-admin/user-gest-admin_menu.php?error=3" class="logo">Mon Menu</a>
                <?php }
            else{ ?> <a href="user-gest-admin_menu.php">Mon Menu</a> <?php }
             ?>
            <a href="user-gest-admin_ma-journee.php">Ma journée</a>
            <a href="user-gest-admin_statistiques.php">Mes Stats</a>
            <a href="user-gest-admin_conseils.php">Mes Conseils</a>
        </nav>
        <div class="fas fa-bars" id="menu-btn"></div>
    </div>

    <a href="../load/fin_de_session.php" class="logo">
        <h2 style="color:<?php if(isset($_COOKIE['couleur'])) {
            echo '' . $_COOKIE['couleur'];
        }?>">
            <?php

            if(isset($_SESSION['pseudo'])) {
                echo '' . $_SESSION['pseudo'];
            }
            ?>

        </h2>
        <h3>
            Déconnexion
        </h3>
    </a>

</header>

<!-- header section ends -->

<!-- contact section starts  -->
<section class="content">
    <h1 class="heading">. </h1>
</section>

<section class="contact" id="contact">

    <h1 class="heading"> <span>Nous</span> Contacter</h1>

    <div class="row">
        <div class="div2">
        <h3 > Foire aux questions</h3>
            <div class="div1">

                <br>
                <h4> Comment se connecter pour la première fois ? </h4>
                <br>
                <h5> Aller sur la page de connexion et cliquer sur s'inscrire. Vous allez arriver sur la page d'inscription: remplissez le formulaire d'inscription. En tant que gestionnaire de votre famille ou unique utilisateur/utilisatrice de La Montre, vous devez cocher la case à la fin du formulaire pour obtenir un code famille.
                    Sinon, renseignez le code famille que votre gestionnaire de famille possède. Le gestionnaire peut retrouver le code famille en haut de sa page de menu.  Le code produit se trouve sur votre produit La Montre. A vous de choisir votre nom d'utilisateur et votre mot de passe.</h5>
                <br>
                <h4>Comment se connecter ?</h4>
                <br>
                <h5> Allez sur la page de connexion, rentrez votre nom d'utilisateur pour identifiant et le mot de passe choisi lors de l'inscription. </h5>
                <br>
                <h4> J'ai oublié mon mot de passe ou mon identifiant, comment faire ? </h4>
                <br>
                <h5> Allez sur la page contact et remplissez le formulaire. Vous recevrez par mail, votre nouveau mot de passe par les administrateurs. </h5>
                <br>
                <h4> Comment changer mon mot de passe ? </h4>
                <br>
                <h5> Si vous êtes gestionnaire,connectez-vous puis sur la page menu cliquez sur le bouton "ma famille". Ensuite cliquez sur l'utilisateur et renseignez le nouveau mot de passe.
                    Si vous n'êtes pas gestionnaire, vous pouvez demander au gestionnaire ou faire une demande via le formulaire de contact. </h5>
                <br>
                <h4> Comment voir les scores des autres membres de la famille ? </h4>
                <br>
                <h5> Seuls les gestionnaires peuvent accéder aux scores des autres membres de la famille. Ces derniers y accèdent à partir de la page d'accueil en cliquant sur "ma famille" puis sur le compte choisi.
                    Le ou la gestionnaire peut aussi accéder aux données des autres utilisateurs en passant par sa page dédiée et y entrer le login d'un autre membre.</h5>
                <br>
                <h4> Comment ajouter un membre à sa famille ?</h4>
                <br>
                <h5> On ne peut pas ajouter de membre à sa famille. C'est au futur membre de rentrer le code famille que possède le gestionnaire lors de l'inscription.</h5>
                <br>
                <h4>Comment contacter les administrateurs ?</h4>
                <br>
                <h5>Il suffit d'aller sur la page contact (la même que cette FAQ) et d'écrire son message avec un objet et son mail.</h5>
                <br>
                <h4>Je veux lire les CGU: où sont-elles ?</h4>
                <br>
                <h5> Les CGU sont accessibles en bas de chaque page.</h5>
                <br>
                <h4>Quelles sont les données mesurées par la montre et comment les analyser ?</h4>
                <br>
                <h5>La Montre mesure le dioxyde d'azote, la température, le pouls ainsi que le bruit ambiant. Ces données sont disponibles sur les pages statistiques avec un affichage graphique pour observer les évolutions dans le temps de ces métriques.
                    Enfin un score permettra de comprendre l'influence des paramètres du milieu de vie mesurés et ses effets sur l'utilisateur.
                    Ce score sera accompagné de conseils pour pouvoir améliorer son bien-être.</h5>
                <br>
                <h4>Comment télécharger mes données ?</h4>
                <br>
                <h5>Un utilisateur de La Montre peut télécharger ses données à partir de sa page statistique ou bien de sa page journée. Le gestionnaire peut télécharger toutes les données de la famille en allant sur sa page spécifique et cliquer sur le bouton prévu à cet effet</h5>
                <br>
                <h4>Je désire supprimer mes données ou mon compte, quelle procédure ?</h4>
                <br>
                <h5>Pour supprimer vos données, veuillez demander au gestionnaire de votre famille de s'en charger depuis l'espace famille dont il a accès.
                    Pour supprimer votre compte, veuillez contacter un administrateur depuis la page contact (la même que cette FAQ).</h5>
                <br>
                <h4>J'ai une question qui n'est pas dans la FAQ, comment faire ?</h4>
                <br>
                <h5>Rendez-vous sur la page contact (la même que cette FAQ) et écrivez votre message avec un objet et votre mail.</h5>

            </div>
        </div>

        <form action="../load/contact.php" id="myForm" method="post" >
            <h3>Nous joindre</h3>
            <div class="inputBox">
                <span class="fas fa-user"></span>
                <input id="name" type="text" name="name" placeholder="Nom">
            </div>
            <div class="inputBox">
                <span class="fas fa-envelope"></span>
                <input id="email" type="email" name="email" placeholder="Email">
            </div>
            <div class="inputBox">
                <span class="fas fa-comment"></span>
                <input id="body" type="text" name="body" placeholder="Votre message">


            </div>
            <input style="background: brown; font-weight: bold;" onclick="sendEmail()" type="submit" value="Envoyer" class="btn">
            <?php
            if(isset($_GET['erreur'])){
                $er = $_GET['erreur'];
                if($er==1)
                    echo "<p style='color:lawngreen; padding: 1rem; text-align: center; font-weight: bold; font-size: 1.5rem; transition: 1s; '>Formulaire envoyé</p>";
                elseif ($er==2)
                    echo "<p style='color: darkred; padding: 1rem; text-align: center; font-weight: bold; font-size: 1.5rem; transition: 1s; '>Echec</p>";

            }
            ?>

        </form>
        <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script type="text/javascript">
            function sendEmail() {
                var name = $("#name");
                var email = $("#email");
                var subject = "Contact";
                var body = $("#body");

                if (isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body)) {
                    $.ajax({
                        url: 'contact.php',
                        method: 'POST',
                        dataType: 'json',
                        data: {
                            name: name.val(),
                            email: email.val(),
                            subject: subject.val(),
                            body: body.val()
                        }, success: function (response) {
                            $('#myForm')[0].reset();
                            $('.sent-notification').text("Message Sent Successfully.");
                        }
                    });
                }
            }

            function isNotEmpty(caller) {
                if (caller.val() == "") {
                    caller.css('border', '1px solid red');
                    return false;
                } else
                    caller.css('border', '');

                return true;
            }
        </script>

    </div>
<!--début du code pour les e-mails sous linux-->

</section>



<!-- contact section ends -->



<!-- custom css file link  -->
<link rel="stylesheet" href="../css/style.css">

</head>
<body>



<section class="footer">

    <div class="links">
        <a href="../visiteur/visiteur_CGU.php" style="margin:0 4%;">CGU</a>
        <a>Version: 1.0.12.201</a>
    </div>


</section>

</html>