<?php
session_start();

$_SESSION['username'] = "";
$_SESSION['pwd'] = "";
// session_unset();
// session_destroy();

header("location: login1.php");

?>