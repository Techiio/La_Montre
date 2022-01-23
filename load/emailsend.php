<?php
session_start();




$destinataire = 'atryus33@gmail.com';
// Pour les champs $expediteur / $copie / $destinataire, séparer par une virgule s'il y a plusieurs adresses
$expediteur = ['mail'];
$copie = 'adresse@fai.com';
$copie_cachee = 'adresse@fai.com';
$objet = $_POST['nom']; // Objet du message
$message = $_POST['message'];
$header = 'From: atryus33@gmail.com';

if (mail($destinataire, $objet, $message, $header)) // Envoi du message
{
    echo 'Votre message a bien été envoyé ';
}
else // Non envoyé
{
    echo "Votre message n'a pas pu être envoyé";
}
