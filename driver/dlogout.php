<?php
session_start();

$_SESSION['dusername'] = "";
// session_unset();
// session_destroy();

header("location: dlogin.php");

?>