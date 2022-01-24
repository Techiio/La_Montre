<?php

use PHPMailer\PHPMailer\PHPMailer;



if(isset($_POST['name']) && isset($_POST['email'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = "Contact";
    $body = $_POST['body'];
    echo"jfslk";

    require_once "../load/PHPMailer/PHPMailer.php";
    require_once "../load/PHPMailer/SMTP.php";
    require_once "../load/PHPMailer/Exception.php";

    $mail = new PHPMailer();

    //smtp settings
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "fsasaki30@gmail.com";
    $mail->Password = '21Tchlo;';
    $mail->Port = 465;
    $mail->SMTPSecure = "ssl";

    //email settings
    $mail->isHTML(true);
    $mail->setFrom($email, $name);
    $mail->addAddress("fsasaki30@gmail.com");
    $mail->Subject = ("$email ($subject)");
    $mail->Body = $body;

    if($mail->send()){
        $status = "success";
        $response = "Email is sent!";
    }
    else
    {
        $status = "failed";
        $response = "Something is wrong: <br>" . $mail->ErrorInfo;
    }

    exit(json_encode(array("status" => $status, "response" => $response)));
}

else{
    header('location: ../visiteur/visiteur_contact.php');
}

?>


