<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cars</title>
    <link rel="stylesheet" href="car.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <style>

.book {
    height: 100vh;
    width: 28%;
    position: fixed;
    top: 0;
    right: 0;
    z-index: 1;
    padding: 7% 2%;
    background: #fff;
    display: none;
    /* border: 2px solid; */
    box-shadow: -20px 0px 150px 150px #fe5b3d;
}


.book span {
    font-size: 16px;
    margin: 5px 0;
    display: inline-block;
    color: #a71830;
    font-weight: 300;
    letter-spacing: 1px;

}

.book form input {
    width: 100%;
    padding: 10px 20px;
    outline: none;
    font-weight: 400;
    border: 1px solid #607d8b;
    font-size: 16px;
    letter-spacing: 1px;
    color: #607d8b;
    background: transparent;
    border-radius: 30px;
}

.book .s-btn {
    margin-top: 10px;
    /* margin: 15px 10px; */
    /* width: 100%; */
}

.book .s-btn input {
    background: #c00606;
    color: #fff;
    outline: none;
    border: none;
    font-weight: 500;
    cursor: pointer;
}

.book .s-btn input:hover {
    background: #4d0404;
}

.book .lb {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.book .lb img{
    font-size: 20px;
    cursor: pointer;
}

.book textarea {
    height: 5rem;
    padding: .5rem;
    width: 90%;
    margin: 0px 15px;
}

.hidee{
    display: none;
}
    </style>
</head>

<body>
    <header>
        <a href="#" class="logo"><img src="./img/jeep.png" alt="logo"></a>
        <div class="bx bx-menu" id="menu-icon"></div>

        <ul class="navbar">
            <li><a href="cindex.php">Home</a></li>
        </ul>
        <div class="header-btn">
            <a href="logout.php" class="logout">SignOut</a>
        </div>
    </header>

    <div class="main">
        <div class="filter">
            <h3>Filter</h3>
            <span>Sort by:</span>
            <select id="sort-by">
                <option value="ALL">ALL</option>
                <option value="4Seater">4 Seater</option>
                <option value="7Seater">7 Seater</option>
                <option value="14Seater">14Seater</option>
            </select>
            <h3>Modify Search</h3>
            <?php
                $s = $_POST['source'];
                $d = $_POST['destination'];
                $pd = $_POST['pdate'];
                $dd = $_POST['ddate'];
                // session_start();
                // $_SESSION['s'] = $s;
                // $_SESSION['d'] = $d;
                // $_SESSION['pd'] = $pd;
                // $_SESSION['dd'] = $dd;
                ?>
            <form action="car.php" method="post">
                <!-- <input type="text" name="source" class="source f-ip" value="<?php //echo $s?>">
                <input type="text" name="destination" class="destination f-ip" value="<?php //echo $d ?>"> -->
                <select id="destination" name="source">
                        <option value="<?php echo $s?>"><?php echo $s?></option>
                        <option value="Pune">Pune</option>
                        <option value="Jalgaon">Jalgaon</option>
                        <option value="Nashik">Nashik</option>
                </select>

                <select id="destination" name="destination">
                        <option value="<?php echo $d ?>"><?php echo $d ?></option>
                        <option value="Pune">Pune</option>
                        <option value="Jalgaon">Jalgaon</option>
                        <option value="Nashik">Nashik</option>
                </select>
                Pick-Up Date
                <input type="date" name="pdate" value="<?php echo $pd ?>" class="s-dt f-ip">
                Drop Date
                <input type="date" name="ddate" value="<?php echo $dd ?>" class="e-dt f-ip">
                <button type="submit" class="search-btn">Modify Search</button>
            </form>
        </div>

        <section class="services" id="services">
            <div class="services-container"> 
                <?php
                    $conn = pg_connect("host=localhost dbname=New user=postgres password=Sunil24");
                    if(!$conn){
                        die ("Error.");
                    }

                    // $str = 4;
                    // $q ="select * from vehicle where seater='$str'";
                    $im = 0;
                    
                    $price = 4999;

                    $qq = "select * from routes where sname = '$s' and dname = '$d'";
                    $rst = pg_query($conn ,$qq);
                    if(!$rst){
                        echo "Can't run query";		 	
                    }
                    else{
                        $anr = pg_fetch_row($rst);
                        $price = $anr[3];
                        $price=$price+($price*0.1);
                    }
                    
                    $q ="select * from vehicle";
                    $result = pg_query($conn,$q);
                    while($row = pg_fetch_assoc($result) ){
                        $im += 1;
                ?>
                    <div class="box">
                        <div class="box-img">
                            <img src="img/car<?php echo $im ?>.jpg" alt="imgg">
                        </div>
                        <h3><?php echo $row["company_model"] ?></h3>
                        <div class="type">
                            <span><?php echo $row["ac_nonac"]?></span>
                            <span><?php echo $row["seater"] ?> Seater</span>
                        </div>
                        <div class="bbtn">
                            <h2><?php echo $price ?></h2>
                            <a href="booking.php?id=<?php echo $row['vehicle_id'] ?>&s=<?php echo $s?>&d=<?php echo $d?>&pd=<?php echo $pd?>&dd=<?php echo $dd?>&price=<?php echo $price ?>" class="btn">Book Now</a>
                            <!-- <a href="#" class="btn" onclick="return bshow">Book Now</a> -->
                        </div>
                    </div>
                <?php
                    }
                    pg_close($conn);
                ?>
            </div>
        </section>

    <div class="book">
        <div class="lb">
            <h2>Booking Form</h2>
            <img src="./img/arrow-back-regular-24.png" alt="Back" onclick="return bhide()">
        </div>
        <form name="bform" action="booking.php" method="post">

            
            <span><b>Your Name:</b></span>
            <input type="text" name="name">
            
            <span><b>Phone Number:</b></span>
            <input type="text" name="contact">
            
            <!-- booing madhe pass krych -->
            <!-- fare,cust_id,root_id, -->
            <div class="hidee">
                <input type="text" name="fare" value="<?php echo $fare ?>">
                <input type="text" name="routid" value="<?php echo $rout_id ?>">
                <input type="text" name="carid" value="<?php echo $carid ?>">
                <input type="text" name="source" value="<?php echo $s ?>">
                <input type="text" name="destination" value="<?php echo $d ?>">
                <input type="text" name="pdate" value="<?php echo $pd ?>">
                <input type="text" name="ddate" value="<?php echo $dd ?>">
            </div>

            <span><b>Pickup Address:</b></span><br>
            <textarea id="address" name="paddress" required></textarea>

            <div class="s-btn">
                <input type="submit" value="Comform Booking" name="submit11">
            </div>
        </form>
    </div>

    <script src="main.js"></script>
</html>
