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

    $q = "INSERT INTO customer(cust_name,email,contact_no,address,username,password) VALUES('$_POST[name]','$_POST[email]','$_POST[contact]','$_POST[address]','$_POST[username]','$_POST[pwd]')";

    $r = pg_query($conn,$q);
    if (!$r) {
        echo "ERROR";
    }
    else{
        // echo "Your are regidtred";
        
        include "cindex.html";
        // echo "registred sucessfully";
        echo "<style>
        .login{
            display: block;
        }
        </style>";
    }
    

    pg_close($conn);
?>
