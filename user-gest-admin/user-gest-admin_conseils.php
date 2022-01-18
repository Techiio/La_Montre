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

$scoreBpm = [];
$scoredB = [];
$scoreNo2 = [];
$scoreDegCel = [];

$tabScore = array($scoreBpm, $scoredB, $scoreNo2, $scoreDegCel,); // Tableau pour déterminer la meilleure et la pire donnée

$meilleurScore = max($tabScore);
$pireScore = min($tabScore);

$meilleureDonnee = 0;
$pireDonnee = 0;

switch ($meilleurScore)
{
case $meilleurScore == $scoreBpm:
    $meilleureDonnee =  $data['Bpm'];
    break;
case $meilleurScore == $scoredB:
    $meilleureDonnee =  $data['dB'];
    break;
case $meilleurScore == $scoreNo2:
    $meilleureDonnee =  $data['No2'];
    break;
case $meilleurScore == $scoreDegCel:
    $meilleureDonnee =  $data['DegréCelsius'];
    break;
    }
switch ($pireScore)
{
    case $pireScore == $scoreBpm:
        $pireDonnee = $data['Bpm'];
        break;
    case $pireScore == $scoredB:
        $pireDonnee = $data['dB'];
        break;
    case $pireScore == $scoreNo2:
        $pireDonnee = $data['No2'];
        break;
    case $pireScore == $scoreDegCel:
        $pireDonnee = $data['DegréCelsius'];
        break;
}

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Visiteur Mes Conseils</title>

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

    <a href="../index.php" class="logo">
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

<section class="content">
    <h1 class="heading"> . </h1>
</section>
<!-- mes conseils section starts  -->

<section class="famille" id="famille">
    <h1 class="heading"> Ma <span>Famille</span> </h1>
    <div class="box-container">
        <a class="box">
            <h3>Meilleur donnée :</h3><br><br><br>
            <p><?php echo $meilleureDonnee;
                if ($meilleurScore == $scoreBpm)
                {
                        echo "Bpm";
                }
                else if ($meilleurScore == $scoreNo2)
                {
                    echo "µg/m³";
                }
                else if ($meilleurScore == $scoreDegCel)
                {
                    echo "°C";
                }
                else if ($meilleurScore == $scoredB)
                {
                    echo "dB";
                }
                ?>
            </p>
        </a>
        <a class="box">
            <h3>Pire donnée :</h3><br><br><br>
            <p> <?php echo $pireDonnee;
                if ($pireScore == $scoreBpm)
                {
                    echo "Bpm";
                }
                else if ($pireScore == $scoreNo2)
                {
                    echo "µg/m³";
                }
                else if ($pireScore == $scoreDegCel)
                {
                    echo "°C";
                }
                else if ($pireScore == $scoredB)
                {
                    echo "dB";
                }?></p>
        </a>
        
    </div><br><br>
    <div class="box-container">
        <a class="box">
            <h3>Score :</h3><br><br>
            <p>/20</p><br><br>
            <h3>Conseils du jour :</h3><br><br>
            <p> </p>
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
