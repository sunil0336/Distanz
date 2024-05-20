<?php

session_start();
$_SESSION['dusername'] = $_POST['username'];
	include "dconnect.php";
	$q = "INSERT INTO driver VALUES(default,'$_POST[name]','$_POST[email]','$_POST[contact]','$_POST[address]','$_POST[username]','$_POST[pwd]','$_POST[l]')";

	$result = pg_query($conn,$q);
	if(!$result){
		echo "EROOR";
	}
	else{
		// include "index.html";
		// echo "<style>.login{display:block}</style>";
		header("location:dvreg.html");
	}
	pg_close($conn);
?>
