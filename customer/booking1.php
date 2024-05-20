<?php
   	session_start();
   	// $c = $_POST['contact'];
   	//  $_SESSION['contact'] = $c;
    if (isset($_GET['id'])){
        include "connect.php";
        $qq = "select cust_id from customer where username = '$_SESSION[username]'";
        $rst = pg_query($db ,$qq);
                if($rst){
                    $anr = pg_fetch_row($rst);
                    $cid = $anr[0];

                }
        $q = "INSERT INTO booking VALUES(default,'$_POST[fare]','$_POST[routid]','$cid','$_GET[id]','$_POST[source]','$_POST[destination]','$_GET[pd]','$_GET[dd]','$_POST[paddress]','$_POST[name]','$_POST[contact]','pending')";

        $result = pg_query($db,$q);
        if(!$result){
            echo "EROOR";
        }
        else{
            // include "index.html";
            // echo "<style>.login{display:block}</style>";
            // header("location:login1.php");
            echo "<script>
                    alert('Booking Successfull!');
                </script>";
                
                
            //header("Location: cindex.php");
                ?>
                <div class="display-container">
            <table>
                <tr>
                    <th>Booking id</th>
                    <th>Fare</th>
                    <th>Route Id</th>
                    <th>Customer id</th>
                    <th>Vehicle id</th>
                    <th>source</th>
                    <th>destination</th>
                    <th>dateofpickup</th>
                    <th>dropdate</th>
                    <th>pickupaddress</th>
                    <th>name</th>
                    <th>contact</th>
                </tr>
                <?php
                $db = pg_connect("host=localhost dbname=New user=postgres password=Sunil24");
                if (!$db) {
                    die("Error.");
                }

                $q = "select * from booking where contact = '$_POST[contact]'";
                // $str = 4;
                // $q ="select * from vehicle where seater='$str'";
                $result = pg_query($db, $q);
                while ($row = pg_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $row["booking_id"] ?></td>
                        <td><?php echo $row["fare"] ?></td>
                        <td><?php echo $row["route_id"] ?></td>
                        <td><?php echo $row["cust_id"] ?></td>
                        <td><?php echo $row["vehicle_id"] ?></td>
                        <td><?php echo $row["source"] ?></td>
                        <td><?php echo $row["destination"] ?></td>
                        <td><?php echo $row["dateofpickup"] ?></td>
                        <td><?php echo $row["dropdate"] ?></td>
                        <td><?php echo $row["pickupaddress"] ?></td>
                        <td><?php echo $row["name"] ?></td>
                        <td><?php echo $row["contact"] ?></td>

                    </tr>
                    <!-- </table> -->
                <?php
                }
                pg_close($db);
                ?>
            </table>
        </div>
        
        <?php
            echo "<html><body><a href='cindex.php'>Home</a></body></html";

        }
        pg_close($db);
    }
?>
