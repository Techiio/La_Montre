<?php
session_start();

$_SESSION = array();
setcookie("famille", "",time()-3600,"/","localhost");
header('Location: ../index.php?DéconnexionR');
?>