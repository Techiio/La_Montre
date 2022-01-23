<?php
#Définition des variables qui seront envoyées dans le script.
$nom=$_GET["nom"];
$from=$_GET["mail"];
$to="contact.eko.lamontre@gmail.com";
$sujet="Contact Mail";
$message=$_GET["message"];


#Lancement du script avec lesdites variables.
mail($to, $sujet, $message,$from);
exec("echo ".$from.
$to.
$sujet.
$message."| msmtp -a gmail ".$to);
exec("/usr/bin/msmtp -C /etc/msmtprc -a gmail -t");

header("../user-gest-admin/user-gest-admin_menu.php");
