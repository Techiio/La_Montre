<?php
// Connexion à la base de données
try
{
    $db = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8',
        'root',
        '');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

// Récuperation ID de connexion dans le cookie
$id = $_COOKIE['pseudo'];

// Récupération des données sur la journée liées à l'utilisateur
$sql = "SELECT CodeProduit FROM profil WHERE Identifiant ='$id'";
$req = $db->query($sql);
$data = $req->fetch();
$codeproduit = $data['CodeProduit'];

$sql = 'SELECT * FROM donneesmontre WHERE CodeProduit ='. $codeproduit .' ORDER BY Date DESC, Heure DESC LIMIT 24';
$req = $db->query($sql);

// Initialisation des valeurs initiales
$heure = [];
$Bpm = [];
$dB = [];
$No2 = [];
$DegCel = [];

$vheure = [];
$vBpm = [];
$vdB = [];
$vNo2 = [];
$vDegCel = [];

$i = 0;

// Trie des données dans les variables correctes
while ($data = $req->fetch()) { // Tant qu'il y a des données à traiter
    // On note les données de la journées
    $heure[$i] = $data['Heure'];
    $Bpm[$i] = $data['Bpm'];
    $dB[$i] = $data['dB'];
    $No2[$i] = $data['No2'] ;
    $DegCel[$i] = $data['DegréCelsius'];

    // On formate les données pour du Javascript
    $vheure[$i] = substr($data['Heure'], 0, 2).',';
    $vBpm[$i] = $data['Bpm'].',' ;
    $vdB[$i] = $data['dB'] .',';
    $vNo2[$i] = $data['No2'].',' ;
    $vDegCel[$i] = $data['DegréCelsius'].',' ;

    $i = $i + 1;

}
// Inversion des données dans les tableaux pour avoir en ordre chronologique dans les graphiques
$vheure = array_reverse($vheure);
$vBpm = array_reverse($vBpm);
$vdB = array_reverse($vdB);
$vNo2 = array_reverse($vNo2);
$vDegCel = array_reverse($vDegCel);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Titre de la page  -->
        <title>Ma Journée</title>

        <!-- font awesome cdn link  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

        <!-- custom css file link  -->
        <link rel="stylesheet" href="css/style.css">

        <!-- js chart -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.2/chart.min.js" integrity="sha512-tMabqarPtykgDtdtSqCL3uLVM0gS1ZkUAVhRFu1vSEFgvB73niFQWJuvviDyBGBH22Lcau4rHB5p2K2T0Xvr6Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    </head>
<body>

<!-- header section starts  -->

<header class="header">

    <a class="logo">
        <img src="images/LaMontreS.png" alt="">
    </a>

    <!-- Menu  -->
    <div class="icons">
        <nav class="navbar">
            <a href="user-gest-admin_menu.php">Mon Menu</a>
            <a href="user-gest-admin_statistiques.php">Mes Stats</a>
            <a href="user-gest-admin_conseils.php">Mes Conseils</a>
            <a href="user-gest-admin_faq-contact.php">Contact/FAQ</a>
        </nav>
        <div class="fas fa-bars" id="menu-btn"></div>
    </div>

    <!-- Bouton déconnexion  -->
    <a href="index.php" class="logo">
        <h2 style="color: antiquewhite; font-size: 2.5rem;">
            <?php

            if(isset($_COOKIE['pseudo'])){
                echo '' .$_COOKIE['pseudo'] ;
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

<section class="content">
    <h1 class="heading"> Ma <span>Journée</span> </h1>
</section>

<section class="datajour">

    <!-- Graphique des données sur la journée  -->
        <div class="box1" style="background-color: lightgrey">
            <p class="textgraph" style="color: darkorange">Evolution des données en fonction des dernières 24h</p>
            <canvas id="line-chart-day"></canvas>
        </div>

        <?php
        if (isset($_POST['button1'])) {
            if ($_COOKIE['statut'] == 1 or $_COOKIE['statut'] == 0) {
                $download='SELECT * FROM donneesmontre WHERE CodeProduit ='. $codeproduit .' ORDER BY Date DESC, Heure DESC LIMIT 24';
                $resul=array($db->query($download));

            }
            else {
                $deletion='DELETE * FROM donneesmontre WHERE CodeProduit ='. $codeproduit .' ORDER BY Date DESC, Heure DESC LIMIT 24';
                $resul=array($db->query($deletion));
            }
            $final=json_encode($resul);

        }

        ?>
        <div>
        <form method="post">
            <input type="submit" name="button1"
                   value="Gestion des données"/>
        </div>

        <!-- Infos de la journée  -->
        <div class="box3">
            <p class="bigtext" style="color: darkorange">Infos du Jour</p>
            <p class="text" style="color: #3cba9f">Pic de Dioxyde d'Azote : </p>
            <p class="score"><?php echo max($No2).' insérer unité' ?></p>
            <p class="text" style="color: #3e95cd">Pic de poul : </p>
            <p class="score"><?php echo max($Bpm).' Bpm' ?></p>
            <p class="text" style="color: #e8c3b9">Pic de température du corps : </p>
            <p class="score"><?php echo max($DegCel).'°C' ?></p>
            <p class="text" style="color: #8e5ea2">Pic de son : </p>
            <p class="score"><?php echo max($dB).' dB' ?></p>
        </div>

</section>
<!-- ma journée section end-->

<section class="footer">

    <div class="links">
        <a href="visiteur_CGU.php"  style="margin:0 4%;">CGU</a>
        <a>Version: 1.0.12.201</a>
    </div>


</section>

<!-- custom js file link  -->
<script src="js/script.js"></script>
<!-- Script pour le graphique des données de la journée  -->
<script>
    new Chart(document.getElementById("line-chart-day"), {
        type: 'line',
        data: {
            labels: [ <!-- Données en abscisse: heure  -->
                <?php
                foreach($vheure as $var){
                    echo $var;
                }
                ?>
            ],
            datasets: [{
                data: [ <!-- Données: poul  -->
                    <?php
                    foreach($vBpm as $var){
                        echo $var;
                    }
                    ?>
                ],
                label: "Bpm",
                borderColor: "#3e95cd",
                fill: false
            }, {
                data: [ <!-- Données: son  -->
                    <?php

                    foreach ($vdB as $var) {
                        echo $var;
                    }

                    ?>
                ],
                label: "dB",
                borderColor: "#8e5ea2",
                fill: false
            }, {
                data: [ <!-- Données: Dioxyde d'Azote  -->
                    <?php

                    foreach ($vNo2 as $var) {
                        echo $var;
                    }

                    ?>
                ],
                label: "No2",
                borderColor: "#3cba9f",
                fill: false
            }, {
                data: [ <!-- Données: Température  -->
                    <?php

                    foreach ($vDegCel as $var) {
                        echo $var;
                    }

                    ?>
                ],
                label: "°C",
                borderColor: "#e8c3b9",
                fill: false
            }
            ]
        },
            options: {
            title: {
                display: true,
                text: 'Evolution des données en fonction des dernières 24h'
            }
        }
    });
</script>
</body>
</html>