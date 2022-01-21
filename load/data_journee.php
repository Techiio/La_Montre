<?php
session_start();
require_once("config_PDO.php");

// Récuperation ID de connexion dans le session
$id = $_SESSION['pseudo'];

// Récupération des données sur la journée liées à l'utilisateur
$sql = "SELECT CodeProduit FROM profil WHERE Identifiant ='$id'";
$req = $bdd->query($sql);
$data = $req->fetch();
$codeproduit = $data['CodeProduit'];

$sql = 'SELECT * FROM donneesmontre WHERE CodeProduit ='. $codeproduit .' ORDER BY Date DESC, Heure DESC LIMIT 24';
$req = $bdd->query($sql);

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
