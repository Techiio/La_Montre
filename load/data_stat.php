<?php
require_once("config_PDO.php");

// Récupération de l'ID de connexion
$id = $_SESSION['pseudo'];

// Récupération des données liées à l'utilisateur sur la semaine
$sql = "SELECT CodeProduit FROM profil WHERE Identifiant ='$id'";
$req = $bdd->query($sql);
$data = $req->fetch();
$codeproduit = $data['CodeProduit'];

$sql = 'SELECT * FROM donneesmontre WHERE CodeProduit ='. $codeproduit .' ORDER BY Date DESC, Heure DESC LIMIT 168';
$req = $bdd->query($sql);

// Initialisation des valeurs initiales
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

//Trie des données dans les différentes variables et calcul des différents scores/ moyennes
while ($data = $req->fetch()) { // Tant qu'il y a des données à traiter
    // Prise en compte des données
    $date = $data['Date'];
    $heure = $data['Heure'];
    $Bpm = $data['Bpm'];
    $dB = $data['dB'];
    $No2= $data['No2'] ;
    $DegCel = $data['DegréCelsius'];

    while($init){ //Prise en compte des changements de date
        $vardate[$a] = $date;
        $vdate[$a] = substr($date, 8, 10).',';
        $init = FALSE;
    }

    if($date != $vardate[$a]){ // Synthèse de la journée lorsque la date change
        // Moyenne des données jour après jour
        if($i==0){ //Eviter la division par 0
            $i = 1;
        }
        $sBpm[$a] = $mBpm[$a]/$i;
        $sdB[$a] = $mdB[$a]/$i;
        $sNo2[$a] = $mNo2[$a]/$i;
        $sDegCel[$a] = $mDegCel[$a]/$i ;

        // Calcul du score
        $scoreBpm[$a] = ((-(abs($sBpm[$a]-70))+70)*100/70).',';
        $scoredB[$a] = (($sdB[$a]*100)/140).',';
        $scoreDegCel[$a] = ((-(abs($sDegCel[$a]-30))+10)*100/10).',';
        $scoreNo2[$a] = (($sNo2[$a]*100)/40).',';

        // Moyenne des données jour après jour, formaté pour Javascript
        $vBpm[$a] = ($mBpm[$a]/$i).',' ;
        $vdB[$a] = ($mdB[$a]/$i).',';
        $vNo2[$a] = ($mNo2[$a]/$i).',' ;
        $vDegCel[$a] = ($mDegCel[$a]/$i).',' ;

        $a = $a + 1;
        $i = 0;

        $init = TRUE;
    }
    // Somme des données dans la journée
    $i = $i + 1;
    $mBpm[$a] = $mBpm[$a] + $Bpm;
    $mdB[$a] = $mdB[$a] + $dB;
    $mNo2[$a] = $mNo2[$a] + $No2;
    $mDegCel[$a] = $mDegCel[$a] + $DegCel;

}
if($i==0){ //Eviter la division par 0
    $i = 1;
}
// Dernières valeurs traitées
$sBpm[$a] = $mBpm[$a]/$i;
$sdB[$a] = $mdB[$a]/$i;
$sNo2[$a] = $mNo2[$a]/$i;
$sDegCel[$a] = $mDegCel[$a]/$i ;

$scoreBpm[$a] = ((-(abs($sBpm[$a]-70))+70)*100/70).',';
$scoredB[$a] = (($sdB[$a]*100)/140).',';
$scoreDegCel[$a] = ((-(abs($sDegCel[$a]-30))+10)*100/10).',';
$scoreNo2[$a] = (($sNo2[$a]*100)/40).',';

$vBpm[$a] = ($mBpm[$a]/$i).',' ;
$vdB[$a] = ($mdB[$a]/$i).',';
$vNo2[$a] = ($mNo2[$a]/$i).',' ;
$vDegCel[$a] = ($mDegCel[$a]/$i).',' ;

// Inversion des tableaux pour avoir des graphiques chronologiques
$vdate = array_reverse($vdate);
$vBpm = array_reverse($vBpm);
$vdB = array_reverse($vdB);
$vNo2 = array_reverse($vNo2);
$vDegCel = array_reverse($vDegCel);
?>
