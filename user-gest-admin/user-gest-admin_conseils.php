<?php
session_start();
require_once("../load/data_conseils.php");
if(!isset($_SESSION['statut'])) {
    header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mes Conseils</title>

        <!-- font awesome cdn link  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

        <!-- custom css file link  -->
        <link rel="stylesheet" href="../css/style.css">

    </head>

<body>

<!-- header section starts  -->

<header class="header">

    <a class="logo">
        <img src="../images/LaMontreS.png" alt="">
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

    <a href="../load/fin_de_session.php" class="logo">
        <h2>
            <?php

            if(isset($_SESSION['pseudo'])){
                echo '' .$_SESSION['pseudo'] ;
            }
            ?>

        </h2>
        <h3>
            Déconnexion
        </h3>
    </a>

</header>

<!-- header section ends -->

<section class="content">
    <h1 class="heading">.</h1>
</section>
<!-- mes conseils section starts  -->

<section class="famille" id="famille">
    <h1 class="heading"> Mes <span>Conseils</span> </h1>
    <div class="box-container">
        <a class="box">
            <h3 style="text-transform: none">Meilleur donnée :</h3><br><br><br><br>
            <p><?php
                if ($meilleurScore == $scoreBpm)                                        // Permet d'afficher la meilleure valeur grâce au pire score observé
                {
                    echo round($sBpm[$a]);
                    echo " Bpm";
                }
                else if ($meilleurScore == $scoreNo2)
                {
                    echo round($sNo2[$a]);
                    echo " µg/m³";
                }
                else if ($meilleurScore == $scoreDegCel)
                {
                    echo round($sDegCel[$a]);
                    echo " °C";
                }
                else if ($meilleurScore == $scoredB)
                {
                    echo round($sdB[$a]);
                    echo " dB";
                }
                ?>
            </p>
        </a>
        <a class="box">
            <h3 style="text-transform: none">Pire donnée :</h3><br><br><br><br>
            <p> <?php
                if ($pireScore == $scoreBpm)                                            // Permet d'afficher la pire valeur grâce au pire score observé
                {
                    echo round($sBpm[$a]);
                    echo " Bpm";
                }
                else if ($pireScore == $scoreNo2)
                {
                    echo round($sNo2[$a]);
                    echo " µg/m³";
                }
                else if ($pireScore == $scoreDegCel)
                {
                    echo round($sDegCel[$a]);
                    echo " °C";
                }
                else if ($pireScore == $scoredB)
                {
                    echo round($sdB[$a]);
                    echo " dB";
                }?></p>
        </a>

    </div><br><br>
    <div class="box-container">
        <a href="#" class="box">
            <h3>Score : <?php echo intval($scoreTotal[$a]) ?> <span style="padding: 0 0 0 10%; text-transform: none" >Score précédent :</span> <?php echo intval($scoreTotal[$a-1])?></h3><br><br>  <!-- Affiche le score du jour et le score d'hier -->
            <h2>/100</h2><br><br>
            <h2 style="color: darkgoldenrod; font-size: large">
                <?php                                                                         // Compare le score du jour et le score d'hier et donne un conseil en fonction du résultat
                    if (intval($scoreTotal[$a]) > intval($scoreTotal[$a-1]))
                    {
                        echo "Vous progressez, bien joué !";
                    }
                    elseif (intval($scoreTotal[$a]) == intval($scoreTotal[$a-1]))
                    {
                        echo "Vous avez obtenu le même score qu'hier. Continuez vos efforts !";
                    }
                    elseif (intval($scoreTotal[$a]) < intval($scoreTotal[$a-1]))
                    {
                        echo "Votre score est moins bon que celui d'hier. Ne baissez pas les bras !";
                    }
                    ?>
            </h2><br><br>
            <h3 style="text-transform: none">Conseil du jour :
                <?php
                    if ($pireScore == $scoredB)                                 // Donne un conseil en fonction de la pire donnée
                    {
                        echo "Vous êtes trop exposé au bruit. Allez dans des endroits calmes";
                    }
                    elseif ($pireScore == $scoreNo2)
                    {
                        echo "Attention! Vous absorbez un taux de dioxyde d'azote plus élevé que la moyenne. Éloignez-vous des engins à moteurs dès que possible";
                    }
                    elseif ($pireScore == $scoreBpm && $Bpm < 70 )
                    {
                        echo "Votre pouls est trop faible (Normal pour un athlète). Allez voir un médecin.";
                    }
                    elseif ($pireScore == $scoreBpm && $Bpm > 70 )
                    {
                        echo "Votre pouls est trop élevé. En parlez à son médecin.";
                    }
                    elseif ($pireScore == $scoreDegCel && $DegCel < 30 )
                    {
                        echo "Vous êtes exposé au froid. Réchauffez-vous à l’aide d’une couverture de survie isothermique et placer vous dans un coin chaud.";
                    }
                    elseif ($pireScore == $scoreDegCel && $DegCel > 30 )
                    {
                        echo "Vous êtes exposé à la chaleur. Vous avez une insolation,un coup de chaleur ou peut-être de la fièvre.";
                    }
                ?></h3><br><br>
        </a>

</section>

<!-- ma famille section ends -->

<section class="footer">

    <div class="links">
        <a href="../visiteur/visiteur_CGU.php" style="margin:0 4%;">CGU</a>
        <a>Version: 1.0.12.201</a>
    </div>


</section>

<!-- custom js file link  -->
<script src="../js/script.js"></script>

</html>
