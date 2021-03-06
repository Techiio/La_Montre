<?php
session_start();
require_once("../load/data_stat.php");
if(!isset($_SESSION['statut'])){
    header("Location: ../index.php");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Titre de la page -->
        <title>Mes Stats</title>

        <!-- font awesome cdn link  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

        <!-- custom css file link  -->
        <link rel="stylesheet" href="../css/style.css">

        <!-- js chart -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.2/chart.min.js" integrity="sha512-tMabqarPtykgDtdtSqCL3uLVM0gS1ZkUAVhRFu1vSEFgvB73niFQWJuvviDyBGBH22Lcau4rHB5p2K2T0Xvr6Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    </head>
<body>

<!-- header section starts  -->

<header class="header">

    <a class="logo">
        <img src="../images/LaMontreS.png" alt="">
    </a>
    <!-- Menu -->
    <div class="icons">
        <nav class="navbar">
            <?php
            if($_SESSION['statut']==1) { ?>
                <a href="../user-gest-admin/user-gest-admin_menu.php?error=3" class="logo">Mon Menu</a>
                <?php }
            else{ ?> <a href="user-gest-admin_menu.php">Mon Menu</a> <?php }
             ?>
            <a href="user-gest-admin_ma-journee.php">Ma Journée</a>
            <a href="user-gest-admin_conseils.php">Mes Conseils</a>
            <a href="user-gest-admin_faq-contact.php">FAQ/Contact</a>
        </nav>
        <div class="fas fa-bars" id="menu-btn"></div>
    </div>

    <!--Bouton déconnexion -->
    <a href="../load/fin_de_session.php" class="logo">
        <h2 style="color:<?php if(isset($_COOKIE['couleur'])) {
            echo '' . $_COOKIE['couleur'];
        }?>">
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

<!-- ma journée section starts  -->
<section class="content">
    <h1 class="heading">.</h1>
</section>

<!-- Titre de la page -->
<section class="content">
    <h1 class="heading"> Mes <span>Stats</span> </h1>
</section>

<section class="datastat">
    <!-- Graphiques de données sur la semaine -->
    <div class="box4" style="background-color: lightgrey">
        <p class="textgraph" style="color: darkorange">Evolution des données en fonction des 7 derniers jours</p>
        <canvas id="line-chart-week"></canvas>
    </div>

    <!-- Données maximales atteintes sur la semaine -->
    <div class="box5">
        <p class="text" style="color: #3cba9f">Pic de No2 : </p>
        <p class="score"><?php echo round(max($sNo2)).' μg/m3' ?></p>
        <br>
        <p class="text" style="color: #3e95cd">Pic de poul : </p>
        <p class="score"><?php echo round(max($sBpm)).' Bpm' ?></p>
        <br>
        <p class="text" style="color: #e8c3b9">Pic de température : </p>
        <p class="score"><?php echo round(max($sDegCel)).'°C' ?></p>
        <br>
        <p class="text" style="color: #8e5ea2">Pic de son : </p>
        <p class="score"><?php echo round(max($sdB)).' dB' ?></p>

    </div>

    <!-- Récupération des données -->
    <div class="box6">
        <form method="GET" action="../load/download_stat.php">
            <input type ="hidden" name="code" class='btn' value=" <?php echo $codeproduit ?>" />
            <input type="submit" name="button1" class='btn' style="background: seagreen; font-weight: bold;" value="Télécharger ma semaine"/>
            
        </form>
        <?php
        if($_SESSION['statut']==1 ||$_SESSION['statut']==2 || isset($_SESSION['pseudotemporaire'])) {
            echo '<a class="box">
                <section class="rd" id="rd">
                    <form action="../load/reset_data_user-gest-admin_statistiques.php" method="post">
                        <div>
                            <input
                                    type="submit"
                                    style="background: brown; font-weight: bold; letter-spacing: 0;"
                                    value="Supprimer les données"
                                    name="formsend"
                                    id="formsend"
                                    class="add"
                            />
                        </div>
                    </form>
                </section>
            </a>';
        }
        ?>
    </div>

    <!-- Graphique en toile d'araignées sur les données des derniers jours -->
    <div class="box7" style="background-color: lightgrey">
       <p class="textgraph" style="color: orange">Score des 3 derniers jours</p>
        <canvas id="radar-chart"></canvas>
    </div>

