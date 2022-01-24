<?php

require_once("config_PDO.php");

$id = $_SESSION['pseudo'];

$sql = "SELECT CodeProduit FROM profil WHERE Identifiant ='$id'";
$req = $bdd->query($sql);
$data = $req->fetch();
$codeproduit = $data['CodeProduit'];

$sql = 'SELECT * FROM donneesmontre WHERE CodeProduit ='. $codeproduit .' ORDER BY Date DESC, Heure DESC LIMIT 168';
$req = $bdd->query($sql);

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
        if($i==0){ //Eviter la division par 0
            $i = 1;
        }

        $sBpm[$a] = $mBpm[$a]/$i;
        $sdB[$a] = $mdB[$a]/$i;
        $sNo2[$a] = $mNo2[$a]/$i;
        $sDegCel[$a] = $mDegCel[$a]/$i ;

        $scoreBpm[$a] = ((-(abs($sBpm[$a]-70))+70)*100/70);             // Calcule le score moyen pour toutes les données afin d'en tirer un score total
        $scoredB[$a] = (($sdB[$a]*100)/140);
        $scoreDegCel[$a] = ((-(abs($sDegCel[$a]-30))+10)*100/10);
        $scoreNo2[$a] = (($sNo2[$a]*100)/40);

        $xCalcScore[$a]=((-$scoredB[$a]+100)+(-$scoreNo2[$a]+100))/2;        //  Formules intermédiaires (dB et No2 entre eux et DegCel et Bpm entre eux).
        $yCalcScore[$a]=($scoreDegCel[$a]+$scoreBpm[$a])/2;                  //  Le regroupement a été fait ainsi car la meilleure valeur pour le dB et le No2 se situe à 0 tandis que pour la température et les battements par minutes, la meilleure valeur est la valeur médiane de toute les valeurs possible

        if($xCalcScore[$a] >= 100)
        {                                                           // Permet de fixer des limites à ne pas dépasser pour le score
            $xCalcScore[$a]=100;
        }
        elseif($xCalcScore[$a] < 0)
        {
            $xCalcScore[$a]=0;
        }
        if($yCalcScore[$a] <= 0)
        {
            $yCalcScore[$a]=0;
        }

        $scoreTotal[$a]=($xCalcScore[$a]+$yCalcScore[$a])/2;

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
if($i==0){ //Eviter la division par 0
    $i = 1;
}
$sBpm[$a] = $mBpm[$a]/$i;
$sdB[$a] = $mdB[$a]/$i;
$sNo2[$a] = $mNo2[$a]/$i;
$sDegCel[$a] = $mDegCel[$a]/$i ;

$scoreBpm[$a] = ((-(abs($sBpm[$a]-70))+70)*100/70);
$scoredB[$a] = (($sdB[$a]*100)/140);
$scoreDegCel[$a] = ((-(abs($sDegCel[$a]-30))+10)*100/10);
$scoreNo2[$a] = (($sNo2[$a]*100)/40);

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
$a = $a - 1;

if($a == -1)
{
    $a = 0;
}


switch ($meilleurScore)                 // MeilleurScore prend la valeur du meilleur score
{
    case $meilleurScore == $scoreBpm:
        $meilleureDonnee =  $sBpm[$a];
        break;
    case $meilleurScore == $scoredB:
        $meilleureDonnee =  $sdB[$a];
        break;
    case $meilleurScore == $scoreNo2:
        $meilleureDonnee =  $sNo2[$a];
        break;
    case $meilleurScore == $scoreDegCel:
        $meilleureDonnee =  $sDegCel[$a];
        break;
}
switch ($pireScore)                      // PireScore prend la valeur du pire score
{
    case $pireScore == $scoreBpm:
        $pireDonnee = $sBpm[$a];
        break;
    case $pireScore == $scoredB:
        $pireDonnee = $sdB[$a];
        break;
    case $pireScore == $scoreNo2:
        $pireDonnee = $sNo2[$a];
        break;
    case $pireScore == $scoreDegCel:
        $pireDonnee = $sDegCel[$a];
        break;
}

?>