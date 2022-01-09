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

$sql = 'SELECT * FROM donneesmontre WHERE CodeProduit ='. $codeproduit .' ORDER BY Date DESC, Heure DESC LIMIT 168';
$req = $db->query($sql);

$vdate = [];
$vBpm = [];
$vdB = [];
$vNo2 = [];
$vDegCel = [];

$sBpm = [];
$sdB = [];
$sNo2 = [];
$sDegCel = [];

$scoreBpm = [];
$scoredB = [];
$scoreNo2 = [];
$scoreDegCel = [];

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

    $scoreBpm[$a] = ((($sBpm[$a]-20)*100)/140).',';
    $scoredB[$a] = (($sdB[$a]*100)/140).',';
    $scoreDegCel[$a] = ((($sDegCel[$a]-20)*100)/20).',';
    $scoreNo2[$a] = (($sNo2[$a]*100)/40).',';

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

$sBpm[$a] = $mBpm[$a]/$i;
$sdB[$a] = $mdB[$a]/$i;
$sNo2[$a] = $mNo2[$a]/$i;
$sDegCel[$a] = $mDegCel[$a]/$i ;

$scoreBpm[$a] = ((($sBpm[$a]-20)*100)/140).',';
$scoredB[$a] = (($sdB[$a]*100)/140).',';
$scoreDegCel[$a] = ((($sDegCel[$a]-20)*100)/20).',';
$scoreNo2[$a] = (($sNo2[$a]*100)/40).',';

$vBpm[$a] = ($mBpm[$a]/$i).',' ;
$vdB[$a] = ($mdB[$a]/$i).',';
$vNo2[$a] = ($mNo2[$a]/$i).',' ;
$vDegCel[$a] = ($mDegCel[$a]/$i).',' ;

$vdate = array_reverse($vdate);
$vBpm = array_reverse($vBpm);
$vdB = array_reverse($vdB);
$vNo2 = array_reverse($vNo2);
$vDegCel = array_reverse($vDegCel);

$tabScore = array($scoreBpm, $scoredB, $scoreNo2, $scoreDegCel,); // Tableau pour déterminer la meilleure et la pire donnée

$meilleurScore = max($tabScore);
$pireScore = min($tabScore);

$meilleureDonnee = 0;
$pireDonnee = 0;

$add_Score_dB_et_No²=$scoredB+$scoreNo2;
$add_Score_Bpm_et_DegCel=$scoreBpm+$scoreDegCel;


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
        <link rel="stylesheet" href="css/style.css">

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
            <a href="user-gest-admin_statistiques.php">Mes Stats</a>
            <a href="user-gest-admin_faq-contact.php">Contact/FAQ</a>
        </nav>
        <div class="fas fa-bars" id="menu-btn"></div>
    </div>

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

<section class="content">
    <h1 class="heading"> . </h1>
</section>
<!-- mes conseils section starts  -->

<section class="famille" id="famille">
    <h1 class="heading"> Ma <span>Famille</span> </h1>
    <div class="box-container">
        <a href="#" class="box">
            <h3>Meilleur donnée :</h3><br><br><br><br>
            <p><?php echo $meilleureDonnee;
                if ($meilleurScore == $scoreBpm)
                {
                        echo $Bpm;
                        echo " Bpm";
                }
                else if ($meilleurScore == $scoreNo2)
                {
                    echo $No2;
                    echo " µg/m³";
                }
                else if ($meilleurScore == $scoreDegCel)
                {
                    echo $DegCel;
                    echo " °C";
                }
                else if ($meilleurScore == $scoredB)
                {
                    echo $dB;
                    echo " dB";
                }
                ?>
            </p>
        </a>
        <a href="#" class="box">
            <h3>Pire donnée :</h3><br><br><br><br>
            <p> <?php echo $pireDonnee;
                if ($pireScore == $scoreBpm)
                {
                    echo $Bpm;
                    echo " Bpm";
                }
                else if ($pireScore == $scoreNo2)
                {
                    echo $No2;
                    echo " µg/m³";
                }
                else if ($pireScore == $scoreDegCel)
                {
                    echo $DegCel;
                    echo " °C";
                }
                else if ($pireScore == $scoredB)
                {
                    echo $dB;
                    echo " dB";
                }?></p>
        </a>
        
    </div><br><br>
    <div class="box-container">
        <a href="#" class="box">
            <h3>Score :</h3><br><br>
            <h2>/20</h2><br><br>
            <h3>Conseil du jour :
                <?php
                    if ($pireScore == $scoredB)
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
                        echo "Vous êtes en hypothermie. Réchauffez-vous à l’aide d’une couverture de survie isothermique et placer vous dans un coin chaud.";
                    }
                    elseif ($pireScore == $scoreDegCel && $DegCel > 30 )
                    {
                        echo "Vous êtes en hypothermie. Vous avez une insolation,un coup de chaleur ou peut-être de la fièvre.";
                    }
                ?></h3><br><br>
            <p> </p>
        </a>
        
</section>

<!-- ma famille section ends -->

<section class="footer">

    <div class="links">
        <a href="visiteur_CGU.php"  style="margin:0 4%;">CGU</a>
        <a>Version: 1.0.12.201</a>
    </div>


</section>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</html>
