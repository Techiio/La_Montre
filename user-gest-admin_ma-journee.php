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
        <img src="images/EkoS.png" alt="">
    </a>

    <div class="icons">
        <nav class="navbar">
            <a href="user-gest-admin_menu.php">Mon Menu</a>
            <a href="user-gest-admin_statistiques.php">Mes Stats</a>
            <a href="user-gest-admin_conseils.php">Mes Conseils</a>
            <a href="user-gest-admin_faq-contact.php">Contacts/FAQ</a>
        </nav>
        <div class="fas fa-bars" id="menu-btn"></div>
    </div>

    <a href="visiteur_accueil.php" class="logo">
        <img src="images/LaMontreS.png" alt="">
        <h3>Déconnexion</h3>
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

<section class="data">

        <div class="box1">
            <canvas id="line-chart"></canvas>
        </div>
        <div class="box2">
            <p>Gumbo beet greens corn soko endive gumbo gourd. Parsley shallot courgette tatsoi
                pea sprouts fava bean collard greens dandelion okra wakame tomato.
                Dandelion cucumber earthnut pea peanut soko zucchini.</p>
        </div>

        <div class="box3">
            <p>Infos du Jour :</p>
        </div>

</section>
<!-- ma journée section end-->

<section class="footer">

    <div class="links">
        <a href="visiteur_CGU.php">CGU</a>
    </div>

</section>

<!-- custom js file link  -->
<script src="js/script.js"></script>
<script>
    new Chart(document.getElementById("line-chart"), {
        type: 'line',
        data: {
            labels: [1500,1600,1700,1750,1800,1850,1900,1950,1999,2050],
            datasets: [{
                data: [86,114,106,106,107,111,133,221,783,2478],
                label: "Africa",
                borderColor: "#3e95cd",
                fill: false
            }, {
                data: [282,350,411,502,635,809,947,1402,3700,5267],
                label: "Asia",
                borderColor: "#8e5ea2",
                fill: false
            }, {
                data: [168,170,178,190,203,276,408,547,675,734],
                label: "Europe",
                borderColor: "#3cba9f",
                fill: false
            }, {
                data: [40,20,10,16,24,38,74,167,508,784],
                label: "Latin America",
                borderColor: "#e8c3b9",
                fill: false
            }, {
                data: [6,3,2,2,7,26,82,172,312,433],
                label: "North America",
                borderColor: "#c45850",
                fill: false
            }
            ]
        },
        options: {
            title: {
                display: true,
                text: 'World population per region (in millions)'
            }
        }
    });
</script>
</body>
</html>