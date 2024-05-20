<?php
/*
    $user = $_POST['username'];
    $pwd = $_POST['password'];
    echo $user."<br>";
    echo $pwd."<br>";
*/
    $conn = pg_connect("host=localhost dbname=New user=postgres password=Sunil24");
    if(!$conn){
        die ("Error.");
    }
    else{
        echo "Connected";
    }

    $q = "INSERT INTO contactus(name,email,message) VALUES('$_POST[name]','$_POST[email]','$_POST[message]')";

    $r = pg_query($conn,$q);
    if (!$r) {
        echo "ERROR";
    }
    else{
        // echo "Your are regidtred";
        
        include "cindex.html";
    

    pg_close($conn);
?>
        
    }
