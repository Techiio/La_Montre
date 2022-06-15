<?php
require_once("config_PDO.php");

$datalamontre = "http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=6742";
$data = file_get_contents($datalamontre);


echo "Raw Data:<br />";
echo($data);

$data_tab = str_split($data,33);
echo "Tabular Data:<br />";

$num = [];
$numverif = 0;
$iteration = 1;
for($i=0, $size=count($data_tab); $i<$size; $i++){
    echo "Trame $i: $data_tab[$i]";

    $trame = $data_tab[$i];
    // décodage avec des substring
    $t = substr($trame,0,1);
    $codeproduit = substr($trame,1,4);

    // …
    // décodage avec sscanf
    list($t, $codeproduit, $r, $type, $n, $valeur, $boucle, $x, $year, $month, $day, $hour, $min, $sec) =
        sscanf($trame,"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
    echo("<br />$t,$codeproduit,$r,$type,$n,$valeur,$boucle,$x,$year,$month,$day,$hour,$min,$sec<br /><br/>");

    $sql = 'DELETE FROM `donneesmontre`';
    $req = $bdd->query($sql);



    if(($iteration > 1) && ($iteration < 4)){
        if($type == 1){ //Capteur température


        }else if($type == 2){ //Capteur son

        }else if($type == 3){ //Capteur CO2

        }else if($type == 4){ //Capteur cardiaque

        }

    }















    $requete = $bdd->prepare('INSERT INTO donneesmontre(Date, Heure, Bpm, dB, No2, DegréCelsius, CodeProduit) VALUES(?, ?, ?, ?, ?, ?, ?)');
    $requete->execute(array($date, $heure, $bpm, $db, $No2, $degCel, $codeproduit));

}

?>