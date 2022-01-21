<?php
session_start();

$_SESSION = array();
session_destroy();
setcookie('famille', "", time()-(364*24*3600));

header('Location: ../index.php?DéconnexionR');