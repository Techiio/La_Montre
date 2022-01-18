<?php
require_once('config.php');
if(!isset($_GET['code'])){
    die();
}
$code = $_GET['code'];
$download='SELECT * FROM donneesmontre WHERE CodeProduit ='. $code .' ORDER BY Date DESC, Heure DESC LIMIT 24';
$request = $bdd->query($download);
$resul = $request->fetch(PDO::FETCH_ASSOC);

$final = json_encode($resul, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
$filename = '../tmp/Mesdonnées.json';
$file = fopen($filename,'w'); 
fwrite($file,$final);
fclose($file);



//header('Content-disposition: attachment; filename=Mesdonnées.json');
//header('Content-Type: application/json');
header('Content-Description: File Transfer'); 
header('Content-Type: application/json'); 
header("Cache-Control: no-cache, must-revalidate"); 
header("Expires: 0"); 
header('Content-Disposition: attachment; filename="'.basename($filename).'"'); 
header('Content-Length: ' . filesize($filename)); 
header('Pragma: public');
readfile($filename);
//header('Location: Mesdonnées.json');

