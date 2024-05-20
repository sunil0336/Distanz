<?php

	include "connect.php";
	$q = "INSERT INTO customer VALUES(default,'$_POST[name]','$_POST[email]','$_POST[contact]','$_POST[address]','$_POST[username]','$_POST[pwd]')";

	$result = pg_query($db,$q);
	if(!$result){
		echo "EROOR";
	}
	else{
		// include "index.html";
		// echo "<style>.login{display:block}</style>";
		header("location:login1.php");
	}
	pg_close($db);
?>
