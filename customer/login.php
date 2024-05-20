<?php

    $u = $_POST['username'];
    $p = $_POST['pwd'];

    $conn = pg_connect("host=localhost dbname=New user=postgres password=Sunil24");
    if(!$conn){
        die ("Error.");
    }

    $q = "SELECT * FROM customer WHERE username='$_POST[username]'AND password='$_POST[pwd]'";
    $r = pg_query($conn,$q);
    if (!$r) {
        echo "ERROR";
    }
    else{
        $row = pg_fetch_assoc($r);
        if($row){
            $user = $row['username'];
            $pwd = $row['password'];
            if($u == $user && $p == $pwd){
                //include "cindex.html";
                header("Location: cindex.html");
                exit();
            }
            else{
                echo "Wrong user or pwd";
            }
        }
        else{
            echo "user not found";
            echo "<script>
                	alert('Wrong Password');
                	</script>";
                    // header("Location: login.html");
        }
    }

    pg_close($conn);
?>
*/

