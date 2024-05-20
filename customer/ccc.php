<?php
    session_start();


$db = pg_connect("host=localhost dbname=New user=postgres password=Sunil24");
if (!$db) {
    die("Error.");
}
$qq = "select cust_id from customer where username = '$_SESSION[username]'";
        $rst = pg_query($db ,$qq);
        if($rst){
            $anr = pg_fetch_row($rst);
            $custid = $anr[0];
        }

    $q = "INSERT INTO booking VALUES(default,'$_POST[price]',$_POST[routid],$custid,$_POST[carid],'$_POST[source]','$_POST[destination]','$_POST[pdate]]','$_POST[ddate]','$_POST[paddress]','$_POST[name]','$_POST[contact]','pending')";

    $result = pg_query($db,$q);
    if(!$result){
        echo "EROOR";
    }
    else{
            ?>
            <html>
                <head>
                    <style>
                    body{
                        background-color: #fe5b3d;
                    }
                    h2{
                        font-size: 30px;
                        color: green;
                        text-align: center;
                        margin-top: 20%;
                    }
                    body a{
                        background-color: #474fa0; 
                        color: white;
                        text-decoration: none;
                        font-weight: bolder;
                        padding: 10px 17px;
                        border: none;
                        border-radius: 4px;
                        cursor: pointer;
                        font-size: medium;
                        border:none;
                        margin-left: 47%;
                        }
                    body a:hover{
                        background-color: black;
                        color: #fc5902;
                        /* border:2px solid black ; */

                        }
                    .invoice{
                        margin: 1rem 10rem;
                    }
                    td,th{
                        padding: 0px 5px;
                    }
                    h1{
                        margin-left: 12%;
                    }
                    table{
                        background: white;
                    }
                    </style>
                </head>
                <body>
                    <h2>Booking Successfull</h2>
                    <a href='cindex.php'>Home</a>

                    <h1>Invoice</h1>

                    <div class="invoice">
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

                $q1 = "select * from booking where contact_no = '$_POST[contact]'";
                // $str = 4;
                // $q ="select * from vehicle where seater='$str'";
                $result1 = pg_query($db, $q1);
                while ($row = pg_fetch_assoc($result1)) {
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
                        <td><?php echo $row["contact_no"] ?></td>

                    </tr>
                    <!-- </table> -->
                <?php
                }
                pg_close($db);
                ?>
            </table>
                </body>
            </html>
            <?php

    }


?>