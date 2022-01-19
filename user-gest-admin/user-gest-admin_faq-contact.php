<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>LaMontre - Contact</title>
</head>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Montre - FAQ</title>

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
            <a href="user-gest-admin_menu.php">Mon Menu</a>
            <a href="user-gest-admin_ma-journee.php">Ma journée</a>
            <a href="user-gest-admin_statistiques.php">Mes Stats</a>
            <a href="user-gest-admin_conseils.php">Mes Conseils</a>
        </nav>
        <div class="fas fa-bars" id="menu-btn"></div>
    </div>

    <a href="../fin_de_session.php" class="logo">
        <h2>
            <?php
            session_start();

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
            <h5> Aller sur la page de connection et cliquer sur s'inscrire. Vous allez arriver sur la page d'inscription et remplissez le formulaire d'inscription. En tant que gestionnnaire de votre famille ou unique utilisateur/utilisatrice de La montre, vous devez cocher la case à la fin du formulaire pour obtenir un code famille.
                Sinon, renseignez le code famille que votre gestionnaire de famille possède. Le gestionnaire peut retrouver le code famille en haut de sa page d'accueil.  Le code produit se trouve sur La Montre. A vous de choisir votre nom d'utilisateur et votre mot de passe.</h5>
            <br>
            <h4>Comment se connecter ?</h4>
            <br>
            <h5> Aller sur la page de connexion, rentrer votre nom d'utilisateur pour identifiant et le mot de passe choisi lors de l'inscription. </h5>
            <br>
            <h4> J'ai oublié mon mot de passe ou mon identifiant, comment faire ? </h4>
            <br>
            <h5> Aller sur la page contact et remplir le formulaire. Vous recevrez par mail, votre nouveau mot de passe par les administrateurs. </h5>
            <br>
            <h4> Comment changer mon mot de passe ? </h4>
            <br>
            <h5> Si vous êtes gestionnaire,connectez-vous puis sur le menu cliquez sur le bouton "ma famille". Ensuite cliquer sur l'utilisateur et renseigner le nouveau mot de passe.
            Si vous n'êtes pas gestionnaire, vous pouvez demander au gestionnaire ou faire une demande via le formulaire de contact. </h5>
            <br>
            <h4> Comment voir les scores des autres membres de la famille ? </h4>
            <br>
            <h5> Seuls les gestionnaires peuvent accéder aux scores des autres membres de la famille. Ces derniers y accédent à partir de la page d'accueil en cliquant sur "ma famille" puis sur le compte choisi.
            Le ou la gestionnaire peut aussi accéder aux données des autres utilisateurs en passant par sa page dédiée et y entrer le login d'un autre membre.</h5>
            <br>
            <h4> Comment ajouter un membre à sa famille</h4>
            <br>
            <h5> On ne peut pas ajouter de membre à sa famille. C'est au futur membre de rentrer le code famille que possède le gestionnaire ors de l'inscription.</h5>
            <br>
            <h4>Comment contacter les administrateurs ?</h4>
            <br>
            <h5>Il suffit d'aller sur la page contact (la même que cette FAQ) et d'écrire son message avec un objet et son mail.</h5>
            <br>
            <h4>Je veux lire les CGU où sont-elles ?</h4>
            <br>
            <h5> Les CGU sont accessibles en bas de chaque page.</h5>
            <br>
            <h4>Quelles sont les données mesurées par la montre et comment les analyser ?</h4>
            <br>
            <h5>La Montre mesure le dioxyde d'azote, la température, le pouls et le bruit ambiant. Ces données sont disponibles sur les pages statistiques avec un affichage graphique pour observer les évolutions dans le temps de ces métriques.
            Enfin un score permettra de comprendre l'influence des paramètres du milieu de vie mesurés et ses effets sur l'utilisateur.
            Ce score sera accompagner de conseils pour pouvoir améliorer son bien-être.</h5>
            <br>
            <h4>Comment télécharger mes données ?</h4>
            <br>
            <h5>Un utilisateur de La Montre peut télécharger ses données à partir de sa page statistique. Le gestionnaire peut télécharger toutes les données de la famille en allant sur sa page spécifique et cliquer sur le bouton prévu à cet effet</h5>
            <br>
            <h4>Je désire supprimer mes données ou mon compte, quelle procédure ?</h4>
            <br>
            <h5>Pour répondre à ce besoin, veuillez contacter les administrateurs via le formulaire de contact.</h5>
            <br>
            <h4>J'ai une question qui n'ai pas dans la FAQ, comment faire ?</h4>
            <br>
            <h5>Rendez-vous sur la page contact (la même que cette FAQ) et écrivez son message avec un objet et son mail.</h5>

        </div>
        </div>
        <?php
        // define variables and set to empty values
        $nameErr = $emailErr = $genderErr = $websiteErr = "";
        $name = $email= $message="";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["name"])) {
                $nameErr = "Name is required";
            } else {
                $name = test_input($_POST["name"]);
                // check if name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                    $nameErr = "Only letters and white space allowed";
                }
            }

            if (empty($_POST["email"])) {
                $emailErr = "Email is required";
            } else {
                $email = test_input($_POST["email"]);
                // check if e-mail address is well-formed
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "Invalid email format";
                }
            }
        }
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <h3>Nous Joindre</h3>
            <div class="inputBox">
                <span class="fas fa-user"></span>
                <input type="text" placeholder="Nom">
                <span class="error"> <?php echo $nameErr;?></span>

            </div>
            <div class="inputBox">
                <span class="fas fa-envelope"></span>
                <input type="email" placeholder="email">
                <span class="error"> <?php echo $nameErr;?></span>
            </div>
            <div class="inputBox">
                <span class="fas fa-comment"></span>
                <input type="text" placeholder="Votre message">
                <span class="error"> <?php echo $nameErr;?></span>

            </div>
            <input type="submit" style="background: brown; font-weight: bold;" value="Envoyer" class="btn">
        </form>
        <?php
        echo $name;
        echo "<br>";
        echo $email;
        echo "<br>";
        echo "$message";
        ?>


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