<?php
require_once('config_PDO.php');

if(!isset($_GET['code'])){// Méthode get
    die();
}
// relation avec bdd
$code = $_GET['code'];
$today = date("Y-m-d", time());
$download='SELECT * FROM donneesmontre WHERE CodeProduit ='. $code .' ORDER BY Date DESC, Heure DESC LIMIT 24';
$request = $bdd->query($download);

//Affiche un tableau
$resul = $request->fetchAll(PDO::FETCH_ASSOC);


// Transformer en json le résultat
$final = json_encode($resul, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

// Définition du chemin vers lefichier de données
$filename = '../tmp/Mesdonnees.json';

// ecrire dans fichier
$file = fopen($filename,'w'); 
fwrite($file,$final);
fclose($file);



// Définition des header pour téléchargement
header('Content-Description: File Transfer'); 
header('Content-Type: application/json'); 
header("Cache-Control: no-cache, must-revalidate"); 
header("Expires: 0"); 
header('Content-Disposition: attachment; filename="'.basename($filename).'"'); 
header('Content-Length: ' . filesize($filename)); 
header('Pragma: public');

// Permet de télécharger le fichier
readfile($filename);
?>