</section>
<!-- ma journée section end-->

<section class="footer">

    <div class="links">
        <a href="../visiteur/visiteur_CGU.php" style="margin:0 4%;">CGU</a>
        <a>Version: 1.0.12.201</a>
    </div>


</section>

<!-- custom js file link  -->
<script src="../js/script.js"></script>
<!-- Script pour la création du graphique en lignes -->
<script>
    new Chart(document.getElementById("line-chart-week"), {
        type: 'line',
        data: {
            labels: [ <!-- Valeurs en abscisses: la date -->
                <?php
                foreach($vdate as $var){
                    echo $var;
                }
                ?>
            ],
            datasets: [{
                <!-- Données sur le poul -->
                data: [
                    <?php
                    foreach($vBpm as $var){
                        echo $var;
                    }
                    ?>
                ],
                label: "Poul (Bpm)",
                borderColor: "#3e95cd",
                fill: false
            }, {
                <!-- Données sur le son -->
                data: [
                    <?php

                    foreach ($vdB as $var) {
                        echo $var;
                    }

                    ?>
                ],
                label: "Son (dB)",
                borderColor: "#8e5ea2",
                fill: false
            }, {
                <!-- Données sur le Dioxyde d'Azote -->
                data: [
                    <?php

                    foreach ($vNo2 as $var) {
                        echo $var;
                    }

                    ?>
                ],
                label: "No2 (μg/m3)",
                borderColor: "#3cba9f",
                fill: false
            }, {
                <!-- Données sur la température -->
                data: [
                    <?php

                    foreach ($vDegCel as $var) {
                        echo $var;
                    }

                    ?>
                ],
                label: "Température (°C)",
                borderColor: "#e8c3b9",
                fill: false
            }
            ]
        }
    });
</script>
<!-- Script du graphique en toile d'araignée -->
<script>
    new Chart(document.getElementById("radar-chart"), {
        type: 'radar',
        data: {
            labels: ["Poul", "Son", "Dioxyde d'Azote", "Température"], <!-- Le nom des données -->
            datasets: [
                <!-- Pour chaque journée -->
                {
                    label: "<?php echo $vardate[0] ?>", <!-- On affiche le jour traité -->
                    fill: true,
                    backgroundColor: "rgba(62,62,64,0.2)",
                    borderColor: "rgb(92,93,105)",
                    pointBorderColor: "#fff",
                    pointBackgroundColor: "rgb(94,94,107)",
                    data: [ <!-- Données a afficher dans la toile -->
                        <?php
                        echo $scoreBpm[0], $scoredB[0], $scoreNo2[0], $scoreDegCel[0];
                        ?>
                    ]
                }, {
                    label: "<?php echo $vardate[1] ?>",
                    fill: true,
                    backgroundColor: "rgba(255,99,132,0.2)",
                    borderColor: "rgba(255,99,132,1)",
                    pointBorderColor: "#fff",
                    pointBackgroundColor: "rgba(255,99,132,1)",
                    pointBorderColor: "#fff",
                    data: [
                        <?php
                        echo $scoreBpm[1], $scoredB[1], $scoreNo2[1], $scoreDegCel[1];
                        ?>
                    ]
                }, {
                    label: "<?php echo $vardate[2] ?>",
                    fill: true,
                    backgroundColor: "rgba(193,59,238,0.2)",
                    borderColor: "rgb(155,82,192)",
                    pointBorderColor: "#fff",
                    pointBackgroundColor: "rgb(195,99,243)",
                    pointBorderColor: "#fff",
                    data: [
                        <?php
                        echo $scoreBpm[2], $scoredB[2], $scoreNo2[2], $scoreDegCel[2];
                        ?>
                    ]
                }
            ]
        }
    });
</script>
</body>
</html>