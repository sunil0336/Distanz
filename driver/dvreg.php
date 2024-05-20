<?php
session_start();
	include "dconnect.php";

	$qq = "select driver_id from driver where username = '$_SESSION[dusername]'";
    $rst = pg_query($conn ,$qq);
            if($rst){
                $anr = pg_fetch_row($rst);
                $did = $anr[0];
                echo "heyy haa d id is: $did";
            }

	$q = "INSERT INTO vehicle VALUES(default,'$_POST[company]','$_POST[yop]','$_POST[seater]','$_POST[vehicleno]','$_POST[type]','$_POST[rc]','$did')";

	$result = pg_query($conn,$q);
	if(!$result){
		echo "EROOR";
	}
	else{
		// include "index.html";
		// echo "<style>.login{display:block}</style>";
		header("location:dlogin.php");
	}
	pg_close($conn);
?>
