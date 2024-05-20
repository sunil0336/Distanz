<?php

include "dconnect.php";

$rst = pg_query($conn , "UPDATE booking SET status = 'confirmed' WHERE booking_id = $_GET[id] AND status = 'pending'");
if(!$rst){
        echo "Can't run query";		 	
    }
else{
    // echo "booking confired";
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
                    <h2>Booking accepted</h2>
                    <a href='dindex.php'>Home</a>

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

                $q1 = "select * from booking where booking_id = $_GET[id]";
                // $str = 4;
                // $q ="select * from vehicle where seater='$str'";
                $result1 = pg_query($conn, $q1);
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
                ?>
            </table>
                </body>
            </html>
            <?php
}

pg_close($conn);
?>