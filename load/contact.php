<?php
#Définition des variables qui seront envoyées dans le script.
$nom=$_GET["nom"];
$mail=$_GET["mail"];
$message=$_GET["message"];


#Lancement du script avec lesdites variables.

$result = shell_exec('sudo echo -e "Subject: Contact Visiteur/utilisateur\r\n\r\n$message \Cordialment,\n' .$nom.'" |msmtp --debug --from=default -t' .$mail.'');