<?php

use PHPMailer\PHPMailer\PHPMailer;


if(!empty($_POST['name']) && !empty($_POST['email'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = "Contact";
    $body = $_POST['body'];


    require_once "../load/PHPMailer/PHPMailer.php";
    require_once "../load/PHPMailer/SMTP.php";
    require_once "../load/PHPMailer/Exception.php";

    $mail = new PHPMailer();

    //smtp settings
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "contact.eko.lamontre@gmail.com";
    $mail->Password = '7S3K7DWwHClfSFdKrHd@';
    $mail->Port = 465;
    $mail->SMTPSecure = "ssl";

    //email settings
    $mail->isHTML(true);
    $mail->setFrom($email, $name);
    $mail->addAddress("contact.eko.lamontre@gmail.com");
    $mail->Subject = ("$email ($subject)");
    $mail->Body = $body;

    if($mail->send()){
        if (!empty($_SESSION['pseudo'])) {
            header('location: ../user-gest-admin/user-gest-admin_faq-contact.php?erreur=1');
        }
        else {
            header('location: ../visiteur/visiteur_contact.php?erreur=1');}
    }
    else
    {
        if (!empty($_SESSION['pseudo'])) {
            header('location: ../user-gest-admin/user-gest-admin_faq-contact.php?erreur=2');
        }
        else{
        header('location: ../visiteur/visiteur_contact.php?erreur=2');}
    }

    exit(json_encode(array("status" => $status, "response" => $response)));
}



?>


