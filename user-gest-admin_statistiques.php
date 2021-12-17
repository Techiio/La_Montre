<?php
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

$id = "jean";

$sql = "SELECT CodeProduit FROM profil WHERE Identifiant ='$id'";
$req = $db->query($sql);
$data = $req->fetch();
$codeproduit = $data['CodeProduit'];

$sql = 'SELECT * FROM donneesmontre WHERE CodeProduit ='. $codeproduit .' ORDER BY Date DESC, Heure DESC LIMIT 168';
$req = $db->query($sql);

$vdate = [];
$vBpm = [];
$vdB = [];
$vNo2 = [];
$vDegCel = [];

$sdate = [];
$sBpm = [];
$sdB = [];
$sNo2 = [];
$sDegCel = [];

$mheure = [];
$mBpm = [];
$mdB = [];
$mNo2 = [];
$mDegCel = [];

for($var = 0; $var < 7; $var++){
    $mBpm[$var] = 0;
    $mdB[$var] = 0;
    $mNo2[$var] = 0;
    $mDegCel[$var] = 0;
}



$a = 0;
$i = 0;
$init = TRUE;
$vardate = [];

while ($data = $req->fetch()) {
    $date = $data['Date'];
    $heure = $data['Heure'];
    $Bpm = $data['Bpm'];
    $dB = $data['dB'];
    $No2= $data['No2'] ;
    $DegCel = $data['DegréCelsius'];

    while($init){
        $vardate[$a] = $date;
        $vdate[$a] = substr($date, 8, 10).',';
        $init = FALSE;
    }

    if($date != $vardate[$a]){
        $sBpm[$a] = $mBpm[$a]/$i;
        $sdB[$a] = $mdB[$a]/$i;
        $sNo2[$a] = $mNo2[$a]/$i;
        $sDegCel[$a] = $mDegCel[$a]/$i ;

        $vBpm[$a] = ($mBpm[$a]/$i).',' ;
        $vdB[$a] = ($mdB[$a]/$i).',';
        $vNo2[$a] = ($mNo2[$a]/$i).',' ;
        $vDegCel[$a] = ($mDegCel[$a]/$i).',' ;

        $a = $a + 1;
        $i = 0;

        $init = TRUE;
    }

    $i = $i + 1;
    $mBpm[$a] = $mBpm[$a] + $Bpm;
    $mdB[$a] = $mdB[$a] + $dB;
    $mNo2[$a] = $mNo2[$a] + $No2;
    $mDegCel[$a] = $mDegCel[$a] + $DegCel;

}
$vBpm[$a] = ($mBpm[$a]/$i).',' ;
$vdB[$a] = ($mdB[$a]/$i).',';
$vNo2[$a] = ($mNo2[$a]/$i).',' ;
$vDegCel[$a] = ($mDegCel[$a]/$i).',' ;

$vdate = array_reverse($vdate);
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
        <title>Mes Stats</title>

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

    <div class="icons">
        <nav class="navbar">
            <a href="user-gest-admin_menu.php">Mon Menu</a>
            <a href="user-gest-admin_ma-journee.php">Ma Journée</a>
            <a href="user-gest-admin_conseils.php">Mes Conseils</a>
            <a href="user-gest-admin_faq-contact.php">Contact/FAQ</a>
        </nav>
        <div class="fas fa-bars" id="menu-btn"></div>
    </div>

    <a href="visiteur_accueil.php" class="logo">
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
    <h1 class="heading"> Mes <span>Stats</span> </h1>
</section>

<section class="datastat">

    <div class="box4">
        <p class="textgraph" style="color: darkorange">Evolution des données en fonction des 7 derniers jours</p>
        <canvas id="line-chart-week"></canvas>
    </div>
    <div class="box5">
        <p class="bigtext" style="color: darkorange">Infos de la semaine</p>
        <p class="bigtext">Meilleur score : </p>
        <p class="score" style="font-size: 2.5rem"><?php echo 'Insérer variable meilleur score' ?></p>
        <p class="text" style="color: #3cba9f">Pic de No2 : </p>
        <p class="score"><?php echo round(max($sNo2)).' insérer unité' ?></p>
        <p class="text" style="color: #3e95cd">Pic de poul : </p>
        <p class="score"><?php echo round(max($sBpm)).' Bpm' ?></p>
        <p class="text" style="color: #e8c3b9">Pic de température : </p>
        <p class="score"><?php echo round(max($sDegCel)).'°C' ?></p>
        <p class="text" style="color: #8e5ea2">Pic de son : </p>
        <p class="score"><?php echo round(max($sdB)).' dB' ?></p>

    </div>
    <div class="box6">
        <p class="text">Récupérer les données</p>
    </div>

    <div class="box7" style="background-color: lightgrey">
       <p class="textgraph">Score des 7 derniers jours</p>
        <canvas id="radar-chart"></canvas>
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
<script>
    new Chart(document.getElementById("line-chart-week"), {
        type: 'line',
        data: {
            labels: [
                <?php
                foreach($vdate as $var){
                    echo $var;
                }
                ?>
            ],
            datasets: [{
                data: [
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
                data: [
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
                data: [
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
                data: [
                    <?php

                    foreach ($vDegCel as $var) {
                        echo $var;
                    }

                    ?>
                ],
                label: "Degré Celsius",
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
<script>
    new Chart(document.getElementById("radar-chart"), {
        type: 'radar',
        data: {
            labels: ["Poul", "Son", "Dioxyde d'Azote", "Température"],
            datasets: [
                {
                    label: "<?php echo $vardate[0] ?>",
                    fill: true,
                    backgroundColor: "rgba(179,181,198,0.2)",
                    borderColor: "rgba(179,181,198,1)",
                    pointBorderColor: "#fff",
                    pointBackgroundColor: "rgba(179,181,198,1)",
                    data: [8.77,55.61,21.69,6.62,6.82]
                }, {
                    label: "<?php echo $vardate[1] ?>",
                    fill: true,
                    backgroundColor: "rgba(255,99,132,0.2)",
                    borderColor: "rgba(255,99,132,1)",
                    pointBorderColor: "#fff",
                    pointBackgroundColor: "rgba(255,99,132,1)",
                    pointBorderColor: "#fff",
                    data: [25.48,54.16,7.61,8.06,4.45]
                }, {
                    label: "<?php echo $vardate[2] ?>",
                    fill: true,
                    backgroundColor: "rgba(255,99,132,0.2)",
                    borderColor: "rgba(255,99,132,1)",
                    pointBorderColor: "#fff",
                    pointBackgroundColor: "rgba(255,99,132,1)",
                    pointBorderColor: "#fff",
                    data: [25.48,54.16,7.61,8.06,4.45]
                }
            ]
        },
        options: {
            scale: { angleLines: { color: "red" } }
        }
    });
</script>
</body>
</html>