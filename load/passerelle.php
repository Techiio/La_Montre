<?php
require_once("config_PDO.php");

$datalamontre = "http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=6744";
$data = file_get_contents($datalamontre);

$data_tab = str_split($data,33);

$num = [];
$numverif = 0;
$iteration = 1;
$bpm = 0;
$db = 0;
$No2 = 0;
$degCel = 0;

$sql = 'DELETE FROM `donneesmontre`';
$req = $bdd->query($sql);

for($i=0, $size=count($data_tab); $i<$size; $i++){

    $trame = $data_tab[$i];
    // décodage avec des substring
    $t = substr($trame,0,1);
    $codeproduit = substr($trame,1,4);

    // …
    // décodage avec sscanf
    list($t, $codeproduit, $r, $type, $n, $valeur, $boucle, $x, $year, $month, $day, $hour, $min, $sec) =
        sscanf($trame,"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");

    $date = $year . '-' . $month . '-'. $day;
    $time = $hour . ':' . $min . ':' . $sec;

    if($type == 1){
        $degCel= $valeur;
    }
    if($type == 2){
        $db = $valeur;
    }
    if($type == 3){
        $No2 = $valeur;
    }
    if($type == 4){
        $bpm = $valeur;
        $requete = $bdd->prepare('INSERT INTO donneesmontre(Date, Heure, Bpm, dB, No2, DegréCelsius, CodeProduit) VALUES(?, ?, ?, ?, ?, ?,?)');
        $requete->execute(array($date, $time, $bpm, $db, $No2, $degCel, $codeproduit));
        $iteration =0;
    }
    $iteration +=1;

}
?>