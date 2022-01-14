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
$id = $_COOKIE['pseudo'];

$sql = "SELECT CodeProduit FROM profil WHERE Identifiant ='$id'";
$req = $db->query($sql);
$data = $req->fetch();
$codeproduit = $data['CodeProduit'];

$sql = 'SELECT * FROM donneesmontre WHERE CodeProduit ='. $codeproduit .' ORDER BY Date DESC, Heure DESC LIMIT 24';
$req = $db->query($sql);

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

while ($data = $req->fetch()) {
    $heure[$i] = $data['Heure'];
    $Bpm[$i] = $data['Bpm'];
    $dB[$i] = $data['dB'];
    $No2[$i] = $data['No2'] ;
    $DegCel[$i] = $data['DegréCelsius'];

    $vheure[$i] = substr($data['Heure'], 0, 2).',';
    $vBpm[$i] = $data['Bpm'].',' ;
    $vdB[$i] = $data['dB'] .',';
    $vNo2[$i] = $data['No2'].',' ;
    $vDegCel[$i] = $data['DegréCelsius'].',' ;

    $i = $i + 1;

}
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

    <div class="icons">
        <nav class="navbar">
            <a href="user-gest-admin_menu.php">Mon Menu</a>
            <a href="user-gest-admin_statistiques.php">Mes Stats</a>
            <a href="user-gest-admin_conseils.php">Mes Conseils</a>
            <a href="user-gest-admin_faq-contact.php">Contact/FAQ</a>
        </nav>
        <div class="fas fa-bars" id="menu-btn"></div>
    </div>

    <a href="index.php" class="logo">
        <h2>
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

        <div class="box1" style="background-color: lightgrey">
            <p class="textgraph" style="color: darkorange">Evolution des données en fonction des dernières 24h</p>
            <canvas id="line-chart-day"></canvas>
        </div>
        <div class="boxsupr">
            <a class="box">
                <section class="rd" id="rd">
                    <form action="reset_data_user-gest-admin_ma-journee.php" method="post">
                        <<div class="inputBox">
                            <input type="text" name="Idt" placeholder="Identifiant" />
                        </div>
                        <div>
                            <input
                                    type="submit"
                                    value="Pour supprimer vos données, saisissez votre identifiant puis cliquez sur le bouton"
                                    name="formsend"
                                    id="formsend"
                                    class="add"
                            />
                        </div>

                        <?php
                        if(isset($_GET['erreur'])){
                            $err = $_GET['erreur'];
                            if($err==3) {
                                echo "<p style='color:white; padding: 1rem; font-size: 1.5rem; transition: 1s; '>Données de la montre reset</p>";
                            }

                            elseif($err==5) {
                                echo "<p style='color:white; padding: 1rem; font-size: 1.5rem; transition: 1s; '>Erreur, veuillez contacter le service client</p>";
                            }
                            elseif($err==6) {
                                echo "<p style='color:white; padding: 1rem; font-size: 1.5rem; transition: 1s; '>Mettez votre identifiant pour supprimer vos données</p>";
                            }
                        }
                        ?>
                    </form>
                </section>
            </a>
        </div>
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
<script>
    new Chart(document.getElementById("line-chart-day"), {
        type: 'line',
        data: {
            labels: [
                <?php
                foreach($vheure as $var){
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