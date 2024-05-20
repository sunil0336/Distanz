<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cars</title>
    <link rel="stylesheet" href="car.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">    
</head>

<body>
    <header>
        <a href="#" class="logo"><img src="./img/jeep.png" alt="logo"></a>
        <div class="bx bx-menu" id="menu-icon"></div>

        <ul class="navbar">
            <li><a href="dindex.php">Home</a></li>
        </ul>
        <div class="header-btn">
            <a href="dlogout.php" class="logout">SignOut</a>
        </div>
    </header>


        <section class="services" id="services">
            <div class="services-container"> 
                <?php
                    include "dconnect.php";

                    $q ="select * from booking where status = 'pending'";
                    // $q ="select * from booking";

                    $result = pg_query($conn,$q);
                    while($row = pg_fetch_assoc($result) ){
                        $carid= $row["vehicle_id"] ;
                        $bid = $row["booking_id"] ;
                        $r = pg_query($conn , "select * from vehicle where vehicle_id = $carid");
                        $car = pg_fetch_row($r);
                        $cname = $car[1];
                        $type = $car[3];
                ?>
                    <div class="box">
                        <div class="info">
                            <h3>Name: <?php echo $row["name"]?></h3>
                            <h3>Contact: <?php echo $row["contact_no"]?></h3>
                            <h3>Type: <?php echo $cname." ".$type." Seater"?></h3>
                        </div>
                        <div class="type">
                            <h3><?php echo $row["source"]?></h3>TO
                            <h3><?php echo $row["destination"]?></h3>
                            </div>
                        <div class="bbtn">
                            <h2><?php echo $row["fare"] ?></h2>
                            <!-- <span>More Info.</span> -->
                            <a href="cc.php?id=<?php echo $bid?>" class="btn">Accept booking</a>
                            <!-- <a href="cc.php?id=<?php echo $bid?>" class="btn" onclick="return bshow()">Accept booking</a> -->
                        </div>
                    </div>
                <?php
                    }
                    pg_close($conn);
                ?>
            </div>
        </section>

    <script src="main.js"></script>
</html>
